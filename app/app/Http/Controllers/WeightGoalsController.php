<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Weight_Goals;
use App\Weight_goal;
use App\Weight_mgmt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WeightGoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('weightMgmt.weightMgmt_start');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Weight_Goals $request)
    {
        $goal = new Weight_goal;
        $goal->user_id = Auth::id();
        $goal->weight = $request->weight;
        $goal->goal = $request->goal;
        $goal->period = $request->period;
        $goal->save();
        return redirect(route('weight_mgmts.index'));
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
    public function edit($weight_goal)
    {
        $goal = Weight_goal::find($weight_goal);
        return view('weightMgmt.weightGoal_edit',[
            'goal' => $goal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Weight_Goals $request, Weight_goal $weight_goal)
    {
       $weight_goal->weight = $request->weight;
       $weight_goal->goal = $request->goal;
       $weight_goal->period = $request->period;
       $weight_goal->save();
       return redirect(route('weight_mgmts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($weight_goal)
    {
        $goal = Weight_goal::find($weight_goal);
        // $weight_mgmt = Weight_mgmt::where('user_id',Auth::id())->get();
        DB::table('weight_mgmts')->where('user_id',Auth::id())->delete();
        $goal->delete();
        return redirect(route('weight_mgmts.index'));
    }
}
