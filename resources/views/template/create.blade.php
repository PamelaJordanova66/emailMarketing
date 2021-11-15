@extends('layouts.app')

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
                    {!! Form::label('Email Message. Use $customer for including customer name for example. 
                        Dear $customer') !!}
                    <textarea name="email_message"></textarea>
                    <script>
                            CKEDITOR.replace( 'email_message' );
                    </script>
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
                    {!! Form::label('Schedule Sending') !!}
                    <input type="date" class="form-control" id="schedule_sending" name="schedule_sending">
                    @if($errors->has('schedule_sending'))
                        <span class="help-block">{!! $errors->first('schedule_sending') !!}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $( "#datepicker" ).datepicker();
</script>
    

@endsection
