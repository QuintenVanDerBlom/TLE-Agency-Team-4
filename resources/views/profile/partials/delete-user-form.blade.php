<section class="delete-account-section">
    <header>
        <h2 class="delete-title">
            {{ __('Account Verwijderen') }}
        </h2>

        <p class="delete-description">
            {{ __('Zodra je account is verwijderd, worden alle gegevens en bronnen permanent verwijderd. Download al je gegevens die je wilt bewaren voordat je je account verwijdert.') }}
        </p>
    </header>

    <button
        class="danger-button"
        onclick="document.getElementById('confirm-modal').style.display = 'block';"
    >
        {{ __('Account Verwijderen') }}
    </button>

    <!-- Modal -->
    <div id="confirm-modal" class="modal">
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="modal-title">
                    {{ __('Weet je zeker dat je je account wilt verwijderen?') }}
                </h2>

                <p class="modal-description">
                    {{ __('Zodra je account is verwijderd, worden alle gegevens en bronnen permanent verwijderd. Voer je wachtwoord in om te bevestigen dat je je account permanent wilt verwijderen.') }}
                </p>

                <div class="input-group">
                    <label for="password" class="sr-only">{{ __('Wachtwoord') }}</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="{{ __('Wachtwoord') }}"
                        class="input-field"
                    />
                    @if($errors->userDeletion->get('password'))
                        <p class="error-message">{{ $errors->userDeletion->get('password')[0] }}</p>
                    @endif
                </div>

                <div class="modal-actions">
                    <button
                        type="button"
                        class="secondary-button"
                        onclick="document.getElementById('confirm-modal').style.display = 'none';"
                    >
                        {{ __('Annuleren') }}
                    </button>
                    <button type="submit" class="danger-button">
                        {{ __('Account Verwijderen') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
