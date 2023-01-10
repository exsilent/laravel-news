<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManagerController extends Controller
{
    /**
     * Отображение страницы управления со списком новостей
     *
     * @return View
     */
    public function index(): View
    {
        $news = News::forMainPage()->get();

        return view('manager', ['news' => $news]);
    }

    /**
     * Отображение страницы создания новости
     *
     * @return View
     */
    public function create(): View
    {
        return view(
            'manager.newsForm',
            [
                'newsItem' => null,
                'categories' => Category::all(),
            ]
        );
    }

    /**
     * Отображение страницы изменения новости
     *
     * @param int $newsId Идентификатор новости
     * @return View
     */
    public function edit(int $newsId): View
    {
        $newsItem = News::findOrFail($newsId);

        return view(
            'manager.newsForm',
            [
                'newsItem' => $newsItem,
                'categories' => Category::all(),
            ]
        );
    }

    /**
     * Обработка запроса на создание новости
     *
     * @param StoreNewsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $newsItem = News::create($request->validated());

        return redirect()->route('manager.edit', ['id' => $newsItem->id]);
    }

    /**
     * Обработка запроса на изменение новости
     *
     * @param StoreNewsRequest $request
     * @param int $newsId Идентификатор новости
     * @return RedirectResponse
     */
    public function update(StoreNewsRequest $request, int $newsId): RedirectResponse
    {
        News::findOrFail($newsId)
            ->update($request->validated());

        return redirect()->route('manager.edit', ['id' => $newsId]);
    }

    /**
     * Обработка запроса на удаление новости
     *
     * @param int $newsId Идентификатор новости
     * @return RedirectResponse
     */
    public function delete(int $newsId): RedirectResponse
    {
        News::findOrFail($newsId)->delete();

        return redirect()->route('manager.index');
    }
}
