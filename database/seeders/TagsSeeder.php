<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $tags = [
            'Technology',
            'Science',
            'Computers',
            'Politics',
            'Economics',
            'Business',
            'Military',
            'Travel',
            'Fashion',
            'Food',
            'Gaming'];
        
            foreach($tags as $key){
                Tag::create([
                    'name' => $key
                ]);
            };
            
    }
}
