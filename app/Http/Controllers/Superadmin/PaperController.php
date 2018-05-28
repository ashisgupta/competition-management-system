<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\User;
use App\Prescription_view_permission;
use Illuminate\Support\Facades\Session;
use App\Paper;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "All Submitted Papers";
        $userpapers = Paper::get();//dd($userpapers);
    return view('superadmin.paper.index', compact('userpapers','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function create()
    {
    
    return view('student.paper.create');
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
        'pdfurl' => 'required',
        'title' => 'required',
        'description' => 'required',
        'ppturl' => 'required',
        'videourl' => 'required',
        ]);
    $requestData = $request->all();
    $requestData["user_id"] = Auth::user()->id;
    $paper = Paper::create($requestData);
    Session::flash('flash_message', 'Paper Submitted!');
    return redirect('student/paper');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userpaper = Paper::where("id",$id)->first();//dd($userpaper );
    return view('superadmin.paper.show', compact('userpaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $userpaper = Paper::where("id",$id)->first();
     
    
    return view('student.paper.edit', compact('userpaper'));
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
        'pdfurl' => 'required',
        'title' => 'required',
        'description' => 'required',
        'ppturl' => 'required',
        'videourl' => 'required',
        ]);
    $requestData = $request->all();
    $requestData["user_id"] = Auth::user()->id;
    $userpaper = Paper::findOrFail($id);//dd($requestData);
    $userpaper->update(array_filter($requestData));
    Session::flash('flash_message', 'Paper Updated!');
    return redirect('student/paper');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paper::destroy($id);

        Session::flash('flash_message', 'Paper deleted!');

        return redirect('student/paper');
    }
}
