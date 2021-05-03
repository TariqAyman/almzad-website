<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::query()->where('status', 1)->whereHas('auctions')->withCount('auctions')->limit(6)->get();

        $view->with('categoriesLayout', $categories);
    }
}
