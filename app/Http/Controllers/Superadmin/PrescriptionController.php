<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\User;
use App\Prescription_view_permission;
use Illuminate\Support\Facades\Session;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userprescriptions = Prescription::with(['users'])->get();
	//echo "<pre>";
	foreach ($userprescriptions as $value) {
	    $value->prescriptionvp = $value->prescriptionvp;
	    
	}//print_r($userprescriptions->toArray());
		//die;
	return view('superadmin.prescription.index', compact('userprescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
	 $patients =     User::where("role_id",4)->select([\DB::raw("CONCAT_WS(' ', first_name, last_name) as name"),'id'])->pluck('name','id');
	
	return view('superadmin.prescription.create', compact('patients'));
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
		'user_id' => 'required',
		'title' => 'required',
		'description' => 'required',
	    ]);
	$requestData = $request->all();
	$prescription = Prescription::create($requestData);
	Session::flash('flash_message', 'Prescription added!');
	return redirect('superadmin/prescription');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userprescriptions = Prescription::with(['users'])->where("id",$id)->first();//dd($userprescriptions );
	return view('superadmin.prescription.show', compact('userprescriptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $userprescriptions = Prescription::with(['users'])->where("id",$id)->first();//dd($userprescriptions );
	 $patients =     User::where("role_id",4)->select([\DB::raw("CONCAT_WS(' ', first_name, last_name) as name"),'id'])->pluck('name','id');
	
	return view('superadmin.prescription.edit', compact('userprescriptions','patients'));
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
		'user_id' => 'required',
		'title' => 'required',
		'description' => 'required',
	    ]);
        $requestData = $request->all();
        $prescriptiont = Prescription::findOrFail($id);
        $prescriptiont->update($requestData);

        Session::flash('flash_message', 'Prescriptiont updated!');

        return redirect('superadmin/prescription');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prescription::destroy($id);

        Session::flash('flash_message', 'Prescription deleted!');

        return redirect('superadmin/prescription');
    }
}
