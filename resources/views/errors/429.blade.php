@extends('errors::minimal')

@section('title', __('main.too_many_requests'))
@section('code', '429')
@section('message', __('main.too_many_requests'))
