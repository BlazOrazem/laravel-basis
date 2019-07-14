<?php

namespace Admin\Http;

use Illuminate\Http\Request;
use Numencode\Http\Controller;
use Numencode\Utils\Imageable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{
    /**
     * Create a new BaseController instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Return logged in manager.
     *
     * @return \Numencode\Models\Manager
     */
    public function admin()
    {
        return Auth::guard('admin')->user();
    }

    public function saveImage(Request $request)
    {
        Imageable::createFromData(request()->image, $request->crop_path . '/' . basename($request->image_path));

        return 'success';
    }


    /**
     * Delete the given model entity.
     *
     * @param Model  $model Model to be deleted.
     * @param string $msg   Message for a successful delete.
     * @param string $title Title for a successful delete.
     *
     * @return array
     *
     * @throws \Exception
     */
    protected function deleteThe(Model $model, $msg = 'messages.deleted', $title = 'messages.success')
    {
        if ($model->delete()) {
            return [
                'title' => trans("admin::$title"),
                'msg'   => trans("admin::$msg"),
            ];
        }

        return report_error();
    }
}
