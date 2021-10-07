<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form dir="rtl" method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('auth.name',['extra' => '*']) }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('auth.phone',['extra' => '*']) }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" maxlength="9" :value="old('phone')" required autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('auth.email',['extra' => '*']) }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('auth.password_name',['extra' => '*']) }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('auth.password_confirmation',['extra' => '*']) }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4 mb-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                @if(__('system.localization') == 'ltr')
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                @else
                                    {!! __(' وافق على :terms_of_service و :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('شروط الخدمة').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('سياسة الخصوصية').'</a>',
                                ]) !!}
                                @endif
                            </div>
                        </div>
                        <x-jet-input-error for="terms" class="mt-2" />
                    </x-jet-label>
                </div>
            @endif

            <div class="flex space-x-4 space-x-reverse items-center justify-start mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.already_registered') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('auth.register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
