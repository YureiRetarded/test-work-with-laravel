<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $query = Post::query();
        // if (isset($data['category_id']))
        //     $query->where('category_id', $data['category_id']);
        // if (isset($data['title']))
        //     $query->where('title', 'like', "%{$data['title']}%");
        // if (isset($data['post_content']))
        //     $query->where('post_content', 'like', "%{$data['post_content']}%");
        $posts = $query->get();

        dd($posts);
        $posts = Post::paginate(15);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $catogories = Category::all();
        $tags = Tag::all();
        return  view('post.create', compact('catogories', 'tags'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
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
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
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