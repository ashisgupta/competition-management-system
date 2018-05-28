@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Paper Details</div>
                    <div class="panel-body">

                        <a href="{{ url('/judge/paper') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                     <!--    <a href="{{ url('/superadmin/paper/' . $review->id . '/edit') }}" title="Edit Account"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['superadmin/paper', $review->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!} -->
                        <br/>
                        <br/>

                            <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                     <tr>
            <th>Title</th>
            <td>{{ucfirst($review->paper->title)}} </td>
            </tr>
            <tr>
            <th>Description</th>
            <td>{{ucfirst($review->paper->description)}}</td>
            </tr>
             <tr>
            <th>PDF</th>
            <td>
                <a href="{{$review->paper->pdfurl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> View PDF</button></a>
            </td>
            </tr>
            <tr>
            <th>PPT URL</th>
            <td>
                <a href="{{$review->paper->ppturl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> Download PPT</button></a>
            </td>
            </tr>
            <tr>
            <th>Video URL</th>
              <td>
                <a href="{{$review->paper->videourl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> View Video</button></a>
            </td>
            </tr>
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="panel-heading">Review Submitted</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                     <tr>
            <th>Quality</th>
            <td>{{ucfirst($review->quality)}} </td>
            </tr>
            <tr>
            <th>Content</th>
            <td>{{ucfirst($review->content)}}</td>
            </tr>
            <tr>
            <th>Performance</th>
            <td>{{ucfirst($review->performance)}}</td>
            </tr>
            <tr>
            <th>Remarks</th>
            <td>{{ucfirst($review->remark)}}</td>
            </tr>
            
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
</div>
@endsection
