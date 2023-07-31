@extends('layouts.app')

@php
    // Set the meta tags
    Artesaos\SEOTools\Facades\SEOTools::setTitle('Register');
    Artesaos\SEOTools\Facades\SEOTools::setDescription('Join our community and create an account on our user-friendly Register.');
    Artesaos\SEOTools\Facades\SEOTools::opengraph()->setUrl(route('register'));
@endphp

@section('content')
    <div class="container relative m-auto px-6 md:px-12 xl:px-40 py-[100px]">
        <div class="max-w-[585px] w-full mx-auto p-7 bg-gray-25 rounded-[10px] outline outline-1 outline-gray-800">
            <div class="mb-9">
                <h4 class="flex items-center justify-center text-2xl text-white mb-1">{{ __('main.create_an_account') }}</h4>
                <p class="font-normal text-gray-400 text-center"> Already have an account? <a href="{{ route('login') }}" class="text-primary-500">Login!</a></p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="name" type="text" name="name" autocomplete="name" value="{{ old('name') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Full Name'" onblur="this.placeholder=' '" required="">
                    <label for="name" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Full Name <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('name')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Email'" onblur="this.placeholder=' '" required="">
                    <label for="email" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Email <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('email')
                        <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 relative w-full bg-gray-25 group rounded-md">
                    <input id="username" type="username" name="username" autocomplete="username" value="{{ old('username') }}" class="block p-4 rounded-md w-full text-xs font-normal text-white placeholder:text-gray-400 bg-transparent outline outline-1 outline-gray-700 appearance-none focus:outline-primary-500 border-none focus:ring-transparent peer" placeholder=" " onfocus="this.placeholder='Username'" onblur="this.placeholder=' '" required="">
                    <label for="username" class="ml-[14px] z-[1] flex items-center px-1 rounded-[3px] peer-focus:font-medium absolute bg-gray-25 text-xs font-normal text-gray-400 duration-300 transform -translate-y-[20px] scale-75 top-3 peer-focus:z-10 origin-[0] peer peer-disabled:bg-green-500 peer-focus:left-0 peer-focus:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-[4.5px] peer-focus:scale-75 peer-focus:-translate-y-[20px]">
                        Username <span class="text-red-500">&nbsp; *</span>
                    </label>
                    @error('username')
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
                <button type="submit" class="w-full px-8 py-4 mt-9 rounded-md font-medium text-base flex items-center justify-center bg-primary-500 text-white hover:bg-primary-600 transition-colors duration-200 mr-4">Register</button>
                @if ( getSetting('github_status') == 1 || getSetting('google_status') == 1 || getSetting('facebook_status') == 1)
                    <div class="py-6 text-center">
                        <p class="font-normal text-gray-400">OR</p>
                    </div>
                @endif
                <div>
                    @if (getSetting('github_status') == 1)
                        <a href="{{ route('auth.socialite.redirect', 'github') }}" class="w-full px-8 py-[14px] rounded-md font-medium text-base flex items-center justify-center hover:bg-primary-25 bg-gray-25 border border-gray-700 text-white hover:text-primary-500 transition-colors duration-200 my-3">
                            <svg class="mr-3 w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            Sign in with Github
                        </a>
                    @endif
                    @if (getSetting('google_status') == 1)
                        <a href="{{ route('auth.socialite.redirect', 'google') }}" class="w-full px-8 py-[14px] rounded-md font-medium text-base flex items-center justify-center hover:bg-primary-25 bg-gray-25 border border-gray-700 text-white hover:text-primary-500 transition-colors duration-200">
                            <svg class="mr-3 w-7 h-7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                <defs>
                                    <path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                </defs>
                                <clipPath id="b">
                                    <use xlink:href="#a" overflow="visible" />
                                </clipPath>
                                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                            </svg>
                            Sign in with Google
                        </a>
                    @endif
                    @if (getSetting('facebook_status') == 1)
                        <a href="{{ route('auth.socialite.redirect', 'facebook') }}" class="w-full px-8 py-[14px] rounded-md font-medium text-base flex items-center justify-center hover:bg-primary-25 bg-gray-25 border border-gray-700 text-white hover:text-primary-500 transition-colors duration-200 my-3">
                            <svg class="mr-3 w-7 h-7" xmlns="http://www.w3.org/2000/svg" data-name="Ebene 1" viewBox="0 0 1024 1024">
                                <path fill="#1877f2" d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z" />
                                <path fill="#fff" d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z" />
                            </svg>
                            Sign in with Facebook
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

