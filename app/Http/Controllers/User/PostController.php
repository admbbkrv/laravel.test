<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
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

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = User::query()->value('id') ?? null;
        $post->published_at = new Carbon($validated['published_at'] ?? null);
        $post->save();

        return redirect()->route('user.index');
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
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);
    }

    public function delete()
    {
        return view('user.posts.destroy');
    }

}
