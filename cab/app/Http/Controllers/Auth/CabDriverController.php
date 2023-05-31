<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class CabDriverController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::whereNull('approved_at')->get();

      //  $drivers = Driver::latest()->paginate(5);
    
        return view('auth.Driver.index',compact('drivers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('auth.Driver.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.Driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:drivers|max:255',
            'password' =>  'required|min:8|confirmed|max:255',
            'password_confirmation' => 'required',
            'contact' => 'required',
            'gender' => 'required',

        ]);
    
        $post = new Driver;
        $post->full_name =$request->full_name ;
        $post->email =$request->email ;
        $post->password = $request->password;
        $post->contact = $request->contact;
        $post->gender = $request->gender;

        if($request->hasfile('profile_image'))
        {
          $file = $request->file('profile_image');
              $extention = $file->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move('uploads/driver/', $filename);
              $post->profile_image = $filename; 
        }
          $post->save();
 
        return redirect()->route('cabdriver.index')
                        ->with('success','driver created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('auth.posts.show',compact('post'));

    }

    public function approve($user_id)
    {
        $user = Driver::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('cabdriver.index')->withMessage('User approved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('auth.posts.edit',compact('post','categories','tags'));
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
      $post=Post::find($id);
      $post->title = $request->input('title');
      $post->description = $request->input('description');
      $post->category_name = $request->input('category_name');
      $post->status = $request->input('status');

      if($request->hasfile('profile_image'))
      {
        $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/posts/', $filename);
            $post->profile_image = $filename; 
      }
      $post->update();

        return redirect()->route('posts.index')->with('success', 'Post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','post deleted successfully');
    }
}
