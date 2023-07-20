@extends('layouts.app')

@section('content')
    <div class="container relative m-auto px-6 md:px-12 xl:px-40 py-[100px]">
        <div class="max-w-[585px] w-full mx-auto p-7 bg-gray-25 rounded-[10px] outline outline-1 outline-gray-800">
            <div class="mb-9">
                <h4 class="flex items-center justify-center text-2xl text-white mb-1">{{ __('main.please_confirm_your_password_before_continuing') }}</h4>
            </div>
            <form action="{{ route('password.confirm') }}" method="POST">
                @csrf
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="password" type="password" name="password" value="{{ old('password') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Password'" onblur="this.placeholder=' '" required="">
                    <label for="password" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Password <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('password')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full px-8 py-4 mt-9 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200 mr-4">{{ __('main.confirm') }}</button>
            </form>
        </div>
    </div>
@endsection