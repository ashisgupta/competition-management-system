@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Paper {{ $userpaper->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/company/paper') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                     <!--    <a href="{{ url('/superadmin/paper/' . $userpaper->id . '/edit') }}" title="Edit Account"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['superadmin/paper', $userpaper->id],
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
            <td>{{ucfirst($userpaper->title)}} </td>
            </tr>
            <tr>
            <th>Description</th>
            <td>{{ucfirst($userpaper->description)}}</td>
            </tr>
             <tr>
            <th>PDF</th>
            <td>
                <a href="{{$userpaper->pdfurl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> View PDF</button></a>
            </td>
            </tr>
            <tr>
            <th>PPT URL</th>
            <td>
                <a href="{{$userpaper->ppturl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> Download PPT</button></a>
            </td>
            </tr>
            <tr>
            <th>Video URL</th>
              <td>
                <a href="{{$userpaper->videourl}}" target="_blank"><button class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i> View Video</button></a>
            </td>
            </tr>
            
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
</div>
@endsection
