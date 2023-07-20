<x-jet-action-section>
    <x-slot name="title">
        {{ __('main.two_factor_authentication') }}
    </x-slot>

    <x-slot name="description">
        {{ __('main.add_additional_security_to_your_account_using_two_factor_authentication') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-white">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('main.finish_enabling_two_factor_authentication') }}
                @else
                    {{ __('main.you_have_enabled_two_factor_authentication') }}
                @endif
            @else
                {{ __('main.you_have_not_enabled_two_factor_authentication') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-400">
            <p>
                {{ __('main.when_two_factor_authentication_is_enabled,_you_will_be_prompted_for_a_secure,_random_token_during_authentication._you_may_retrieve_this_token_from_your_phone\'s_google_authenticator_application') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-400">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('main.to_finish_enabling_two_factor_authentication,_scan_the_following_qr_code_using_your_phone\'s_authenticator_application_or_enter_the_setup_key_and_provide_the_generated_otp_code') }}
                        @else
                            {{ __('main.two_factor_authentication_is_now_enabled._scan_the_following_qr_code_using_your_phone\'s_authenticator_application_or_enter_the_setup key') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-400">
                    <p class="font-semibold">
                        {{ __('main.setup_key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-jet-label for="code" value="{{ __('main.code') }}" />

                        <x-jet-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-jet-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-400">
                    <p class="font-semibold">
                        {{ __('main.store_these_recovery_codes_in_a_secure_password_manager._they_can_be_used_to_recover_access_to_your_account_if_your_two_factor_authentication_device_is_lost') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-700 rounded-xl">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('main.enable') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('main.regenerate_recovery_codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @elseif ($showingConfirmation)
                    <x-jet-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-jet-button type="button" class="mr-3" wire:loading.attr="disabled">
                            {{ __('main.confirm') }}
                        </x-jet-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('main.show_recovery_codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-secondary-button wire:loading.attr="disabled">
                            {{ __('main.cancel') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-danger-button wire:loading.attr="disabled">
                            {{ __('main.disable') }}
                        </x-jet-danger-button>
                    </x-jet-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-jet-action-section>
