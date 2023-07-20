@extends('vendor.installer.layouts.master')

@section('title', trans('Requirements'))
@section('container')
    <ul class="list">
        <li class="list__item {{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">PHP Version >= {{ $phpSupportInfo['minimum'] }}</li>

        @foreach($requirements['requirements'] as $extention => $enabled)
            <li class="list__item {{ $enabled ? 'success' : 'error' }}">{{ $extention }}</li>
        @endforeach
    </ul>

    @if ( ! isset($requirements['errors']) && $phpSupportInfo['supported'] == 'success')
        <div class="buttons">
            <a class="button" href="{{ route('LaravelInstaller::permissions') }}">
                {{ trans('Next Step') }}
            </a>
        </div>
    @endif
@stop
