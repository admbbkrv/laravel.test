<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\IndexBlogRequest;
use App\Models\Car;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(IndexBlogRequest $request)
    {
//        1 способ
//        $posts = Post::query()->get(['id', 'title', 'published_at']);


//        2 способ
//        $limit = $request->validated('limit');
//        $page = $request->validated('page');
//        $offset = $limit * ($page - 1);
//
//        $posts = Post::query()->limit($limit)->offset($offset)->get(['id', 'title', 'published_at']);

//        3 способ
        $limit = $request->validated('limit');
        $posts = Post::query()->paginate(12, ['id', 'title', 'published_at']);

//        4 способ с сортировкой
        $posts = Post::query()->orderBy('published_at', 'asc')->paginate(12, ['id', 'title', 'published_at']);
        $posts = Post::query()->orderBy('published_at', 'desc')->paginate(12, ['id', 'title', 'published_at']);
//        Сопосбы ниже равнозначны верхним
        $posts = Post::query()->oldest('published_at')->paginate(12, ['id', 'title', 'published_at']);
        $posts = Post::query()->latest('published_at')->oldest('id')->paginate(12, ['id', 'title', 'published_at']);
//        Способ с сортировкой уже отсортированных данных
        $posts = Post::query()->latest('published_at')->oldest('id')->paginate(12, ['id', 'title', 'published_at']);

//        $posts = array_filter($posts, function ($post) use($search, $category_id){
//            if ($search and !str_contains(strtolower($post->title), strtolower($search))){
//                return false;
//            }
//            if ($category_id and !str_contains($post->category_id, $category_id)){
//                return false;
//            }
//            return true;
//        });

        return view('blog.index', compact('posts'));
    }



    public function show()
    {


        $post = (object) [
            'id' => '1',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Consequuntur, necessitatibus?'
        ];

        return view('blog.show', compact('post'));
    }
}
