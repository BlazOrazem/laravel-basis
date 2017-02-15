<?php

namespace Admin\Http;

use Numencode\Models\Plugin;
use Numencode\Models\Content;
use Admin\Repositories\PluginRepository;

class ContentController extends BaseController
{
    /**
     * The Plugin Repository.
     *
     * @var PluginRepository
     */
    protected $pluginRepository;

    /**
     * Create a new plugin controller instance.
     *
     * @param PluginRepository $pluginRepository Plugin repository
     */
    public function __construct(PluginRepository $pluginRepository)
    {
        $this->pluginRepository = $pluginRepository;
    }

    /**
     * Display a listing of the always displayed contents.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contents = Content::whereNull('page_id')->get();

        $this->js(['plugins' => Plugin::orderBy('title')->get()->toArray()]);

        return view('admin::contents.index', compact('contents'));
    }

    /**
     * Store a newly created always displayed content.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'sort_order' => 'required|integer',
        ]);

        if (request()->ajax()) {
            return success();
        }

        if (Content::create([
            'title'         => request()->title,
            'lead'          => request()->lead,
            'body'          => request()->body,
            'plugin_id'     => isset(request()->plugin_id) ? request()->plugin_id : null,
            'plugin_params' => isset(request()->params) ? request()->params : null,
            'sort_order'    => request()->sort_order,
        ])) {
            flash()->success(
                trans('admin::messages.success'),
                trans('admin::contents.created')
            );
        }

        return redirect()->route('contents.index');
    }

    /**
     * Show the always displayed content edit form.
     *
     * @param Content $content Always displayed content
     *
     * @return \Illuminate\View\View
     */
    public function edit(Content $content)
    {
        $plugin = Plugin::find($content->plugin_id);

        if ($content->plugin_id) {
            $this->js(['plugin_id' => $content->plugin_id]);
            $pluginForm = $this->pluginRepository->renderPluginForm($plugin, $content->plugin_params);
        }

        $this->js(['plugins' => Plugin::orderBy('title')->get()->toArray()]);

        return view('admin::contents.edit', [
            'content' => $content,
            'pluginForm' => isset($pluginForm) ? $pluginForm : null]
        );
    }

    /**
     * Update the always displayed content.
     *
     * @param Content $content Always displayed content
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Content $content)
    {
        $this->validate(request(), [
            'position'   => 'required',
            'sort_order' => 'required|integer',
        ]);

        if (request()->ajax()) {
            return success();
        }

        if ($content->update(request()->all())) {
            flash()->success(
                trans('admin::messages.success'),
                trans('admin::contents.updated')
            );
        }

        return redirect()->back();
    }

    /**
     * Delete the always displayed content.
     *
     * @param Content $content Always displayed content
     *
     * @return array
     */
    public function destroy(Content $content)
    {
        return $this->deleteThe($content, 'contents.deleted');
    }
}
