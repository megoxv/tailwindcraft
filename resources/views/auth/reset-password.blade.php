@extends('layouts.app')

@section('content')
    {{-- <div class="container relative m-auto px-6 py-24 text-gray-500 md:px-12 xl:px-40">
        <div class="m-auto space-y-8 md:w-8/12 lg:w-6/12 xl:w-5/12">
            <div class="rounded-3xl border border-gray-100 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 backdrop-blur-2xl">
                <div class="p-8 py-12 sm:p-12">
                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        <x-jet-validation-errors class="mb-4" />
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="space-y-2">
                            <label for="email" class="text-gray-600 dark:text-gray-300">{{ __('main.email') }}</label>
                            <input type="email" name="email" id="email" autocomplete="email" :value="old('email', $request->email)" class="focus:outline-none block w-full rounded-md border border-gray-200 dark:border-gray-600 bg-transparent px-4 py-3 text-gray-600 transition duration-300 invalid:ring-2 focus:ring-blue-300" minlength="4" required />
                        </div>
                        <div class="space-y-2">
                            <label for="password" class="text-gray-600 dark:text-gray-300">{{ __('main.password') }}</label>
                            <input type="password" name="password" id="password" autocomplete="new-password" class="focus:outline-none block w-full rounded-md border border-gray-200 dark:border-gray-600 bg-transparent px-4 py-3 text-gray-600 transition duration-300 invalid:ring-2 focus:ring-blue-300" minlength="8" required />
                        </div>
                        <div class="space-y-2">
                            <label for="password_confirmation" class="text-gray-600 dark:text-gray-300">{{ __('main.password_confirmation') }}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="focus:outline-none block w-full rounded-md border border-gray-200 dark:border-gray-600 bg-transparent px-4 py-3 text-gray-600 transition duration-300 invalid:ring-2 focus:ring-blue-300" minlength="8" required />
                        </div>
                        <button class="w-full rounded-full bg-blue-500 h-11 flex items-center justify-center px-6 py-3 transition hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-800">
                            <span class="text-base font-semibold text-white">{{ __('main.reset_password') }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container relative m-auto px-6 md:px-12 xl:px-40 py-[100px]">
        <div class="max-w-[585px] w-full mx-auto p-7 bg-gray-25 rounded-[10px] outline outline-1 outline-gray-800">
            <div class="mb-9">
                <h4 class="flex items-center justify-center text-2xl text-white mb-1">{{ __('main.reset_password') }}</h4>
            </div>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email', $request->email) }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Email'" onblur="this.placeholder=' '" required="">
                    <label for="email" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Email <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('email')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="password" type="password" name="password" value="{{ old('password') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Password'" onblur="this.placeholder=' '" minlength="8" required="">
                    <label for="password" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Password <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('password')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='password_confirmation'" onblur="this.placeholder=' '" minlength="8" required="">
                    <label for="password_confirmation" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Password Confirmation <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('password_confirmation')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full px-8 py-4 mt-9 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200 mr-4">{{ __('main.reset_password') }}</button>
            </form>
        </div>
    </div>
@endsection