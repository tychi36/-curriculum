<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Weight_mgmt;
use App\Weight_goal;
use Carbon\Carbon;


class WeightMgmtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //目標があるかないか判定
            $data = DB::table('weight_goals')->exists();
            if($data){
                $mgmt = DB::table('weight_mgmts')->where('user_id',Auth::id())->exists();
                //進捗のデータがあるかないか
                if($mgmt){
                    $dairy = Weight_mgmt::where('user_id',Auth::id())->orderBy('date','desc')->first();
                    $goal = Weight_goal::where('user_id',Auth::id())->first();
                    $now = strtotime($dairy['date']);
                    $period = strtotime($goal['period']);
                    $commit = ($period - $now) / 86400;

                    $dairy_prev = Weight_mgmt::where('user_id',Auth::id())->where('date','<',$dairy['date'])->orderBy('date','desc')->first();
                    $dairy_next = Weight_mgmt::where('user_id',Auth::id())->where('date','>',$dairy['date'])->orderBy('date','asc')->first();

                    return view('weightMgmt.weightDetail_list',[
                        'dairy' => $dairy,
                        'goal' => $goal,
                        'commit' => $commit,
                        'dairy_prev' => $dairy_prev,
                        'dairy_next' => $dairy_next,
                    ]);

                }else{
                    return view('weightMgmt.weightRegister');
                }
                
            }else{
                return redirect(route('weight_goals.index'));
            }
    }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weightMgmt.weightRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weight = new Weight_mgmt;
        $weight->user_id = Auth::id();
        $weight->date = $request->date;
        $weight->weight = $request->weight;
        $weight->comment = $request->comment;
        $weight->save();
        return redirect(route('weight_mgmts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($weight_mgmt)
    {
        $dairy = Weight_mgmt::where('id',$weight_mgmt)->first();
        $goal = Weight_goal::where('user_id',Auth::id())->first();
        $now = strtotime($dairy['date']);
        $period = strtotime($goal['period']);
        $commit = ($period - $now) / 86400;
        $dairy_prev = Weight_mgmt::where('user_id',Auth::id())->where('date','<',$dairy['date'])->orderBy('date','desc')->first();
        $dairy_next = Weight_mgmt::where('user_id',Auth::id())->where('date','>',$dairy['date'])->orderBy('date','asc')->first();

        
        return view('weightMgmt.weightDetail_list',[
            'dairy' => $dairy,
            'goal' => $goal,
            'commit' => $commit,
            'dairy_prev' => $dairy_prev,
            'dairy_next' => $dairy_next,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($weight_mgmt)
    {
        $weight_mgmt = Weight_mgmt::find($weight_mgmt);
        return view('weightMgmt.weightUpdate',[
            'weight_mgmt' => $weight_mgmt,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight_mgmt $weight_mgmt)
    {
        $weight_mgmt->date = $request->date;
        $weight_mgmt->weight = $request->weight;
        $weight_mgmt->comment = $request->comment;

        $weight_mgmt->save();
        return redirect(route('weight_mgmts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($weight_mgmt)
    {
        // dd($weight_mgmt);
        $posts = Weight_mgmt::find($weight_mgmt);
        $posts->delete();

        return redirect(route('weight_mgmts.index'));

    }
    
}
