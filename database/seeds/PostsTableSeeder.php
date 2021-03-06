<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $users = User::all();
            $newPost = new Post;
            $newPost->title=$faker->sentence(3);
            $newPost->body=$faker->text(500);
            $newPost->img=$faker->imageUrl($width=640,$height=480);
            $newPost->slug=Str::slug($newPost->title);
            $newPost->user_id=$users->random()->id;
            $newPost->save();
           
        } 
    }
}
