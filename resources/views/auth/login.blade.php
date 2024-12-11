<x-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Remember Me -->
        <div class="form-group remember-me">
            <label for="remember_me" class="remember-me-label">
                <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                <span class="remember-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="form-footer">
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-layout>
