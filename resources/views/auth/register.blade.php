<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name and Username Row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="col-md-6">
                <x-input-label for="username" :value="__('User Name')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
        </div>

        <!-- Email and Phone Number Row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="col-md-6">
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
        </div>

        <!-- Timezone and Language Row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <x-input-label for="timezone" :value="__('Timezone')" />
                <select id="timezone" name="timezone" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @foreach($timezones as $tz)
                        <option value="{{ $tz }}" {{ old('timezone') == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('timezone')" class="mt-2" />
            </div>
            <div class="col-md-6">
                <x-input-label for="locale" :value="__('Language Preference')" />
                <select id="locale" name="locale" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="en" {{ (old('locale') ?? config('app.locale')) == 'en' ? 'selected' : '' }}>English</option>
                    <option value="es" {{ (old('locale') ?? config('app.locale')) == 'es' ? 'selected' : '' }}>Español</option>
                    <option value="fr" {{ (old('locale') ?? config('app.locale')) == 'fr' ? 'selected' : '' }}>Français</option>
                    <!-- Add more languages as needed -->
                </select>
                <x-input-error :messages="$errors->get('locale')" class="mt-2" />
            </div>
        </div>

        <!-- Password and Confirm Password Row -->
        <div class="row mb-3">
            <div class="col-md-6">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="col-md-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Terms Agreement -->
        <div class="mt-4">
            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required />
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    I agree to the 
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 underline">Terms of Service</a> 
                    and 
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 underline">Privacy Policy</a>
                </label>
            </div>
            <x-input-error :messages="$errors->get('terms')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
