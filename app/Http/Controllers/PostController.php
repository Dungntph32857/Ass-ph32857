<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $posts = Post::with(['tags'])->latest('id')->get();
        if ($key = request()->key) {
            $posts = Post::with(['tags'])->latest('id')->where('title', 'like', '%' . $key . '%')->paginate(4);
        }
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        try {

            DB::transaction(function () use ($request) {
                $data = $request->except('image');
                if ($request->hasFile('image')) {
                    $pathFile = Storage::putFile('posts', $request->file('image'));
                    $data['image'] = 'storage/' . $pathFile;
                }

                $post = Post::query()->create($data);
                foreach($request->tags as $key => $tag){
                    $data = Tag::query()->create($tag);
                    $post->tags()->attach($data);
                }      
                
            }, 3);
            return redirect()->route('posts.index')->with('success', 'Thao tác thành công');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $categories = Category::query()->pluck('name', 'id')->all();
        $post->with(['tags']);
        return view('admin.post.show', compact('post','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::query()->pluck('name', 'id')->all();
        $post->with(['tags']);
        return view('admin.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        try {
            DB::transaction(function () use ($post, $request) {
                $data = $request->except('image','tags');
                if ($request->hasFile('image')) {
                    $pathFile = Storage::putFile('posts', $request->file('image'));
                    $data['image'] = 'storage/' . $pathFile;
                }
                $currentImage = $post->image;
                $tags = Tag::query()->whereIn('id', array_keys($request->get('tags', [])))->pluck('id')->all();
                dd($tags);
                $post->tags()->sync($request->tags);

                $post->update($data);

                if ($request->hasFile('image') && $currentImage && file_exists(public_path($currentImage))) {
                    unlink(public_path($currentImage));
                }
            },3);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        try {

            DB::transaction(function () use ($post) {
                $post->tags()->sync([]);

                $post->delete();
            },3);
            
            return back()->with('success', 'Thao tác thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
