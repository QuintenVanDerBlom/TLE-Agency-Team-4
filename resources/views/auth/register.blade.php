<x-layout>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="error-message" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="input-field" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="error-message" />
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" class="input-field" type="date" name="dob" :value="old('dob')" required />
            <x-input-error :messages="$errors->get('dob')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <div class="password-toggle-container">
                <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                <button type="button" id="toggle-password-visibility" class="toggle-button">
                    👁️
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <div class="form-footer">
            <a class="login-link" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="register-button">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('toggle-password-visibility');

        toggleButton.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.type === 'password';
            passwordInput.type = isPasswordHidden ? 'text' : 'password';
            toggleButton.textContent = isPasswordHidden ? 'Hide Password' : 'Show Password';
        });
    });
</script>

