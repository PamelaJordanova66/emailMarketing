@extends('layouts.app')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer - create</div>

                <div class="card-body">
                {!! Form::open(['route'=>'customers.store']) !!}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('First Name') !!}
                    {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                    @if($errors->has('first_name'))
                        <span class="help-block">{!! $errors->first('first_name') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('Last Name') !!}
                    {!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                    @if($errors->has('last_name'))
                        <span class="help-block">{!! $errors->first('last_name') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email')) has-error @endif">
                    {!! Form::label('Email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                    @if($errors->has('email'))
                        <span class="help-block">{!! $errors->first('email') !!}</span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('Sex') !!}
                    {!! Form::select('sex', [null => 'Select sex', 'male'=>'Male', 'female'=>'Female'], null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Birth Date') !!}
                    {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('birth_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>

                <div class="form-group @if($errors->has('group_id')) has-error @endif">
                    {!! Form::label('Group') !!}
                    {!! Form::select('group_id[]', $groups, null, ['class'=>'form-control', 'id'=>'group_id', 'multiple'=>'multiple']) !!}
                    @if($errors->has('group_id'))
                        <span class="help-block">{!! $errors->first('group_id') !!}</span>
                    @endif
                </div>
                
                {!! Form::submit('Create', ['class'=>'btn btn-sm btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#group_id').select2({
        placeholder: "Select groups"
    });
</script>
    

@endsection