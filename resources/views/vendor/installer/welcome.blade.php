@extends('vendor.installer.layouts.master')

@section('title', trans('Welcome To The Installer'))
@section('container')
    <p class="paragraph" style="text-align: center;">{{ trans('Welcome to the setup wizard.') }}</p>
    <div class="buttons">
        <a href="{{ route('LaravelInstaller::environment') }}" class="button">{{ trans('Next Step') }}</a>
    </div>
@stop
