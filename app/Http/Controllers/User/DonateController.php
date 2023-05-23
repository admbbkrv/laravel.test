<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function __invoke()
    {
//        $stats = Donate::query()
//            ->where('created_at', '>=', now()->subMonth()->startOfMonth())
//            ->where('created_at', '<=', now()->subMonth()->endOfMonth())
//            ->count();
//            ->sum('amount');
//            ->avg('amount'); //высчитывает среднее число из всех записей
//            ->min('amount');
//            ->min('amount');
        $total_count = Donate::query()->count();
        $total_amount = Donate::query()->sum('amount');
        $avg_amount = Donate::query()->avg('amount');
        $min_amount = Donate::query()->min('amount');
        $max_amount = Donate::query()->max('amount');

        $stats = [
            'total_count' => $total_count,
            'total_amount' => $total_amount,
            'avg_amount'  => $avg_amount,
            'min_amount'  => $min_amount,
            'max_amount'  => $max_amount,
        ];

        return view('user.donates.index', compact('stats'));
    }
}
