<section class="profile-section">
    <header>
        <h2 class="section-title">
            {{ __('Profielinformatie') }}
        </h2>

        <p class="section-description">
            {{ __("Werk je profiel bij met de onderstaande velden naar jouw gewenste informatie.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="form-container">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Naam') }}</label>
            <input
                id="name"
                type="text"
                name="name"
                class="form-input"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            />
            @if ($errors->get('name'))
                <p class="error-message">{{ $errors->get('name')[0] }}</p>
            @endif
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob" class="form-label">{{ __('Geboortedatum') }}</label>
            <input
                id="dob"
                type="date"
                name="dob"
                class="form-input"
                value="{{ old('dob', $user->dob) }}"
                required
            />
            @if ($errors->get('dob'))
                <p class="error-message">{{ $errors->get('dob')[0] }}</p>
            @endif
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('E-mailadres') }}</label>
            <input
                id="email"
                type="email"
                name="email"
                class="form-input"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            />
            @if ($errors->get('email'))
                <p class="error-message">{{ $errors->get('email')[0] }}</p>
            @endif
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone" class="form-label">{{ __('Telefoonnummer') }}</label>
            <input
                id="phone"
                type="text"
                name="phone"
                class="form-input"
                value="{{ old('phone', $user->phone) }}"
                required
                autocomplete="tel"
            />
            @if ($errors->get('phone'))
                <p class="error-message">{{ $errors->get('phone')[0] }}</p>
            @endif
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="email-verification">
                <p class="verification-message">
                    {{ __('Je e-mailadres is niet geverifieerd.') }}
                    <button form="send-verification" class="verification-button">
                        {{ __('Klik hier om je e-mailadres te verifieren.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="success-message">
                        {{ __('Er is een nieuwe verificatielink naar je e-mailadres gestuurd.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="primary-button">
                {{ __('Opslaan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="status-message">
                    {{ __('Opgeslagen.') }}
                </p>
            @endif
        </div>
    </form>
</section>
