@extends('emps.layout')

  

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Employee Details</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('emps.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Employee Name:</strong>

                {{ $emp->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Job Details:</strong>

                {{ $emp->detail }}

            </div>

        </div>

    </div>

@endsection