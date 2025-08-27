<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1, 
                'name' => 'Getting Started with Laravel',
                'content' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.'
            ],
            [
                'user_id' => 1,
                'name' => 'Understanding Eloquent ORM',
                'content' => 'Eloquent is Laravel\'s object-relational mapper (ORM) that makes it enjoyable to interact with your database. When using Eloquent, each database table has a corresponding "Model" that is used to interact with that table.'
            ],
            [
                'user_id' => 2,
                'name' => 'The Future of Artificial Intelligence',
                'content' => 'Artificial intelligence is transforming industries and creating new opportunities. From healthcare to finance, AI is revolutionizing how we solve complex problems and make decisions.'
            ],
            [
                'user_id' => 1,
                'name' => 'Building RESTful APIs with Laravel',
                'content' => 'Laravel makes it easy to build RESTful APIs that can serve data to various clients including web applications, mobile apps, and other services. With API resources and Sanctum, you can quickly build secure APIs.'
            ],
            [
                'user_id' => 2,
                'name' => 'Climate Change and Sustainable Development',
                'content' => 'Addressing climate change requires global cooperation and innovative solutions. Sustainable development goals provide a framework for creating a better future for our planet.'
            ],
            [
                'user_id' => 1,
                'name' => 'Database Relationships Explained',
                'content' => 'Understanding database relationships is crucial for building complex applications. Learn about one-to-one, one-to-many, and many-to-many relationships and how to implement them in Laravel.'
            ],
            [
                'user_id' => 2,
                'name' => 'The Rise of Remote Work',
                'content' => 'Remote work has become the new normal for many industries. This shift has changed how companies operate and how employees balance work and life.'
            ],
            [
                'user_id' => 1,
                'name' => 'Authentication in Laravel',
                'content' => 'Laravel provides built-in authentication services that make it easy to implement login, registration, and password reset functionality. Learn how to customize these features for your application.'
            ],
            [
                'user_id' => 2,
                'name' => 'Renewable Energy Technologies',
                'content' => 'Solar, wind, and other renewable energy sources are becoming more efficient and affordable. These technologies are key to reducing our carbon footprint and combating climate change.'
            ],
            [
                'user_id' => 1,
                'name' => 'Testing Your Laravel Application',
                'content' => 'Testing is an essential part of application development. Laravel provides excellent support for testing with PHPUnit and includes convenient helpers for testing your applications.'
            ]
        ];

        
        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
