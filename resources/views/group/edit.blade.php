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
                    {!! Form::text('name', $group->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('template_id')) has-error @endif">
                    {!! Form::label('Choose Template') !!}
                    {!! Form::select('template_id', $templates, $group->template->id, ['class'=>'form-control', 'id'=>'template_id']) !!}
                    @if($errors->has('template_id'))
                        <span class="help-block">{!! $errors->first('template_id') !!}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('schedule_sending')) has-error @endif">
                    {!! Form::label('Schedule Sending') !!}
                    {!! Form::date('schedule_sending', $group->schedule_sending, ['class'=>'form-control','placeholder'=>'Enter email message']) !!}
                    @if($errors->has('schedule_sending'))
                        <span class="help-block">{!! $errors->first('schedule_sending') !!}</span>
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

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $( "#datepicker" ).datepicker();
</script>
    
@endsection