@extends('layouts.web')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Paper #{{ $userpaper->id }}</div>
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

                        {!! Form::model($userpaper, [
                            'method' => 'PATCH',
                            'url' => ['/student/paper', $userpaper->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('student.paper.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
