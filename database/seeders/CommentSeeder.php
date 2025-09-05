<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comment = [
                ['comment' => 'Wow so interesting!',
                  'post_id' => '1',
                  'user_id' => '1'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '2',
                  'user_id' => '3'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '3',
                  'user_id' => '1'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '4',
                  'user_id' => '1'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '5',
                  'user_id' => '4'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '6',
                  'user_id' => '4'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '7',
                  'user_id' => '5'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '8',
                  'user_id' => '6'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '9',
                  'user_id' => '2'

        ],
                ['comment' => 'Wow so interesting!',
                  'post_id' => '10',
                  'user_id' => '2'

        ],
        ];

        foreach($comment as $data){
            Comment::create($data);
        }
    }
}
