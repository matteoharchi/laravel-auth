<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get(); //in questo modo mi prende solo quelli dello stesso utente loggato
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'title'=> 'required|min:5|max:100',
            'body'=> 'required|min:5|max:1000'
        ]);
        $data['user_id'] = Auth::id();
        $data['slug']= Str::slug($data['title'], '-');
        $newPost= new Post();
        $newPost->fill($data);
        $saved = $newPost->save();
        $id_post= $newPost->id;
        $newPost->tags()->attach($data['tags']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $newPost->tags->attach($tagId);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data=$request->all(); //racchiude tutte le info di request in un array
        $data['slug']= Str::slug($data['title'], '-'); //The Str::slug method generates a URL friendly "slug" from the given string
        $post->tags()->sync($data['tags']);
        $post->update($data); //aggiorna i valori
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'post cancellato');
    }
}
