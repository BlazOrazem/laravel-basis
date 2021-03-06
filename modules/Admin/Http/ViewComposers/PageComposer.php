<?php

namespace Admin\Http\ViewComposers;

use Illuminate\View\View;
use Numencode\Models\Page\Page;
use Numencode\Models\Content\Menu;
use Illuminate\Support\Facades\Auth;
use Numencode\Models\System\Language;

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
        $view->with('admin', Auth::guard('admin')->user());

        $view->with('menus', $this->getAllWithTree());

        $view->with('locales', Language::getAllLocales()->keys());

        $view->with('activeUrl', $this->buildActiveUrl());

        js([
            'all_languages'     => Language::getAll()->toArray(),
            'selected_language' => config('app.locale'),
        ]);
    }

    /**
     * Return all menus with page tree structure.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getAllWithTree()
    {
        $menus = Menu::all();

        foreach ($menus as &$menu) {
            $menu->tree = $this->buildTreeMenu($menu->code);
        }

        return $menus;
    }

    /**
     * Create page tree structure.
     *
     * @param string $code Menu type code
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function buildTreeMenu($code)
    {
        $items = Page::with('url')->where('menu', $code)->get()->groupBy('parent_id');

        if ($items->count()) {
            $items['root'] = $items[''];
            unset($items['']);
        } else {
            $items = collect(['root' => collect()]);
        }

        return $items;
    }

    /**
     * Build active URL from segments.
     *
     * @return string
     */
    protected function buildActiveUrl()
    {
        $activeUrl = url('/') . '/' . request()->segment(1);

        if (request()->segment(2)) {
            $activeUrl .= '/' . request()->segment(2);
        }

        if (request()->segment(3) && !is_numeric(request()->segment(3))) {
            $activeUrl .= '/' . request()->segment(3);
            if (request()->segment(4) && !is_numeric(request()->segment(4))) {
                $activeUrl .= '/' . request()->segment(4);
            }
        }

        return $activeUrl;
    }
}
