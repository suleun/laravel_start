<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        // dd($posts);

        return view('hbl.list', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hbl.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $fileName = NULL;

        if($request->hasFile('image')) {
            // dd($request->file('image'));
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
            $path = $request->file('image')
                ->storeAs('/public/images', $fileName);
            // dd($path);
        }


        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>auth()->user()->id,
            'image'=>$fileName,
        ]);

        return redirect()->route('post.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('hbl.show', ['post'=>$post]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('hbl.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
    
        if($request->hasFile('image')){

            if($post->image){
                Storage::delete("/public/images".$post->image);
            }

            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
            $path = $request->file('image')
                ->storeAs('/public/images', $fileName);

            $post->image = $fileName;


        }

        $post->title = $request->title;
        $post->content = $request->content;        

        $post->save();

       return redirect()->route('post.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        
             // 게시글에 딸린 이미지가 있으면 파일시스템에서도 삭제해줘야 한다.
        if($post->image) {
            Storage::delete('public/images/'.$post->image);
        }
    
            $post->delete();
    
            return redirect()->route('post.list');
    }
}
