<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
       
    
        $likes = [20, 10, 30, 44];

        foreach (Post::all() as $post) {
            $post->update([
                'likes' => $likes[array_rand($likes)], 
            ]);
        }
    }
}
