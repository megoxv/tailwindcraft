@extends('vendor.installer.layouts.master')

@section('title', trans('Finished'))
@section('container')
    @if (session('message') && is_array(session('message')) && array_key_exists('message', session('message')))
        <p class="paragraph" style="text-align: center;">{{ session('message')['message'] }}</p>
    @endif
    <div class="buttons">
        <a href="{{ url('/') }}" class="button">{{ trans('Click here to exit') }}</a>
    </div>
@stop
