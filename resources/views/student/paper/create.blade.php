@extends('layouts.web')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Prescription</div>
                    <div class="panel-body">
                        <a href="{{ url('/student/paper') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/student/paper', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('student.paper.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
<script type="text/javascript">
    $('#pdf_upload_widget_opener').cloudinary_upload_widget(
                { cloud_name: '{{env("cloud_name")}}', 
                upload_preset: '{{env("upload_preset")}}', 
                folder: '{{env("pdf_folder")}}', 
                stylesheet:'//widget.cloudinary.com/n/demo/118/themes/minimal.css',
                                button_caption:'Select a PDF', 
button_class: 'btn btn-primary',
                max_files:1, 
                max_file_size: 10000000,
                thumbnails:false,
                client_allowed_formats:["pdf"],
                keep_widget_open: false,
            },
            function(error, result) { 
                console.log("Error: ",error,"Result: ", result);
                if(result==null || result== undefined || result ==''){
                    console.log("No files selected to upload!");
                    alert("Please try again, no files selected to upload");
                    return false;
                }
                var secure_urls = result.map(function(item){return item.secure_url;});
                secure_urls = jQuery.makeArray(secure_urls);
                $("#pdfurl").val(secure_urls);
               //console.log(secure_urls);
              // return false;
                
                
                


            });

    $('#ppt_upload_widget_opener').cloudinary_upload_widget(
                { cloud_name: '{{env("cloud_name")}}', 
                upload_preset: '{{env("upload_preset")}}', 
                folder: '{{env("ppt_folder")}}', 
                stylesheet:'//widget.cloudinary.com/n/demo/118/themes/minimal.css',
                                button_caption:'Select a PPT', 
button_class: 'btn btn-primary',
                max_files:1, 
                max_file_size: 10000000,
                thumbnails:false,
                client_allowed_formats:["ppt","pot","pos","pptx","potx","posx"],
                keep_widget_open: false,
            },
            function(error, result) { 
                console.log("Error: ",error,"Result: ", result);
                if(result==null || result== undefined || result ==''){
                    console.log("No files selected to upload!");
                    alert("Please try again, no files selected to upload");
                    return false;
                }
                var secure_urls = result.map(function(item){return item.secure_url;});
                secure_urls = jQuery.makeArray(secure_urls);
                $("#ppturl").val(secure_urls);
              // console.log(secure_urls);
              // return false;
                
                
                


            });
</script>
@endsection
