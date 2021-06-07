@extends('emps.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Employee Details</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('emps.create') }}"> Add new Employee</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Employee Name</th>

            <th>Job Details</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($emps as $emp)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $emp->Employee_name }}</td>

            <td>{{ $emp->Job_detail }}</td>

            <td>

                <form action="{{ route('emps.destroy',$emp->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('emps.show',$emp->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('emps.edit',$emp->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $emps->links() !!}

      

@endsection