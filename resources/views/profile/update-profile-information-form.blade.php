<div submit="updateProfileInformation">

    <form wire:submit.prevent="updateProfileInformation" class="space-y-6">
        <div class="space-y-6">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                        x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-jet-label for="photo" value="{{ __('main.profile_photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="!photoPreview">
                        <img src="{{ $this->user->getProfilePhoto() }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('main.select_a_new_photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('main.remove_photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            {{-- Name --}}
            <div>
                <x-jet-label for="name" value="{{ __('main.name') }}" />
                <x-jet-input id="name" type="text" wire:model.defer="state.name"
                    autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            {{-- Email --}}
            <div>
                <x-jet-label for="email" value="{{ __('main.email') }}" />
                <x-jet-input id="email" type="email" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                        !$this->user->hasVerifiedEmail())
                    <p class="text-sm mt-2">
                        {{ __('main.your_email_address_is_unverified') }}

                        <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                            wire:click.prevent="sendEmailVerification">
                            {{ __('main.click_here_to_re-send_the_verification_email') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                            {{ __('main.a_new_verification_link_has_been_sent_to_your_email_address') }}
                        </p>
                    @endif
                @endif
            </div>

            {{-- Github --}}
            <div>
                <x-jet-label for="github" value="{{ __('main.github') }} (Username Only)" />
                <x-jet-input id="github" type="text" class="" wire:model.defer="state.github" />
                <x-jet-input-error for="github" class="mt-2" />
            </div>

            {{-- Website --}}
            <div>
                <x-jet-label for="website" value="{{ __('main.website') }}" />
                <x-jet-input id="website" type="text" class="" wire:model.defer="state.website" />
                <x-jet-input-error for="website" class="mt-2" />
            </div>

            {{-- Bio --}}
            <div>
                <x-jet-label for="bio" value="{{ __('main.bio') }}" />
                <x-jet-input id="bio" type="text" class="" wire:model.defer="state.bio" />
                <x-jet-input-error for="bio" class="mt-2" />
            </div>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('main.your_email_address_is_unverified') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('main.click_here_to_re-send_the_verification_email') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('main.a_new_verification_link_has_been_sent_to_your_email_address') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="flex items-center">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('main.saved') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('main.save') }}
            </x-jet-button>
        </div>
    </form>
</div>
