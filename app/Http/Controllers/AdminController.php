<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Tags;
use App\Post;
use App\Invite;
use App\Mail\InviteCreated;
use File;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	public function index()
	{
		return view('dashboard.index');
	}

    public function getCategories()
    {
        $categories = Categories::where('deleted', 0)->paginate(5);

        return view('dashboard.artikel.categories.index')
        ->with('categories', $categories);
    }

    public function createCategory()
    {
        return view('dashboard.artikel.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        // Cek kategori
        $categories = Categories::where('category', $request->input('category'))->where('deleted', 0)->count();
        if($categories < 1)
        {
            $categories = Categories::create($request->all());
            return redirect()->to(route('admin.category'));
        }else{
            return redirect()->back()->with('Error', 'Kategori tersebut telah terdaftar!');
        }
    }

    public function editCategory($id)
    {
        $category = Categories::find($id);

        return view('dashboard.artikel.categories.edit')
        ->with('category', $category);
    }

    public function storeEditedCategory(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        // Cek kategori
        $categories = Categories::where('category', $request->input('category'))->where('id', '<>', $id)->where('deleted', 0)->count();
        if ($categories < 1) {
            $category = $request->all();

            $execute = Categories::find($id)->update($category);

            return redirect()->to(route('admin.category'));
        }else{
            return redirect()->back()->with('Error', 'Kategori tersebut telah terdaftar!');
        }
    }

    public function deleteCategory($id)
    {
        $update = ['deleted' => '1'];

        $execute = Categories::find($id)->update($update);

        return redirect()->to(route('admin.category'));
    }

    public function getTags()
    {
        $tags = Tags::where('deleted', 0)->paginate(5);

        return view('dashboard.artikel.tags.index')
        ->with('tags', $tags);
    }

    public function createTag()
    {
        return view('dashboard.artikel.tags.create');
    }

    public function storeTag(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required',
        ]);

        //cek tag
        $tags = Tags::where('tag', $request->input('tag'))->where('deleted', 0)->count();

        if($tags < 1)
        {
            $execute = Tags::create($request->all());
            return redirect()->to(route('admin.tag'));
        }else{
            return redirect()->back()->with('Error', 'Tag tersebut telah terdaftar!');
        }
    }

    public function editTag($id)
    {
        $tag = Tags::find($id);

        return view('dashboard.artikel.tags.edit')
        ->with('tag', $tag);
    }

    public function storeEditedTag(Request $request, $id)
    {
        $this->validate($request, [
            'tag' => 'required',
        ]);

        //cek tag
        $tags = Tags::where('tag', $request->input('tag'))->where('id', '<>', $id)->where('deleted', 0)->count();
        if ($tags < 1) 
        {
            $tag = $request->all();
            $execute = Tags::find($id)->update($tag);

            return redirect()->to(route('admin.tag'));   
        }else{
            return redirect()->back()->with('Error', 'Tag tersebut telah terdaftar!');
        }
    }

    public function deleteTag($id)
    {
        $update = ['deleted' => '1'];

        $execute = Tags::find($id)->update($update);

        return redirect()->to(route('admin.tag'));
    }

    public function getArtikel() 
    {
        $artikel = Post::where('deleted', 0)->paginate(5);
        $tagsCount = Tags::where('deleted', 0)->count();
        $categoriesCount = Categories::where('deleted', 0)->count();
        return view('dashboard.artikel.index')
        ->with('artikels', $artikel)
        ->with('tags', $tagsCount)
        ->with('categories', $categoriesCount);
    }

    public function createArtikel()
    {
        $tags = Tags::where('deleted', 0)->get();
        $categories = Categories::where('deleted', 0)->get();
        return view('dashboard.artikel.create')
        ->with('tags', $tags)
        ->with('categories', $categories);
    }

    public function storeArtikel(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required'
        ]);

        // Cek terbit status
        if ($request->has('aired')) {
        	$aired = 1;
        }else{
        	$aired = 0;
        }

        // Cek artikel
        $artikels = Post::where('title', $request->input('title'))->where('deleted', 0)->count();
        if ($artikels < 1) {
            //slug link artikel
            $slug = Str::slug($request->input('title'));

            //Atur Cover (jika ada)
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); 
                $newname = $slug;
                $renamedImage = "$newname.$extension"; //semua image yg diupload akan direname dan diubah menjadi JPG

                // Check dulu apakah img sudah ada
                if (File::exists(public_path().'/images/post-img/'.$renamedImage)) {
                    File::delete(public_path().'/images/post-img/'.$renamedImage);
                }

                $file->move("images/post-img/", $renamedImage);

                //Masukkan ke array
                $artikel = [
                    'slug' => $slug,
                    'category_id' => $request->get('category_id'),
                    'user_id' => Auth::id(),
                    'title' => $request->input('title'),
                    'image' => $renamedImage,
                    'content' => $request->input('content'),
                    'aired' => $aired
                ];
            }else{
                //Masukkan ke array (tanpa image)
                $artikel = [
                    'slug' => $slug,
                    'title' => $request->input('title'),
                    'category_id' => $request->get('category_id'),
                    'user_id' => Auth::id(),
                    'content' => $request->input('content'),
                    'aired' => $aired
                ];
            }

            $execute = Post::create($artikel);

            //Atur Many to Many relation
            //Ambil ID artikel yg barusan di post
            $artikel_id = Post::find($execute->id);

            //kirim 'id-nya' ke table pivot 'artikel_tag' bersamaan dgn id dari tag yg dipilih di form
            $artikel_id->tags()->sync($request->get('tag_id'));

            return redirect()->to(route('admin.artikel'));
        }else{
            return redirect()->back()->with('Error', 'Judul tersebut telah digunakan!');
        }
    }

    public function editArtikel($id)
    {
        $artikel = Post::find($id);
        $tags = Tags::where('deleted', 0)->get();
        $categories = Categories::where('deleted', 0)->get();
        return view('dashboard.artikel.edit')
        ->with('artikel', $artikel)
        ->with('categories', $categories);
    }

    public function storeEditedArtikel(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        // Cek terbit status
        if ($request->has('aired')) {
        	$aired = 1;
        }else{
        	$aired = 0;
        }

        // Cek artikel
        $artikels = Post::where('title', $request->input('title'))->where('id', '<>', $id)->where('deleted', 0)->count();

        if($artikels < 1)
        {
            //Atur Cover (jika ada)
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); 
                $newname = Str::slug($request->input('title'));
                $renamedImage = "$newname.$extension";

                // Check dulu apakah img sudah ada
                if (File::exists(public_path().'/images/post-image/'.$renamedImage)) {
                    File::delete(public_path().'/images/post-image/'.$renamedImage);
                }

                $file->move("images/post-img/", $renamedImage);

                //Masukkan ke array
                $artikel = [
                    'category_id' => $request->get('category_id'),
                    'title' => $request->input('title'),
                    'image' => $renamedImage,
                    'content' => $request->input('content'),
                    'aired' => $aired
                ];
            }else{
                //Masukkan ke array (tanpa image)
                $artikel = [
                    'category_id' => $request->get('category_id'),
                    'title' => $request->input('title'),
                    'content' => $request->input('content'),
                    'aired' => $aired
                ];
            }

            $execute = Post::find($id)->update($artikel);

            return redirect()->to(route('admin.artikel'));
        }else{
            return redirect()->back()->with('Error', 'Judul tersebut telah digunakan!');
        }
    }

    public function deleteArtikel($id)
    {
        $update = ['deleted' => '1'];

        $execute = Post::find($id)->update($update);

        return redirect()->to(route('admin.artikel'));
    }

    public function terbitkanArtikel($id)
    {
    	$update = ['aired' => '1'];

        $execute = Post::find($id)->update($update);

        return redirect()->to(route('admin.artikel'));
    }

    public function getInviteList()
    {
    	$inviteList = Invite::paginate(5);
    	return view('dashboard.invite.index')
    	->with('inviteList', $inviteList);
    }

    public function createInvite()
    {
    	return view('dashboard.invite.create');
    }

    public function processInvite(Request $request)
    {
    	// validate the incoming request data

	    do {
	        //generate a random string using Laravel's str_random helper
	        $token = str_random();
	    } 	//check if the token already exists and if it does, try again
	    while (Invite::where('token', $token)->first());

	    //create a new invite record
	    $invite = Invite::create([
	        'email' => $request->get('email'),
	        'token' => $token
	    ]);

	    // send the email
	    Mail::to($request->get('email'))->send(new InviteCreated($invite));

	    // redirect back where we came from
	    return redirect()->to(route('admin.invite'));
    }
}
