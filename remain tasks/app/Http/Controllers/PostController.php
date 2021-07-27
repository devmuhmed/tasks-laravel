<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $postCollection = Post::all(); //select * from posts

        return view('posts.index', ['postCollectionView' => $postCollection]);
    }

    public function show($postId)
    {
        return view('posts.show');
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(StorePostRequest $requestObj)
    {
        //logic to store data in db
        // $requestData = request()->all();
        $requestData = $requestObj->all();

        // $requestObj->validate([
        //     'title' => 'required|min:3',
        //     'description' => 'required',
        //     'post_creator' => ['required','exists:users,id'],
        // ],[
        //     'title.required' => 'override this message',
        //     'title.min' => 'this is a new minimum message',
        // ]);

        //equals insert into
        $post = Post::create([
            // 'title' => $requestData['title'],
            // 'description' => $requestData['description'],
            // 'user_id' => $requestData['post_creator']
            'title' => $requestObj->title,
            'description' => $requestObj->description,
            'user_id' => $requestObj->post_creator
        ]);

        return redirect()->route('posts.index');
    }

}
