@extends('layouts.app')

@php
    // Set the meta tags
    Artesaos\SEOTools\Facades\SEOTools::setTitle('Forgot password');
    Artesaos\SEOTools\Facades\SEOTools::setDescription('Recover access to your account effortlessly through our Forgot Password.');
    Artesaos\SEOTools\Facades\SEOTools::opengraph()->setUrl(route('password.request'));
@endphp

@section('content')
    <div class="container relative m-auto px-6 md:px-12 xl:px-40 py-32">
        <div class="max-w-[585px] w-full mx-auto p-7 bg-gray-25 rounded-[10px] outline outline-1 outline-gray-800">
            <div class="mb-9">
                <h4 class="flex items-center justify-center text-2xl text-white mb-1">{{ __('main.forgot_your_password') }}</h4>
                <p class="font-normal text-gray-400 text-center">{{ __('main.no_problem._just_let_us_know_your_email_address_and_we_will_email_you_a_password_reset_link_that_will_allow_you_to_choose_a_new_one') }}</p>
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Email'" onblur="this.placeholder=' '" required="">
                    <label for="email" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Email <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('email')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full px-8 py-4 mt-9 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200 mr-4">{{ __('main.email_password_reset_link') }}</button>
            </form>
        </div>
    </div>
@endsection