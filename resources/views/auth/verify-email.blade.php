@extends('layouts.app')

@section('content')
    <x-jet-authentication-card>
        <div class="mb-4 text-sm text-gray-400">
            {{ __('main.before_continuing,_could_you_verify_your_email_address_by_clicking_on_the_link_we_just_emailed_to_you?_if_you_didn\'t_receive_the_email,_we_will_gladly_send_you_another') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('main.a_new_verification_link_has_been_sent_to_the_email_address_you_provided_in_your_profile_settings') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('main.resend_verification_email') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a href="{{ route('user.profile') }}" class="underline text-sm text-gray-300 hover:text-primary-600">
                    {{ __('main.edit_profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-300 hover:text-primary-600 ml-2">
                        {{ __('main.logout') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
@endsection
