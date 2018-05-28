@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            
                @if(Auth::user()->role_id==1)
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Judges</span>
                    <span class="info-box-number">
                        Registered {{$judges->where("status",1)->count()}}
                    </span>
                    <span class="info-box-number">
                        New Signups {{$judges->where("status",0)->count()}}
                    </span>
                    <a href="{{ url('superadmin/student') }}" class="small-box-footer">More info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-university"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Students</span>
                <span class="info-box-number">
                    Registered {{$students->where("status",1)->count()}}
                    </span>
                    <span class="info-box-number">
                    New Signups {{$students->where("status",0)->count()}}
                </span>
                <a href="{{ url('superadmin/student') }}" class="small-box-footer">More info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-easel"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Paper Presentation</span>
                <span class="info-box-number">{{$papercount}}</span>
                <a href="{{ url('superadmin/paper') }}" class="small-box-footer">More info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="ion ion-edit"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Reviews</span>
                <span class="info-box-number">{{$reviewcount}}</span>
                <a href="{{ url('superadmin/paper') }}" class="small-box-footer">More info &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            </div>
                @else
                <div class="panel panel-default">
                 <div class="panel-heading">Dashboard</div>
                 <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
                @endif
            
        </div>
    </div>
</div>
@endsection
