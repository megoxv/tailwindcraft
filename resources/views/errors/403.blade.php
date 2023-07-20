@extends('errors::minimal')

@section('title', __('main.forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: __('main.forbidden')))
