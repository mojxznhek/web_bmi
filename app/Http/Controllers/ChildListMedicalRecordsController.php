<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildMedicalData;
use DB;
use Carbon\Carbon;
use Auth;
use App\Charts\ChildCharts;
class ChildListMedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //=======================================================================================bar chart for weight
         $labelerCheckup = ChildMedicalData::select('checkup_followup')
                    //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //un comment if sqlite
                    ->groupBy('checkup_followup') //uncomment if mysql
                    ->orderBy('checkup_followup', 'ASC')
                    ->get(); 

        $cusLabelPerMonth = []; //create an empty array to store custom label
        foreach($labelerCheckup as $weight)
        {
             $month =   Carbon::parse($weight->checkup_followup)->format('M-d-Y');
             array_push($cusLabelPerMonth,$month);
        }

        $chartPieWeight = new ChildCharts();    //Extends Charts/UserLineChar/ class     
        $chartPieWeight->labels($cusLabelPerMonth);
        $childWeight = ChildMedicalData::select('weight')
                    ->where('child_id', '=', $id)
                    //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //uncomment if sqlite
                    ->groupBy('checkup_followup') //uncomment if mysql
                    ->pluck('weight');
        $chartPieWeight->dataset('Child Weight', 'bar',$childWeight)
        ->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ])
        ->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#8C1C51','#48DBCC','#D6E785']))
        ->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838','#8C1C51','#48DBCC','#D6E785']));
        // =======================================================================================end of bar chart

        // =======================================================================================line chart for remarks
        $labelerRemarks = ChildMedicalData::select('*')
                    ->groupBy('remarks')
                    // ->orderBy('checkup_followup', 'ASC')
                    ->get(); 

        $cusLabelPerRemarks = []; //create an empty array to store custom label
        foreach($labelerRemarks as $child)
        {
            //  $month =   Carbon::parse($child->checkup_followup)->format('M-d-Y');
              array_push($cusLabelPerRemarks,$child->remarks);
            //  array_push($cusLabelPerRemarks,$month);
        }

        $chartPieRemarks = new ChildCharts();    //Extends Charts/UserLineChar/ class     
        $chartPieRemarks->labels($cusLabelPerRemarks); //array contains of custom of labels

        $childRemarks = ChildMedicalData::select(\DB::raw("COUNT(remarks) as count"))
            ->where('child_id', '=', $id)
            ->groupBy('remarks') //uncomment if using mysql
            //->groupBy(\DB::raw('remarks')) //uncomment if using sqlite                     
            ->pluck('count');  

        $chartPieRemarks->dataset('Child BMI', 'pie',$childRemarks)
        ->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ])
        ->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#8C1C51','#48DBCC','#D6E785']))
        ->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838','#8C1C51','#48DBCC','#D6E785']));
        // =========================================================================================end of pi chart
        
        // =========================================================================================medical record
        $medrecord = ChildMedicalData::select("*")
            ->where("child_id",'=',$id)
            ->get();
        // =========================================================================================
        return view('app.children.medrecord',[
            'medrecord' => $medrecord,
            'chartPieWeight' => $chartPieWeight,
            'chartPieRemarks' => $chartPieRemarks,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}