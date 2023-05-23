<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChildStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RhuBhw;
use App\Models\ChildMedicalData;
use App\Models\HealthTips;
use DB;
use Carbon\Carbon;
use Auth;
use App\Charts\ChildCharts;
use App\Models\ChildParent;

class ChildRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        //  $this->middleware('child');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.login_children.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildStoreRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }
        $childParent = ChildParent::create([
            'completename' => $request['mothersName'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        $latestParent = DB::table('child_parents')->select('id')->orderBy('id', 'DESC')->first();


        $child = Child::create($validated);
        return redirect()
            ->route('activation')
            ->withSuccess(__('crud.common.created'));

    }


    public function index()
    {
        return view('app.login_children.index');
    }

    public function activation()
    {
        return view('app.login_children.activation');
    }

    public function childDashboard(Request $id)
    {
        $childId = Child::find(Auth::user()->id);
        // dd($childId->id);

        $selectByMothers = Child::select('*')
            ->where('mothersName', '=', $childId->mothersName)->get();

        $medicalData = ChildMedicalData::select('*')
            ->where('child_id', '=', $childId->id)->get();

        // dd($medicalData);

        // $mykids = Child::all('')
        // $shares = DB::table('child_medical_data')
        //     ->join('children', 'children.mothersname', '=', 'shares.user_id')
        //     ->join('followers', 'followers.user_id', '=', 'users.id')
        //     ->where('followers.follower_id', '=', 3)
        //     ->get();

        // $shares = DB::table('shares')
        //     ->join('users', 'users.id', '=', 'shares.user_id')
        //     ->join('followers', 'followers.user_id', '=', 'users.id')
        //     ->where('followers.follower_id', '=', 3)
        //     ->get();

        //=======================================================================================bar chart for weight
        $labelerCheckup = ChildMedicalData::select('*')
            //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //un comment if sqlite
            //->groupBy('checkup_followup') //uncomment if mysql
            ->where("child_id", "=", $childId->id)
            ->orderBy('checkup_followup', 'ASC')
            ->get();
        $cusLabelPerMonth = []; //create an empty array to store custom label
        foreach ($labelerCheckup as $weight) {
            $month = Carbon::parse($weight->checkup_followup)->format('M-d-Y');
            array_push($cusLabelPerMonth, $month);
        }
        $chartPieWeight = new ChildCharts(); //Extends Charts/UserLineChar/ class     
        $chartPieWeight->labels($cusLabelPerMonth);
        $childWeight = ChildMedicalData::select('*')
            //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //uncomment if sqlite
            ->where('child_id', '=', $childId->id)
            //->groupBy('checkup_followup') //uncomment if mysql
            ->pluck('weight');
        $chartPieWeight->dataset('Child Weight', 'line', $childWeight)
            ->options([
                'fill' => 'true',
                'borderColor' => '#51C1C0'
            ])
            ->color(collect(['#7d5fff', '#32ff7e', '#ff4d4d', '#8C1C51', '#48DBCC', '#D6E785']))
            ->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#8C1C51', '#48DBCC', '#D6E785']));
        // =======================================================================================end of bar chart

        // =======================================================================================line chart for remarks
        $labelerRemarks = ChildMedicalData::select('*')
            ->groupBy('remarks')
            ->orderBy('checkup_followup', 'ASC')
            ->where("child_id", '=', $childId->id)
            ->get();
        $cusLabelPerRemarks = []; //create an empty array to store custom label
        foreach ($labelerRemarks as $child) {
            //  $month =   Carbon::parse($child->checkup_followup)->format('M-d-Y');
            array_push($cusLabelPerRemarks, $child->remarks);
            //  array_push($cusLabelPerRemarks,$month);
        }

        $chartPieRemarks = new ChildCharts();
        //Extends Charts/UserLineChar/ class     
        $chartPieRemarks->labels($cusLabelPerRemarks); //array contains of custom of labels

        $childRemarks = ChildMedicalData::select(\DB::raw("COUNT('remarks') as count"))
            ->where('child_id', '=', $childId->id)
            ->groupBy('remarks')
            ->pluck('count');

        $chartPieRemarks->dataset('Child BMI', 'pie', $childRemarks)
            ->options([
                'fill' => 'true',
                'borderColor' => '#51C1C0'
            ])
            ->color(collect(['#7d5fff', '#32ff7e', '#ff4d4d', '#8C1C51', '#48DBCC', '#D6E785']))
            ->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#8C1C51', '#48DBCC', '#D6E785']));
        // =========================================================================================end of pi chart

        // =========================================================================================medical record


        //medical record
        $medrecord = ChildMedicalData::select("*")
            ->where("child_id", '=', $childId->id)
            ->get();

        //get all  remarks associated with child
        $remarks = DB::table('child_medical_data')
            ->select('remarks', 'child_id')
            ->join('children', 'children.id', '=', 'child_medical_data.child_id')
            ->where('child_id', '=', $childId->id)
            ->get();
        $healthTipsUrl = []; //create an empty array to store custom label
        foreach ($remarks as $data) {
            $healthTips = HealthTips::select('*')
                ->where('content', 'LIKE', "%" . $data->remarks . "%")
                ->get();
            if (!$healthTips->empty()) {
                array_push($healthTipsUrl, $healthTips['0']->url);
            }

        }
        // dd($healthTipsUrl);
        return view('app.login_children.index', [
            'childPieWeight' => $chartPieWeight,
            'childPieRemarks' => $chartPieRemarks,
            'healthObese' => $healthTipsUrl,
            'medrecord' => $medrecord,
            'allrecords' => $selectByMothers,
        ]);
    }

    public function viewIndividual(Request $request, $id)
    {
        $labelerCheckup = ChildMedicalData::select('*')
            //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //un comment if sqlite
            //->groupBy('checkup_followup') //uncomment if mysql
            ->where("child_id", "=", $id)
            ->orderBy('checkup_followup', 'ASC')
            ->get();
        $cusLabelPerMonth = []; //create an empty array to store custom label
        foreach ($labelerCheckup as $weight) {
            $month = Carbon::parse($weight->checkup_followup)->format('M-d-Y');
            array_push($cusLabelPerMonth, $month);
        }
        $chartPieWeight = new ChildCharts(); //Extends Charts/UserLineChar/ class     
        $chartPieWeight->labels($cusLabelPerMonth);
        $childWeight = ChildMedicalData::select('*')
            //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //uncomment if sqlite
            ->where('child_id', '=', $id)
            //->groupBy('checkup_followup') //uncomment if mysql
            ->pluck('weight');
        $chartPieWeight->dataset('Child Weight', 'line', $childWeight)
            ->options([
                'fill' => 'true',
                'borderColor' => '#51C1C0'
            ])
            ->color(collect(['#7d5fff', '#32ff7e', '#ff4d4d', '#8C1C51', '#48DBCC', '#D6E785']))
            ->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#8C1C51', '#48DBCC', '#D6E785']));
        // =======================================================================================end of bar chart

        // =======================================================================================line chart for remarks
        $labelerRemarks = ChildMedicalData::select('*')
            ->groupBy('remarks')
            ->orderBy('checkup_followup', 'ASC')
            ->where("child_id", '=', $id)
            ->get();
        $cusLabelPerRemarks = []; //create an empty array to store custom label
        foreach ($labelerRemarks as $child) {
            //  $month =   Carbon::parse($child->checkup_followup)->format('M-d-Y');
            array_push($cusLabelPerRemarks, $child->remarks);
            //  array_push($cusLabelPerRemarks,$month);
        }

        $chartPieRemarks = new ChildCharts();
        //Extends Charts/UserLineChar/ class     
        $chartPieRemarks->labels($cusLabelPerRemarks); //array contains of custom of labels

        $childRemarks = ChildMedicalData::select(\DB::raw("COUNT('remarks') as count"))
            ->where('child_id', '=', $id)
            ->groupBy('remarks')
            ->pluck('count');

        $chartPieRemarks->dataset('Child BMI', 'pie', $childRemarks)
            ->options([
                'fill' => 'true',
                'borderColor' => '#51C1C0'
            ])
            ->color(collect(['#7d5fff', '#32ff7e', '#ff4d4d', '#8C1C51', '#48DBCC', '#D6E785']))
            ->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#8C1C51', '#48DBCC', '#D6E785']));
        // =========================================================================================end of pi chart

        // =========================================================================================medical record


        //medical record
        $medrecord = ChildMedicalData::select("*")
            ->where("child_id", '=', $id)
            ->get();

        //get all  remarks associated with child
        $remarks = DB::table('child_medical_data')
            ->select('remarks', 'child_id')
            ->join('children', 'children.id', '=', 'child_medical_data.child_id')
            ->where('child_id', '=', $id)
            ->get();
        $healthTipsUrl = []; //create an empty array to store custom label
        foreach ($remarks as $data) {
            $healthTips = HealthTips::select('*')
                ->where('content', 'LIKE', "%" . $data->remarks . "%")
                ->get();
            if (!$healthTips->empty()) {
                array_push($healthTipsUrl, $healthTips['0']->url);
            }

        }
        $medicalData = ChildMedicalData::select('*')
            ->where('child_id', '=', $id)->get();
        // dd($medicalData);
        return view('app.login_children.indvidual', [
            'medrecord' => $medicalData,
            'childPieWeight' => $chartPieWeight,
            'childPieRemarks' => $chartPieRemarks,
            'healthObese' => $healthTipsUrl,
        ]);

    }


    public function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'photo' => ['nullable', 'file'],
            'completename' => ['required', 'max:50', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'mothersName' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'username' => ['unique:children,username', 'max:255', 'string'],
            'password' => 'required|same:confirm-password',

        ];

        //custom validation error messages.
        $messages = [
            'username.exists' => 'username is already registered',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }
}