@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ Session('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ Session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Customers - list
                <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th scope="col" width="60">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" width="129">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                {!! Form::open(['route'=>['customers.destroy', $customer->id], 'method'=>'delete', 'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
