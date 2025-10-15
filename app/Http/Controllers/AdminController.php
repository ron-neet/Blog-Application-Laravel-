<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AdminController extends Controller
{
    public function addPost()
    {
        return view('admin.add_post');
    }

    public function createpost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $post->image = $imagename;

        $post->username = Auth::User()->name;
        $post->user_id = Auth::User()->id;

        if ($post->save()) {
            $request->image->move('img', $imagename);
            return redirect()->route('admin.addpost')->with('status', 'Added Sucessfully');
        }
    }

    public function allpost()
    {
        $post = Post::all();
        return view('admin.allpost', compact('post'));
    }

    public function updatepost($id)
    {
        $post = post::findOrFail($id);
        return view('admin.updatepost', compact('post'));
    }
    public function postupdate(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Find the post
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->username = Auth::user()->name;
        $post->user_id = Auth::user()->id;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $post->image = $imagename;

            // Move the uploaded file to 'public/img'
            $image->move(public_path('img'), $imagename);
        }

        // Save the post
        $post->save();

        return redirect()->route('admin.allpost')->with('status', 'Updated Successfully');
    }

    public function deletepost($id)
    {
        $post = post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.allpost')->with('status', 'Deleted Sucessfully');
    }

}
