<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(15);
        return PostResource::collection($posts);
        //return view('post.index', compact('posts'));
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

        return new PostResource($post);
        //return redirect(route('post.index'));
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