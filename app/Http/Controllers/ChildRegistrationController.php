<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChildRegistrationRequest;
use Hash;

class ChildRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('app.login_children.activation');
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
            'usernmae' => ['unique', 'max:255', 'string'],
            'password' => 'required|same:confirm-password',

        ];

        //custom validation error messages.
        $messages = [
            'username.exists' => 'username is already registered',
        ];
        
        //validate the request.
        $request->validate($rules,$messages);
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
    public function store(Request $request)
    {
            $validated = $this->validator($request);
            if ($request->hasFile('photo')) {
                $validated['photo'] = $request->file('photo')->store('public');
            }


            if($validated == false){
                Child::create([
                    'completename' => $request['completename'],
                    'photo' => $request['photo'],
                    'dob' => $request['dob'],
                    'gender' => $request['gender'],
                    'mothersName' => $request['gender'],
                    'address' => $request['address'],
                    'phone' => $request['phone'],
                    'username' => $request['username'],
                    'password' => Hash::make($request['password']),
                ]);



            // $child = Child::create($validated);

            return redirect()
                ->route('activation')
                ->withSuccess(__('crud.common.created'));
            }
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