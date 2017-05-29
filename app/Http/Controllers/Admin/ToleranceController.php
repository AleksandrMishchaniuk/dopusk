<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tolerance;
use App\Models\Range;
use App\Models\Quality;
use App\Models\Field;

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

    public function getList(Request $request)
    {
        $data = $request->all();
        $system = $data['system'];
        $range_id = (int) $data['range'];
        $tolerances = Tolerance::byRange($range_id)->bySystem($system)->get();
        return $tolerances->toArray();
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
                $item = null;
            }
        } else {
            if ($data['max_val'] || $data['min_val']) {
                $item = Tolerance::create($data);
            }
        }
        return !isset($item) ? null : $item->toArray();
    }

    public function getSystems()
    {
        $res = [];
        foreach (Tolerance::SYSTEMS as $system) {
            $res[] = [
                'type' => 'system',
                'title' => $system
            ];
        }
        return $res;
    }

    public function getRanges()
    {
        $res = [];
        $items = Range::all();
        foreach ($items as $item) {
            $res[] = [
                'id' => $item->id,
                'type' => 'item',
                'max' => $item->max_val,
                'min' => $item->min_val,
            ];
        }
        return $res;
    }

    public function getQualities()
    {
        $res = [];
        $items = Quality::all();
        foreach ($items as $item) {
            $res[] = [
                'id' => $item->id,
                'type' => 'quality',
                'title' => $item->value,
            ];
        }
        return $res;
    }

    public function getFields()
    {
        $res = [];
        $items = Field::all();
        foreach ($items as $item) {
            $res[] = [
                'id' => $item->id,
                'type' => 'field',
                'title' => $item->value,
            ];
        }
        return $res;
    }
}
