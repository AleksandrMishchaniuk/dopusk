<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tolerance;
use App\Services\ToleranceManager;

class ToleranceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tolerance = new Tolerance;
        return view('admin.tolerance.index', ['tolerance' => $tolerance]);
    }

    public function getList()
    {
        set_time_limit(60);
        $tolerance_manager = new ToleranceManager();
        return $tolerance_manager->getArray();
    }

    public function postSave(Request $request)
    {
        $this->validate($request, Tolerance::getRules(), Tolerance::getErrMsgs());
        $data = $request->all();
        $id = (int) $data['id'];
        if ($id) {
            $item = Tolerance::find($id);
            if ($data['max_val'] || $data['min_val']) {
                $item->update($data);
            } else {
                $item->delete();
                $id = null;
            }
        } else {
            if ($data['max_val'] || $data['min_val']) {
                $id = Tolerance::create($data)->id;
            }
        }
        return $id;
    }
}
