<section class="update-password-section">
    <header>
        <h2 class="section-title">
            {{ __('Wachtwoord Bijwerken') }}
        </h2>

        <p class="section-description">
            {{ __('Zorg ervoor dat je account een lang, willekeurig wachtwoord gebruikt om veilig te blijven.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="form-container">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password" class="form-label">
                {{ __('Huidig Wachtwoord') }}
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-input"
                autocomplete="current-password"
            />
            @if ($errors->updatePassword->get('current_password'))
                <p class="error-message">{{ $errors->updatePassword->get('current_password')[0] }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password" class="form-label">
                {{ __('Nieuw Wachtwoord') }}
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-input"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->get('password'))
                <p class="error-message">{{ $errors->updatePassword->get('password')[0] }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('Bevestig Wachtwoord') }}
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-input"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->get('password_confirmation'))
                <p class="error-message">{{ $errors->updatePassword->get('password_confirmation')[0] }}</p>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="primary-button">
                {{ __('Opslaan') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="status-message">
                    {{ __('Opgeslagen.') }}
                </p>
            @endif
        </div>
    </form>
</section>
