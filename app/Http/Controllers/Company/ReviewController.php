<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Prescription_view_permission;
use Illuminate\Support\Facades\Session;
use App\Paper;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userpapers = Review::get();//dd($userpapers);
    return view('company.review.index', compact('userpapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $request)
    { $paper_id = $request["paper_id"];
    $userpapers = Paper::orderBy('title')->pluck('title', 'id');;//dd($userpapers);
    return view('company.review.create', compact('userpapers','paper_id'));
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
        'content' => 'required',
        'quality' => 'required',
        'performance' => 'required',
        'remark' => 'required',
        'paper_id' => 'required'
        ]);
    $requestData = $request->all();
    $requestData["user_id"] = Auth::user()->id;//dd($requestData);
    $paper = Review::create($requestData);
    Session::flash('flash_message', 'Review Submitted!');
    return redirect('company/paper');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $review = Review::where("id",$id)->first();
        $page_title = "Paper Title : ".$review->paper->title;
    return view('company.review.show', compact('review','page_title'));
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
     
    
    return view('company.paper.edit', compact('userpaper'));
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
    return redirect('company/paper');
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

        return redirect('company/paper');
    }
}
