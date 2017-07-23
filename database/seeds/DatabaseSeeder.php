<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'tester@tanyadev.com',
            'password' => bcrypt('tester'),
        ]);

        DB::table('tags')->insert([
            'tag' => 'Romance'
        ]);

        DB::table('categories')->insert([
            'category' => 'AniManga'
        ]);

        DB::table('categories')->insert([
            'category' => 'Novel'
        ]);

        DB::table('categories')->insert([
            'category' => 'Light Novel'
        ]);

        DB::table('categories')->insert([
            'category' => 'News'
        ]);

        DB::table('categories')->insert([
            'category' => 'Entertainment'
        ]);

        DB::table('categories')->insert([
            'category' => 'Celebrity'
        ]);
    }
}
