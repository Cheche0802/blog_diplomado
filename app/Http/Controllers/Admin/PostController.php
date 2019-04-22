<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderby('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $posts = Post::create($request->all());
        // dd($request->all());
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $posts->fill(['file' => asset($path)])->save();
        }

        $posts->tags()->sync($request->get('tags'));


        return redirect()->route('posts.index', $posts->id)
            ->with('info', 'Entrada Creada con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('pass', $post);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $this->authorize('pass', $posts);
        $categories = Category::orderby('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.edit', compact('posts', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $posts = Post::find($id);
        $this->authorize('pass', $posts);
        $posts->fill($request->all())->save();

        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $posts->fill(['file' => asset($path)])->save();
        }

        $posts->tags()->sync($request->get('tags'));

        return redirect()->route('posts.index', $posts->id)
            ->with('info', 'Entrada Actualizada con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $posts= Post::find($id);
        $this->authorize('pass', $posts);
        $posts->delete();
        return back()->with('info', 'Etiqueta eliminada con exito');
    }
}
