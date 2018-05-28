@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ucfirst($userpaper->title)}}</div>
                    <div class="panel-body">

                        <a href="{{ url('/superadmin/paper') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

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
<div class="container">
    <div class="row">
    <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Reviews</div>
                    <div class="panel-body">

                     
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table id="review" class="table table-bordered table-hover table-condensed " cellspacing="0"
                       width="100%">
                                 <thead>
                                        <tr>
                                        <th>S.No</th>
                                        <th>Judge/Company Name</th>
                                        <th>Paper Title</th>
                                        <th>Quality</th>
                                         <th>Content</th>
                                         <th>Performance</th>
                                         <th>Remarks</th>                                        
                                    </tr>
                                    </thead>
 
                                <tbody>
                                    @foreach($userpaper->reviews as $rk => $rv)

                                    @php //dd($rv->paper);  @endphp
                                   
                                    
                                         <tr>
                                        <td>{{++$rk}}</td>
                                        <td>{{ucfirst($rv->user->first_name)}} {{ucfirst($rv->user->last_name)}}</td>
                                        <td>{{$rv->paper->title}}</td>
                                        <td>{{$rv->quality}}</td>
                                        <td>{{$rv->content}}</td>
                                        <td>{{$rv->performance}}</td>
                                        <td>{{$rv->remark}}</td>
                                    </tr>
                                    
                                   
                                    @endforeach
                                </tbody>
                                <tfoot align="right">
        <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
    </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
var fileName = "{{ucfirst($userpaper->title)}}";
        $('#review').DataTable({
            dom: 'lBfrtip',
            "pageLength": -1,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [{
                extend: 'pdf',
                title: fileName,
            }, {
                extend: 'excel',
                title: fileName,
            }, {
                extend: 'csv',
                title: fileName,
            }, {
                extend: 'copy',
                title: fileName,
            }, {
                extend: 'print',
                title: fileName,
            }
            ],
           "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
        var tueTotal = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            var wedTotal = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
         var thuTotal = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
         var friTotal = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
                
            // Update footer by showing the total with the reference of the column index 
        $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 1 ).footer() ).html(monTotal);
            $( api.column( 2 ).footer() ).html(tueTotal);
            $( api.column( 3 ).footer() ).html(wedTotal);
            $( api.column( 4 ).footer() ).html(thuTotal);
            $( api.column( 5 ).footer() ).html(friTotal);
        },
        });
} );
</script>
@endsection
