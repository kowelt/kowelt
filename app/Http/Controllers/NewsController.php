<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::withAll()->where('active', 1)->get();

        return view('news', [
            'news' => $news,
            'navigation' => 'news',
        ]);
    }
}
