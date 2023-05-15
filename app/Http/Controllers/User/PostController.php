<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public $post = [
        'id' => '1',
        'title' => 'Lorem ipsum dolor sit amet.',
        'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Consequuntur, necessitatibus?'
    ];

    public function __construct()
    {
        $this->post = (object) $this->post;
    }

    public function index()
    {


        $posts = array_fill(0, 10, (object) $this->post);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        dd($title, $content);
    }

    public function show($post)
    {
        $post = (object) $this->post;

        return view('user.posts.show', compact('post'));
    }

    public function edit()
    {
        $post = (object) $this->post;

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        dd($title, $content,);
    }

    public function delete()
    {
        return view('user.posts.destroy');
    }

}
