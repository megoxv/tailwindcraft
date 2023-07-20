@extends('vendor.installer.layouts.master')

@section('title', trans('Permissions'))
@section('container')
    @if (isset($permissions['errors']))
        <div class="alert alert-danger">Please fix the below error and the click  {{ trans('Check Permission Again') }}</div>
    @endif
    <ul class="list">
        @foreach($permissions['permissions'] as $permission)
        <li class="list__item list__item--permissions {{ $permission['isSet'] ? 'success' : 'error' }}">
            {{ $permission['folder'] }}<span>{{ $permission['permission'] }}</span>
        </li>
        @endforeach
    </ul>


    <div class="buttons">
        @if ( ! isset($permissions['errors']))
            <a class="button" href="{{ route('LaravelInstaller::database') }}">
                {{ trans('Next Step') }}
            </a>
        @else
            <a class="button" href="javascript:window.location.href='';">
                {{ trans('Check Permission Again') }}
            </a>
        @endif
    </div>

@stop
