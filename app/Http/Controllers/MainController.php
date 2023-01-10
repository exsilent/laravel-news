<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Отображение страницы со списком новостей
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $news = News::forMainPage();
        $categorySelectedId = $request->get('category');

        if ($categorySelectedId > 0) {
            $news->ofCategory($categorySelectedId);
        }

        return view(
            'main',
            [
                'news' => $news->get(),
                'categories' => Category::all(),
                'categorySelectedId' => $categorySelectedId,
            ]
        );
    }

    /**
     * Отображение страницы с подробным описанием новости
     *
     * @param int $newsId Идентификатор новости
     * @return View
     */
    public function show(int $newsId): View
    {
        $newsItem = News::findOrFail($newsId);

        return view('main.newsMore', ['newsItem' => $newsItem]);
    }
}
