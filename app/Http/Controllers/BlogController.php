<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\IndexBlogRequest;
use App\Models\Car;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
//        $limit = $request->validated('limit');
//        $posts = Post::query()->paginate(12, ['id', 'title', 'published_at']);

//        4 способ с сортировкой
//        $posts = Post::query()->orderBy('published_at', 'asc')->paginate(12, ['id', 'title', 'published_at']);
//        $posts = Post::query()->orderBy('published_at', 'desc')->paginate(12, ['id', 'title', 'published_at']);
//        Сопосбы ниже равнозначны верхним
//        $posts = Post::query()->oldest('published_at')->paginate(12, ['id', 'title', 'published_at']);
//        $posts = Post::query()->latest('published_at')->oldest('id')->paginate(12, ['id', 'title', 'published_at']);
//        Способ с сортировкой уже отсортированных данных
//        $posts = Post::query()->latest('published_at')->oldest('id')->paginate(12, ['id', 'title', 'published_at']);

        // 4 способ с использование условия where()
//        $posts = Post::query()
//            ->where('published_at', null)
//            ->where('published_at', '=', null) /* or */  ->whereNull('published_at')
//            ->where('published_at', '!=', null) /* or */  ->whereNotNull('published_at')
//            ->whereColumn('title', 'content')
//            ->whereIn('id', [1, 2, 5, 12, 77])
//            ->whereNotIn('id', [1, 2, 5, 12, 77])
//            ->whereDate('published_at', new Carbon('2022-06-09'))
//            ->whereYear('published_at', 2023)
//            ->whereMonth('published_at', 5)
//            ->whereDay('published_at', 5)
//            ->whereBetween('id', [1, 5])
//            ->whereBetween('published_at', [
//                new Carbon('2022-01-01'),
//                new Carbon('2022-08-1')
//            ])
//            ->orWhere('id', 12)
//                Взять в скобки несколько условий. Метод ниже
//            ->where(function (Builder $query){
//                $query
//                    ->where('published', true)
//                    ->whereNotNull('published_at');
//            })
//            ->orWhere('id', 12)
//            ->paginate(12);
//
//          Использования метода 'when()'. Когда значение передаваемое в этот метод будет отлично от null, то он выполнит первую функцию, а если
//        будет равно null, то выполнит вторую функцию.
//        $fromDate = new Carbon('2023-01-01 00:00:00');
//        $fromDate = null;
//        $toDate = new Carbon('2023-01-30 00:00:00');
//        $posts = Post::query()
//            ->when($fromDate, function (Builder $query, Carbon $fromDate){
//                $query->where('published_at','>=', $fromDate);
//            }, function (Builder $query){
//                $query->where('published_at', '>=', now()->startOfYear());
//            })
//            ->paginate(12);
//        или так
//        $query = Post::query();
//        $fromDate
//            ? $query->where('published_at','>=', $fromDate)
//            : $query->where('published_at', '>=', now()->startOfYear());
//        $query->paginate(12);
//
//        $posts = array_filter($posts, function ($post) use($search, $category_id){
//            if ($search and !str_contains(strtolower($post->title), strtolower($search))){
//                return false;
//            }
//            if ($category_id and !str_contains($post->category_id, $category_id)){
//                return false;
//            }
//            return true;
//        });

        $validated = $request->validated();
        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null){
            $query->where('title', 'like', "%{$search}%");
        }

        if ($fromDate = $validated['from_date'] ?? null){
            $query->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null){
            $query->where('published_at', '<=', new Carbon($toDate));
        }

        if ($tag = $validated['tag'] ?? null){
            $query->whereJsonContains('tags', $tag);
        }


        $posts = $query
            ->latest('published_at')
            ->paginate(12);
        return view('blog.index', compact('posts'));
    }



    public function show(Request $request,/*Если используете кэширование, не указаывать класс*/ Post $post)
    {
//        Если вы хотите использовать кэширование, то способ "Route Model Binding" не подойдет, так как он вызывая функцию, будет автоматически вызывать
//        объект клаасс Post при каждом вызове функции. Следовательно, нужно принимать только id, а не объект класса.
//        Пример кэширование ниже
//        $post = cache()->remember(
//            key: 'posts.{$post}',
//            ttl: now()->addHour(),
//            callback: function () use ($post) {
//                return Post::query()->findOrFail($post, ['id', 'title', 'content']);
//            }
//        );

//      Методы без задание класса перемонной $post (Post $post)
//        $post = Post::query()->where('user_id', 123)->oldest('id')->first(['id', 'title']);
//        $post = Post::query()->where('user_id', 123)->oldest('id')->firstOrFail(['id', 'title']);
//        $post = Post::query()->find($post, ['id', 'title', 'content']);
//        $post = Post::query()->findOrFail($post, ['id', 'title', 'content']);

//        $posts = Post::query()->find([1,5,14], ['id', 'title', 'content']);

//       Если у вас таблице очень много записей и вам необходимо внести изменение в каждую запись, но вызвать все запись разом не является возможно в виду
//        их большого количества. В таком случае используется метод класса Query 'chunk'. Пример использования приведен ниже.
//        Post::query()
//            ->chunk(10, function (Collection $posts){
//                foreach ($posts as $post){
//                    $post->update(['published' => true]);
//                }
//            });
//          Если не нужно менять а все, а только некоторые
//        Post::query()
//            ->where('published', false) -
//            ->chunkById(10, function (Collection $posts){
//                foreach ($posts as $post){
//                    $post->update(['published' => true]);
//                }
//            });

        return view('blog.show', compact('post'));
    }
}
