@extends('layouts.web')

@section('content')
<div class="container">

 <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Judges's List</div>
		<table id="judges" class="table table-bordered table-hover table-condensed " cellspacing="0"
                       width="100%">
			<thead>
				<tr>
			<th>User Id</th>
			<th>User Type</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Action</th>
		    </tr>
			</thead>
		    <tbody>
		    @foreach($users->whereIn("role_id",[2,3]) as $k => $item)
		    <tr>
			<td>{{++$k}}</td>
			<td>@if($item->role_id==2) Judge @elseif($item->role_id==3) Company  @else Student @endif </td>
			<td>{{ucfirst($item->first_name)}} {{ucfirst($item->last_name)}}</td>
			<td>{{$item->email}}</td>	
			<td>@if($item->status) Enabled @else Disabled @endif</td>
			
			     <td>
                                            <a href="{{ url('/superadmin/student/' . $item->id) }}" title="View Prescription"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/superadmin/student/' . $item->id . '/edit') }}" title="Edit Prescription"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/superadmin/student', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Prescription',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
			</td>
		
			
			
			     
			
			
		    </tr>
		  @endforeach
</tbody>
		</table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Student's List</div>
		<table id="students" class="table table-bordered table-hover table-condensed " cellspacing="0"
                       width="100%">
			<thead>
				<tr>
			<th>User Id</th>
			<th>User Type</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Action</th>
		    </tr>
			</thead>
		    <tbody>
		    @foreach($users->where("role_id",4) as $k => $item)
		    <tr>
			<td>{{++$k}}</td>
			<td>@if($item->role_id==2) Judge @elseif($item->role_id==3) Company  @else Student @endif </td>
			<td>{{ucfirst($item->first_name)}} {{ucfirst($item->last_name)}}</td>
			<td>{{$item->email}}</td>	
			<td>@if($item->status) Enabled @else Disabled @endif</td>
			
			     <td>
                                            <a href="{{ url('/superadmin/student/' . $item->id) }}" title="View Prescription"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/superadmin/student/' . $item->id . '/edit') }}" title="Edit Prescription"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/superadmin/student', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Prescription',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
			</td>
		
			
			
			     
			
			
		    </tr>
		  @endforeach
</tbody>
		</table>
            </div>
        </div>
    </div>


    
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
var fileName = "Students-list";
        $('#students').DataTable({
            dom: 'lBfrtip',
            "pageLength": -1,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [{
                extend: 'pdf',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'excel',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'csv',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'copy',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'print',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }
            ]
	});
    });
        $(document).ready(function() {
var fileName = "Judge-list";
        $('#judges').DataTable({
            dom: 'lBfrtip',
            "pageLength": -1,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [{
                extend: 'pdf',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'excel',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'csv',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'copy',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }, {
                extend: 'print',
                title: fileName,
                exportOptions: {
				columns: ':not(:last-child)',
				},
            }
            ]
	});
    });
</script>
@endsection