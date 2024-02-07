<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts' => Post::where('user_id', Auth::id())->get()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        // dd(request()->file('thumbnail')->store('thumbnails', 'public'));
        $att = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image',
            'category_id' => 'required|exists:categories,id'
        ]);

        $att['user_id'] = auth()->id();
        $att['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        Post::create($att);
        return redirect('/');
    }

    public function update(Post $post){
        $att = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post->update($att);

        if(isset($att['thumbnail'])){
            $att['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        }

        return back()->with('success', 'Your post has been updated');
    }

    public function edit(Post $post){
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }
    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Your post has been deleted');
    }
}
