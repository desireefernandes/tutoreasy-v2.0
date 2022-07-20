<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pdf;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
            'image' => ['mimes:jpeg,png'],
            'pdf' => ['mimes:pdf'],
        ]);

        $post = new Post($validatedData);

        $post->user_id = Auth::id();

        $post->save();

        if ($request->hasFile('image') and $request->file('image')->isValid()) {
            $extension = $request->image->extension();
            $image_name = now()->toDateTimeString() . "_" . substr(base64_encode(
                sha1(mt_rand())
            ), 0, 10);

            $path = $request->image->storeAs('posts', $image_name . "." . $extension, 'public');

            $image = new Image();
            $image->post_id = $post->id;
            $image->path = $path;
            $image->save();
        }

        if ($request->hasFile('pdf') and $request->file('pdf')->isValid()) {
            $extension = $request->pdf->extension();
            $pdf_name = now()->toDateTimeString() . "_" . substr(base64_encode(
                sha1(mt_rand())
            ), 0, 10);

            $path = $request->pdf->storeAs('posts', $pdf_name . "." . $extension, 'public');

            $pdf = new Pdf();
            $pdf->post_id = $post->id;
            $pdf->path = $path;
            $pdf->save();
        }

        /** Post::create($request->all()); */


        return redirect('posts')->with('success', 'Post suceccessfully created');
    }

    public function like(Request $request, Post $post)
    {
        if ($post->user_id = Auth::id()) {
            $post->users()->attach(Auth::id());
            return redirect('posts')->with('success', 'Like suceccessfully created');
        } else {
            return redirect('posts')->with('error', 'You need is logged in');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id === Auth::id()) {
            return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('posts.index')
                ->with(
                    'error',
                    "You can't edit this post because are not author"
                )
                ->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
            'image' => ['mimes:jpeg,png'],
            'pdf' => ['mimes:pdf'],
        ]);

        if ($post->user_id === Auth::id()) {
            $post->update($request->all());

            if ($request->hasFile('image') and $request->file('image')->isValid()) {
                $post->image->delete();
                $extension = $request->image->extension();
                $image_name = now()->toDateString() . "_" . substr(base64_encode(sha1(mt_rand())), 0, 10);

                $path = $request->image->storeAs('public/posts', $image_name . "." . $extension);

                $image = new Image();
                $image->path = $path;
                $image->post_id = $post->id;
                $image->save();
            }

            return redirect()->route('posts.index')->with('success', 'Post successfully updated!');
        } else {
            return redirect()->route('posts.index')
                ->with(
                    'error',
                    "You can't update this post because are not author"
                )
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id === Auth::id()) {
            $path = $post->image->path;

            $post->delete();

            Storage::disk('public')->delete($path);

            return redirect()->route('posts.index')
                ->with('success', 'Post successfully deleted!');
        } else {
            return redirect()->route('posts.index')
                ->with(
                    'error',
                    "You can't delete this post because are not author"
                )
                ->withInput();
        }
    }
}
