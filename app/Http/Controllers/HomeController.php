<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Invite;
use App\Mail\InviteCreated;
use App\Post;
use App\Categories;
use App\Tags;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get latest post
        $posts = Post::where('deleted', 0)->where('aired', 1)->orderBy('created_at', 'desc')->paginate(6);

        //Post per category

        // Entertainment
        $idEnterCat = Categories::select('id')->where('category', 'Entertainment')->first();
        $EnterPost = Categories::find($idEnterCat->id)->posts()->paginate(3);

        // News
        $idNewsCat = Categories::select('id')->where('category', 'News')->first();
        $NewsPost = Categories::find($idNewsCat->id)->posts()->paginate(3);

        // Celebrity
        $idCelebCat = Categories::select('id')->where('category', 'Celebrity')->first();
        $CelebPost = Categories::find($idCelebCat->id)->posts()->paginate(3);


        return view('welcome')
        ->with('posts', $posts)
        ->with('entertains', $EnterPost)
        ->with('news', $NewsPost)
        ->with('celebs', $CelebPost);
    }

    public function readPost($slug)
    {
        //get post
        $post = Post::where('slug', $slug)->where('aired', 1)->first();
        if (!$post) {
            return view('errors.404');
        }

        return view('read')
        ->with('post', $post);
    }

    public function readPostByCategory($category)
    {
        //get id cat
        $cat_id = Categories::select('id')->where('category', $category)->first();
        if (!$cat_id) {
            return view('errors.404');
        }else{
            $posts = Categories::find($cat_id->id)->posts()->simplePaginate(2);

            // get posts, categories and tags for widget
            // latest posts
            $widgetPost = Post::where('deleted', 0)->where('aired', 1)->orderBy('created_at', 'desc')->paginate(5);

            // Categories
            $widgetCat = Categories::withCount('posts')->where('deleted', 0)->get();

            //Tags
            $widgetTag = Tags::where('deleted', 0)->get();

            return view('blog')
            ->with('posts', $posts)
            ->with('widgetPost', $widgetPost)
            ->with('widgetCat', $widgetCat)
            ->with('widgetTag', $widgetTag);
        }
    }

    public function categories()
    {
        $categories = Categories::where('deleted', 0)->orderBy('id', 'asc')->paginate(9);

        return view('cats')
        ->with('categories', $categories);
    }

    // User Invitation
    public function processRegistration($token)
    {
         // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        return view('dashboard.invite.register')
        ->with('invite', $invite);
    }

    public function storeRegistration(Request $request, $token)
    {
         // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // create the user with the details from the invite form
        $createUser = 
        [
            'name' => $request->input('name'),
            'email' => $invite->email,
            'password' => Hash::make($request->input('password'))
        ];

        $execute = User::create($createUser);

        // delete the invite so it can't be used again
        $invite->delete();

        return redirect()->to(route('login'))->with('Success', 'Silahkan login untuk melanjutkan');
    }
}
