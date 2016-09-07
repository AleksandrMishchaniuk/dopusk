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
        // $tolerance_manager = new ToleranceManager();
        // $tolerances_array = $tolerance_manager->getArray();
        // return view('admin.tolerance.index', ['tolerances'=>$tolerances_array]);
        return view('admin.tolerance.index');
    }

    public function getList()
    {
      $tolerance_manager = new ToleranceManager();
      // return 'Hi';
      return $tolerance_manager->getArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.range.create', ['range'=>new Range]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Range::getRules());
        Range::create($request->all());
        return redirect()->route('admin.ranges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $range = Range::find($id);
        return view('admin.range.edit', ['range'=>$range]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Range::getRules());
        Range::find($id)->update($request->all());
        return redirect()->route('admin.ranges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Range::destroy($id);
        return redirect()->route('admin.ranges.index');
    }
}
