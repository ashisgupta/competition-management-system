@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Student's Paper</div>
		 <!-- <a href="{{ url('/student/paper/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Account">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->
			<table id="submittedpapers" class="table table-bordered table-hover table-condensed " cellspacing="0"
                       width="100%">
                       <thead>
                       	 <tr>
		    	<th>Id</th>
		    	<th>Submitted By</th>
		    	<th>Email</th>
			<th>Title</th>
			<th>Registered on</th>
			<th>No of reviews</th>
			<th>Action</th>
		    </tr>
                       </thead>
		   <tbody>
		    @foreach($userpapers as $k => $item)
		    <tr>
			<td>{{$item->id}}</td>
			<td>{{ucfirst($item->user->first_name)}} {{ucfirst($item->user->last_name)}}</td>
			<td>{{$item->user->email}}</td>
			<td>{{ $item->title}}</td>
			<td>{{date("F d, Y h:i:s A", strtotime($item->created_at))}}</td>		

			<td>{{$item->reviews->count()}}</td>
			
			     <td>
                                            <a href="{{ url('/superadmin/paper/' . $item->id) }}" title="View Paper">
                                            	<button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                            </a>
                                       <!--      <a href="{{ url('/student/paper/' . $item->id . '/edit') }}" title="Edit Paper"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/student/paper', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Paper',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!} -->
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
@section("scripts")
<script type="text/javascript">
        $(document).ready(function() {
var fileName = "AllSubmittedPapers";
        $('#submittedpapers').DataTable({
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
