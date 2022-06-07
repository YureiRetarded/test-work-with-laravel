<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        dd($posts);
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'Test title',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit ab harum quo distinctio. Aliquid enim in vitae, illum nemo voluptate possimus est vel magnam eos magni dolor pariatur error!',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Everest_North_Face_toward_Base_Camp_Tibet_Luca_Galuzzi_2006.jpg',
                'likes' => 642,
                'is_published' => 1
            ],
            [
                'title' => 'Test title222',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit ab harum quo distinctio. Aliquid enim in vitae, illum nemo voluptate possimus est vel magnam eos magni dolor pariatur error!',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Everest_North_Face_toward_Base_Camp_Tibet_Luca_Galuzzi_2006.jpg',
                'likes' => 12,
                'is_published' => 1
            ]
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
    }
    public function update()
    {
        $post = Post::find(18);
        $post->update([
            'title' => 'Updated',
            'content' => 'Updated!',
            'image' => 'qwerqwrqwr',
            'likes' => 0,
            'is_published' => 1
        ]);
    }
    public function delete()
    {
        $post = Post::withTrashed()->find(5);
        $post->restore();
        dd('resote');
    }
    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'Test title',
            'content' => 'awdawdawd!',
            'image' => 'none',
            'likes' => 0,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate(
            ['title' => 'ssssss title'],
            [
                'title' => 'ssssss title',
                'content' => 'awdawdawd!',
                'image' => 'none',
                'likes' => 0,
                'is_published' => 1
            ]
        );
        dump($post->content);
        dd('end');
    }
}