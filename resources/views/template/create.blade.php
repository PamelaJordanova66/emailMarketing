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
                    <label>Email Message. Use @php echo '{{ }}' @endphp for including customer information. For example. Dear @php echo '{{ first_name }}' @endphp Available information: first_name, last_name, email and birth_date.</label>
                    <textarea name="email_message" placeholder="Please enter email message"></textarea>
                    <script>
                        CKEDITOR.replace( 'email_message' );
                    </script>
                <div class="form-group @if($errors->has('bcc_email')) has-error @endif">
                    {!! Form::label('bcc email') !!}
                    {!! Form::text('bcc_email', null, ['class'=>'form-control', 'placeholder'=>'bcc email']) !!}
                    @if($errors->has('bcc_email'))
                        <span class="help-block">{!! $errors->first('bcc_email') !!}</span>
                    @endif 
                </div>
                <div class="form-group @if($errors->has('cc_email')) has-error @endif">
                    {!! Form::label('cc email') !!}
                    {!! Form::text('cc_email', null, ['class'=>'form-control', 'placeholder'=>'cc email']) !!}
                    @if($errors->has('cc_email'))
                        <span class="help-block">{!! $errors->first('cc_email') !!}</span>
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
