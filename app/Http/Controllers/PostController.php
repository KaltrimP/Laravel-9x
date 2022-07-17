<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function home(){

        $drDown = post::orderBy('id')->pluck('Author','id');
        $posts = post::latest()->filter(request(['search']))->paginate(4);

        // return view ('home', ['drDown'=>$drDown, 'posts'=>$posts]);
        return view('home', compact('posts'));
    }
    public function myPosts(){
        $user = Auth::user()->post()->get();
        return view('myposts', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $auths = post::orderBy('id')->pluck('Author','id')->prepend('All Authors', '');
        return view('newpost', compact('auths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Body' => 'required',
        ]);
        // post::create($post);
        $post = new post;
        $post->Title  = $request->Title;
        $post->Author  = $request->Author;
        $post->Body  = $request->Body;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('home')->with('message', "Post created successfully.");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = post::find($id);
        return view('show', ['show'=>$show]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = post::find($id);
        return view('edit', ['edit'=>$edit]);

        //
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
        $request->validate([
            'Title'=>'required',
            'Author'=>'required',
            'Body'=>'required',
        ]);

        $input = $request->all();
        $update = post::find($id);

        $update->Title = $request->Title;
        $update->Author = $request->Author;
        $update->Body = $request->Body;
        $update->save();

        // $update->Title = $input['Title'];
        // $update->Author = $input['Author'];
        // $update->Body = $input['Body'];
        // $update->save();
        return redirect ()->route('home')->with('message', 'Post Successfully Updated!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->route('home')->with('info', 'Post deleted Successfully ');

    }
    public function logOut(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function searchIt(Request $request){
        $search =  post::where('Title', 'LIKE', '%{$request->search}%')->orWhere('Author', 'like', '%{$request->search}%')->get();
        return view ('search', compact('search'));
    }

}
