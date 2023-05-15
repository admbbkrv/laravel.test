<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return 'post';
    }

    public function create()
    {
        return 'post create';
    }

    public function store()
    {
        return 'post store';
    }

    public function show($post)
    {
        return "post show №{$post}";
    }

    public function edit()
    {
        return 'post edit';
    }

    public function update()
    {
        return 'post update';
    }

    public function delete()
    {
        return 'post delete';
    }

}
