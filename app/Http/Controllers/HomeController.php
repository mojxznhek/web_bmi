<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Child;
use App\Models\RhuBhw;
use App\Models\ChildMedicalData;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $medChild = User::select(DB::raw("COUNT(*) as count"), DB::raw("(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("(created_at)"))
                    ->pluck('count', 'month_name');  

        $childObese = ChildMedicalData::where('remarks','=','Obese');
        $obese = $childObese->count();          
        
        $childNormal = ChildMedicalData::where('remarks','=','Normal');
        $normal = $childNormal->count(); 

        $childUnder= ChildMedicalData::where('remarks','=','Underweight');
        $under = $childUnder->count();   

        $childOver= ChildMedicalData::where('remarks','=','Overweight');
        $over = $childOver->count();          
        


         //count in cards
        $userCount = User::count();
        $childCount = Child::count();
        $rhuCount = RhuBhw::count();
        $rhuCount = RhuBhw::count();
        $medCount = ChildMedicalData::count();
        return view('home',[
        'userCount' => $userCount,
        'childCount' => $childCount,
        'rhuCount' => $rhuCount,
        'medCount' => $medCount,
        'obese' =>$obese,
        'normal' =>$normal,
        'under' => $under,
        'over' => $over,
        ]);


    }
}
