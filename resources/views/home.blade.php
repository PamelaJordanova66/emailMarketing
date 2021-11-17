@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <h4>Tips for using our tool</h4>
                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <ul>
                                <li>First you slould create template.</li>
                                <ul>
                                    <li>When creating the email message be aware that you can use values like first_email, last_email for including customer information. For example. Dear first_name.</li> 
                                    <li>Available information: first_name, last_name, sex, email and birth_date.</li>
                                </ul>
                                <li>Then create a group and add the template you would like to use for that group of customers.</li>
                                <ul>
                                    <li>When creating a group and you can schedule a date when you would like all the custumer from this group to receive a mail.</li>
                                    <li>Send Email Now button will send an email at that moment to all the customers from that group.</li>
                                </ul>
                                <li>After create your customers and add them to a whatever group you want.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
