@extends('layouts.app')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
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
                Groups - list
                <a href="{{ route('groups.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th scope="col" width="60">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Customers</th>
                            <th scope="col" width="230">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->customers()->count() }}</td>
                            <td>
                                <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                {!! Form::open(['route'=>['groups.destroy', $group->id], 'method'=>'delete', 'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{ url('send_email', $group->id) }}" class="btn btn-sm btn-success">Send Email</a>
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
