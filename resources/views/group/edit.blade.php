@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Group - edit</div>

                <div class="card-body">
                {!! Form::open(['route'=>['groups.update', $group->id], 'method'=>'put']) !!}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', $category->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
                
                {!! Form::submit('Update', ['class'=>'btn btn-sm btn-warning']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
