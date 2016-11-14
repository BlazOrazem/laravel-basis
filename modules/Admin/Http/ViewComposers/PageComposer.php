<?php

namespace Admin\Http\ViewComposers;

use Illuminate\View\View;
use Numencode\Models\Menu;

class PageComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view Instance of Illuminate\View\View
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', Menu::getAllWithTree());
    }
}
