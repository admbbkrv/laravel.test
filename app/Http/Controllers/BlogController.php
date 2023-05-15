<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $post = (object) [
            'id' => '1',
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Consequuntur, necessitatibus?',
            'category_id' => '2'
        ];
        $posts = array_fill(0, 10, $post);

        $posts = array_filter($posts, function ($post) use($search, $category_id){
            if ($search and !str_contains(strtolower($post->title), strtolower($search))){
                return false;
            }
            if ($category_id and !str_contains($post->category_id, $category_id)){
                return false;
            }
            return true;
        });

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
