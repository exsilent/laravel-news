<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory()
            ->count(20)
            ->create();
    }
}
