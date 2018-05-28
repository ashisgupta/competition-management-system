@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">User {{ $user->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/superadmin/student') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/superadmin/student/' . $user->id . '/edit') }}" title="Edit Account"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['superadmin/student', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                     <tr>
			<th>Patient Name</th>
			<td>{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</td>
		    </tr>
		    <tr>
			<th>Email</th>
			<td>{{ucfirst($user->email)}}</td>
		    </tr>
            <tr>
            <th>Status</th>
            <td>@if($user->status) Enabled @else Disabled @endif</td>
            </tr>
		    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
</div>
@endsection
