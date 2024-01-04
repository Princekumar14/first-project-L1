<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/comments.json');

        $comments = collect(json_decode($json));
    
        $comments->each(function($comment){
            Comment::create([
                'body' => $comment->body,
                'commentable_id' => $comment->commentable_id,
                'commentable_type' => $comment->commentable_type
            ]);
        });
    }
}
