@extends('layouts.app')

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
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                    @if($errors->has('first_name'))
                        <span class="help-block">{!! $errors->first('first_name') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('Last Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                    @if($errors->has('last_name'))
                        <span class="help-block">{!! $errors->first('last_name') !!}</span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('Sex') !!}
                    {!! Form::select('sex', [1=>'Male', 0=>'Female'], null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Birth Date') !!}
                    {!! Form::date('birth_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    {!! $errors->first('birth_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>

                <div class="form-group @if($errors->has('group_id')) has-error @endif">
                    {!! Form::label('Group') !!}
                    {!! Form::select('group_id[]', $groups, null, ['class'=>'form-control', 'id'=>'category_id', 'multiple'=>'multiple']) !!}
                    @if($errors->has('group_id'))
                        <span class="help-block">{!! $errors->first('category_id') !!}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('template_id')) has-error @endif">
                    {!! Form::label('Template') !!}
                    {!! Form::select('template_id[]', $templates, null, ['class'=>'form-control', 'id'=>'category_id', 'multiple'=>'multiple']) !!}
                    @if($errors->has('template_id'))
                        <span class="help-block">{!! $errors->first('template_id') !!}</span>
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
