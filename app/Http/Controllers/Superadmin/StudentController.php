<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\User;
use App\Prescription_view_permission;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "All Users";
        $users = User::whereIn("role_id",array(2,3,4))->orderby("role_id","asc")->get();
        return view('superadmin.student.index', compact('users','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    return view('superadmin.student.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);
    $requestData = $request->all();
    $requestData["role_id"] = 4;
    $requestData["password"] = bcrypt($requestData['password']);
    $user = User::create($requestData);
    Session::flash('flash_message', 'Student added!');
    return redirect('superadmin/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                $user = User::where("id",$id)->first();//dd($userprescriptions );
    return view('superadmin.student.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                 $user = User::where("id",$id)->first();
     
    
    return view('superadmin.student.edit', compact('user'));
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
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'status' => 'required'
        ]);
    $requestData = $request->all();
    if(!empty($requestData["password"])){
        $requestData["password"] = bcrypt($requestData['password']);
    }
    $user = User::findOrFail($id);//dd($requestData);
    $user->update(array_filter($requestData));
    if(isset($user->role_id)){
        if(in_array($user->role_id, [2,3])){
            Session::flash('flash_message', 'Judge/Company Data Updated!');
        } else {
            Session::flash('flash_message', 'Student Updated!');
        }
    } else {
        Session::flash('flash_message', 'User data Updated!');
    }
    Session::flash('flash_message', 'Student Updated!');
    return redirect('superadmin/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::destroy($id);

        Session::flash('flash_message', 'Student deleted!');

        return redirect('superadmin/student');
    }
}
