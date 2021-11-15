@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Template - create</div>

                <div class="card-body">
                {!! Form::open(['route'=>'templates.store']) !!}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email_subject')) has-error @endif">
                    {!! Form::label('Subject') !!}
                    {!! Form::text('email_subject', null, ['class'=>'form-control', 'placeholder'=>'Subject']) !!}
                    @if($errors->has('email_subject'))
                        <span class="help-block">{!! $errors->first('email_subject') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email_message')) has-error @endif">
                    {!! Form::label('Message') !!}
                    {!! Form::textarea('email_message', null, ['class'=>'form-control', 'placeholder'=>'Enter email message']) !!}
                    @if($errors->has('email_message'))
                        <span class="help-block">{!! $errors->first('email_message') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('bcc_email')) has-error @endif">
                    {!! Form::label('bcc email') !!}
                    {!! Form::email('bcc_email', null, ['class'=>'form-control', 'placeholder'=>'bcc email']) !!}
                    @if($errors->has('bcc_email'))
                        <span class="help-block">{!! $errors->first('bcc_email') !!}</span>
                    @endif 
                </div>
                <div class="form-group @if($errors->has('cc_email')) has-error @endif">
                    {!! Form::label('cc email') !!}
                    {!! Form::email('cc_email', null, ['class'=>'form-control', 'placeholder'=>'cc email']) !!}
                    @if($errors->has('cc_email'))
                        <span class="help-block">{!! $errors->first('cc_email') !!}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('schedule_sending')) has-error @endif">
                    {!! Form::label('schedule_sending') !!}
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" placeholder='Date Picker' />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('email_message');
        });
    </script>
    

@endsection
