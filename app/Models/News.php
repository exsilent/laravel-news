<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'category_id',
    ];

    /**
     * Возвращает категорию новости
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope с условиями выборки для главной страницы
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeForMainPage(Builder $query): Builder
    {
        return $query->with('category')->orderByDesc('created_at');
    }

    /**
     * Scope для выборки по заданной категории
     *
     * @param Builder $query
     * @param int $categoryId
     * @return Builder
     */
    public function scopeOfCategory(Builder $query, int $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}
