@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Reviews</div>
		 <!-- <a href="{{ url('/student/paper/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Account">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->
		<table class="table table-hover">
		    <tr>
		    	<th>Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Registered on</th>
			<th>Action</th>
		    </tr>
		    @foreach($userpapers as $k => $item)
		    <tr>
			<td>{{$item->id}}</td>
			<td>{{ $item->title}}</td>
			<td>{{$item->description}}</td>		
			<td>
			     <td>
                                            <a href="{{ url('/company/paper/' . $item->id) }}" title="View Paper">
                                            	<button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                            </a>
                                            <a href="{{ url('/company/review/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Review">
                            <i class="fa fa-plus" aria-hidden="true"></i> Review Paper
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

		</table>
            </div>
        </div>
    </div>
</div>
@endsection

