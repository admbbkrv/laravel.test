<?php

namespace App\Http\Controllers\User;

use App\Adam\Test;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\User\IndexUserRequest;
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

    public function index(IndexUserRequest $request)
    {
        $posts = Post::query()->latest('published_at')->oldest('id')->paginate(12, ['id', 'title', 'published_at']);
        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(StorePostRequest $request)
    {
//        for ($i = 0; $i < 99; $i++){
//            $post = new Post();
//            $post->user_id = User::query()->value('id');
//            $post->title = fake()->sentence(5);
//            $post->content = fake()->paragraph();
//            $post->published = true;
//            $post->published_at = fake()->dateTimeBetween(now()->subYear(), now());
//            $post->save();
//        }

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
