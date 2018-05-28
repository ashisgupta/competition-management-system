@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Student's Papers</div>
		<table class="table table-hover">
		    <tr>
			<th>Sr. No.</th>
			<th>Name</th>
			<th>Request by</th>
			<th>Email</th>
			<th>Request Registered on</th>
			<th>Prescription title</th>
			<th>Action</th>
		    </tr>
		    <?php $srno=1; ?>
		    @foreach ($userprescriptions as $upvalue)
		              @foreach($upvalue->prescriptionvp as $pvpvalue)
			<tr>
			    <td>{{$srno++}}</td>			    
			    <td> {{ ucfirst($pvpvalue->first_name) }} {{ucfirst($pvpvalue->last_name) }}</td>
			    <td>{{($pvpvalue->role_id==2) ? "Doctor" : "Pharmacist"}}</td>
			    <td>{{$pvpvalue->email}}</td>
			    <td>{{date("d, M, Y H:i:s", strtotime($pvpvalue->user_request_time))}}</td>
			    <td>{{$upvalue->title}}</td>
			    @if($pvpvalue->patient_approval_time==null)
				  <td>
			    <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-{{$pvpvalue->id}}').submit();">
				Approve
			    </a>
			    <form id="logout-form-{{$pvpvalue->id}}" action="{{ url('patient/prescriptionvp/approvepresc') }}" method="POST" style="display: none;">
			    {{ csrf_field() }}
			    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			    <input type="hidden" name="pvp_id" value="{{$pvpvalue->id}}">
		
			</form>
			</td>
				 @else
			<td >Approved</td>
				 @endif
			   
			</tr>
			@endforeach
		    @endforeach
		</table>
            </div>
        </div>
    </div>
</div>
@endsection
