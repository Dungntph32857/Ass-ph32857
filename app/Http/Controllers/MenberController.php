<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenberController extends Controller
{
    //  
    public function menber()
    {
        Auth::user();
        return view('client.index');
    }
    public function client()
    {
        $posts = Post::with(['tags'])->latest('id')->get();
        $categories = Category::all();

        return view('client.index', compact('posts', 'categories'));
    }
    public function first_section()
    {
        $posts = Post::with(['tags'])->latest('id')->get();
        $categories = Category::all();

        return view('client.components.first-section', compact('posts', 'categories'));
    }
    public function content_right(Request $request)
    {
        

        $posts = Post::with(['tags'])->latest('id')->get();
        
        $categories = Category::all();
        return view('client.layout.partials.content-right', compact('posts', 'categories'));
    }

    public function header(Request $request)
    {
        $posts = Post::with(['tags']);
    
        $posts = $posts->latest('id')->get();
        $categories = Category::all();
    
        return view('client.layout.partials.header', compact('posts', 'categories', 'category_id'));
    }

    public function chi_tiet()
    {
        return view('client.chi-tiet');
    }
    public function show(string $id)
    {
        $posts = Post::with(['tags'])->latest('id')->get();
        $post = Post::find($id);

        $categories = Category::all();

        return view('client.chi-tiet', compact('post', 'posts', 'categories'));
    }



}
