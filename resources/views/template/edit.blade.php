@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Template - edit</div>

                <div class="card-body">
                {!! Form::open(['route'=>['templates.update', $template->id], 'method'=>'put']) !!}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', $template->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email_subject')) has-error @endif">
                    {!! Form::label('Subject') !!}
                    {!! Form::text('email_subject', $category->email_subject, ['class'=>'form-control', 'placeholder'=>'Subject']) !!}
                    @if($errors->has('email_subject'))
                        <span class="help-block">{!! $errors->first('email_subject') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('bcc_email')) has-error @endif">
                    {!! Form::label('Bcc email') !!}
                    {!! Form::email('bcc_email', $category->bcc_email, ['class'=>'form-control', 'placeholder'=>'bcc email']) !!}
                    @if($errors->has('bcc_email'))
                        <span class="help-block">{!! $errors->first('bcc_email') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('cc_email')) has-error @endif">
                    {!! Form::label('Cc email') !!}
                    {!! Form::email('cc_email', $category->cc_email, ['class'=>'form-control', 'placeholder'=>'cc email']) !!}
                    @if($errors->has('cc_email'))
                        <span class="help-block">{!! $errors->first('email_subject') !!}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email_message')) has-error @endif">
                    {!! Form::label('email_message') !!}
                    {!! Form::textarea('email_message', $template->email_message, ['class'=>'form-control', 'placeholder'=>'Message']) !!}
                    @if($errors->has('email_message'))
                        <span class="help-block">{!! $errors->first('email_message') !!}</span>
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
                
                
                {!! Form::submit('Update', ['class'=>'btn btn-sm btn-warning']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection         

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
    <script>
        $(document).ready(function() {
           $('#schedule_sending').datetimepicker();
        });
    </script>
    

@endsection
