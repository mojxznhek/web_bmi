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
use DB;
use Carbon\Carbon;

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
            // if($validated == false){
            //     Child::create([
            //         'completename' => $request['completename'],
            //         'photo' => $request['photo'],
            //         'dob' => $request['dob'],
            //         'gender' => $request['gender'],
            //         'mothersName' => $request['gender'],
            //         'address' => $request['address'],
            //         'phone' => $request['phone'],
            //         'username' => $request['username'],
            //         'password' => Hash::make($request['password']),
            //     ]);
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

    public function childDashboard(){
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
        return view('app.login_children.index',[
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
            'username' => [ 'unique:children,username', 'max:255', 'string'],
            'password' => 'required|same:confirm-password',

        ];

        //custom validation error messages.
        $messages = [
            'username.exists' => 'username is already registered',
        ];
        
        //validate the request.
        $request->validate($rules,$messages);
    }
}