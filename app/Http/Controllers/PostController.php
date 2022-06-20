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
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(15);
        //return PostResource::collection($posts);
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
        $post;
        try{
            DB::beginTransaction();
            $data = $request->validated();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'],$data['category']);
            $tagIds=$this->getTagIds($tags);
            $data["category_id"]=$this->getCategoryId($category);
            $post = Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        }
        catch(\Exception $exception){
            DB::rollback();
            $post = $exception->getMessage();
        }
        return $post instanceof Post ? new PostResource($post) : $post;
        //return redirect(route('post.index'));
    }
    public function show(Post $post)
    {
        return new PostResource($post);
        //return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $catogories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'catogories', 'tags'));
    }
    public function update(UpdateRequest $request, Post $post)
    {
        $post;
        try{
            DB::beginTransaction();
            $data = $request->validated();
            $tags = $data['tags'];
            
            $category = $data['category'];
            unset($data['tags'],$data['category']);
            $tagIds=$this->getTagIdsUpdate($tags);
            $data["category_id"]=$this->getCategoryIdUpdate($category);
            $post->update($data);
            $post->tags()->sync($tagIds);
            $post->fresh();
            
            Db::commit();
        }
        catch(\Exception $exception){
            $post = $exception->getMessage();
            Db::rollback();
            
        }
        return $post instanceof Post ? new PostResource($post) : $post;
        //return redirect(route('post.show', $post->id));
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
    
    private function getTagIds($tags)
    {
        $tagIds=[];
        foreach($tags as $tag){
            $tag=!isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
    private function getTagIdsUpdate($tags)
    {
        
        $tagIds=[];
        foreach($tags as $tag){
            if(!isset($tag['id'])){
                $tag=Tag::create($tag);
            }
            else{
                
                $currentTag=Tag::find($tag["id"]);
                $currentTag->update($tag);
                $tag=$currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
    private function getCategoryId($item)
    {
        $category = !isset($item['id'])? Category::create($item) : Category::find($item['id']);
        return $category;
    }
    private function getCategoryIdUpdate($item)
    {
        if(!isset($category['id'])){
            $category=Category::create($item);
        }
        else{
            
            $currentCategory=Tag::find($item["id"]);
            $currentCategory->update($item);
            $category=$currentCategory->fresh();
        }
        return $category->id;
    }
}