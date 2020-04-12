<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([

        	'title'        => Str::random(10),
        	'user_id'      => 1,
        	'category_id'  => 1,
        	'photo_id'     =>2,
        	'body'         => Str::random(10),
            'slug'         => Str::random(10)
        ]);
    }
}
