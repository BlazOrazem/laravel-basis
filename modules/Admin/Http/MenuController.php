<?php

namespace Admin\Http;

use Numencode\Models\Menu;
use Illuminate\Validation\Rule;

class MenuController extends BaseController
{
    /**
     * Display a listing of the menu types.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin::menus.index', compact('menus'));
    }

    /**
     * Store a newly created menu.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(
            request(),
            [
                'code'       => 'required|unique:menus',
                'title'      => 'required',
                'sort_order' => 'required|integer',
            ]
        );

        if (request()->ajax()) {
            return ajaxSuccess();
        }

        if (Menu::create(
            [
                'code'       => snake_slug(request()->code),
                'title'      => ucfirst(request()->title),
                'sort_order' => request()->sort_order,
            ]
        )) {
            flash()->success(
                trans('admin::messages.success'),
                trans('admin::menus.created', ['name' => request()->title])
            );
        }

        return redirect()->route('menus.index');
    }

    /**
     * Show the menu edit form.
     *
     * @param Menu $menu Menu type
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        $menus = Menu::all();

        return view('admin::menus.edit', compact('menus', 'menu'));
    }

    /**
     * Update the menu.
     *
     * @param Menu $menu Menu type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Menu $menu)
    {
        $this->validate(
            request(),
            [
                'code'       => ['required', Rule::unique('menus')->ignore($id)],
                'title'      => 'required',
                'sort_order' => 'required|integer',
            ]
        );

        if (request()->ajax()) {
            return ajaxSuccess();
        }

        if ($menu->update(
            [
                'code'       => snake_slug(request()->code),
                'title'      => ucfirst(request()->title),
                'sort_order' => request()->sort_order,
            ]
        )) {
            flash()->success(
                trans('admin::messages.success'),
                trans('admin::menus.updated', ['name' => request()->title])
            );
        }

        return redirect()->route('menus.index');
    }

    /**
     * Delete the menu type.
     *
     * @param Menu $menu Menu type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            return [
                'title' => trans('admin::messages.success'),
                'msg'   => trans('admin::menus.deleted'),
            ];
        }

        return reportError();
    }
}
