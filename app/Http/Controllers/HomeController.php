<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Alert;

class HomeController extends Controller
{
    public function index()
    {


        if(Auth::id())
        {

                $post=Post::all();

            $usertype=Auth()->user()->usertype;


            if ($usertype == 'user')
            {
                return view('home.homepage', compact('post'));
            }
                else  if ($usertype == 'admin')
                {
                    return view('admin.adminhome');
                }
                    else
                    {
                        return redirect()->back();
                    }

        }
    }

   public function homepage()
   {

        $post = Post::all();

    return view('home.homepage', compact('post'));
   }


   public function post_details($id)
   {

    $post = Post::find($id);

      return view('home.post_details', compact('post'));

   }

   public function create_post()
   {
    return view('home.create_post');
   }


   public function user_post(Request $request)
   {
        $post = new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $post->image=$imagename;
        }

        $post->save();

        Alert::success('Congrats', 'Data Added Successfully');

        return redirect()->back();
   }



   public function my_post()
   {

        $user=Auth::user();

        $userid=$user->id;

        $data = Post::where('user_id', '=', $userid)->get();


    return view('home.my_post', compact('data'));
   }



   public function my_post_del($id)
   {
        $data = Post::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');

   }
}
