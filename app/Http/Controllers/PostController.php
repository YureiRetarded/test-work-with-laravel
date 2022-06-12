<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $catogories = Category::all();
        $tags = Tag::all();
        return  view('post.create', compact('catogories', 'tags'));
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'post_content' => 'required|string',
            'image' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect(route('post.index'));
    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $catogories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'catogories', 'tags'));
    }
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect(route('post.show', $post->id));
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}