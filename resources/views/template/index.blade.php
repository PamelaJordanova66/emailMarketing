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
                Templates - list
                <a href="{{ route('templates.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th scope="col" width="60">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col" width="129">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->id }}</td>
                            <td>{{ $template->name }}</td>
                            <td>{{ $template->email_subject }}</td>
                            <td>
                                <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                {!! Form::open(['route'=>['templates.destroy', $template->id], 'method'=>'delete', 'style'=>'display:inline']) !!}
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
