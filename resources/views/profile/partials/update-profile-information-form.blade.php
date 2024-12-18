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

        <!-- Criminal Record -->
        <div class="form-group">
            <label for="has_criminal_record" class="form-label">{{ __('Heb je een strafblad?') }}</label>
            <div>
                <input
                    id="criminal-record-yes"
                    type="radio"
                    name="has_criminal_record"
                    value="1"
                    {{ $user->has_criminal_record === true ? 'checked' : '' }}
                />
                <label for="criminal-record-yes">Ja</label>

                <input
                    id="criminal-record-no"
                    type="radio"
                    name="has_criminal_record"
                    value="0"
                    {{ $user->has_criminal_record === false ? 'checked' : '' }}
                />
                <label for="criminal-record-no">Nee</label>
            </div>
        </div>

        <!-- Driver's License -->
        <div class="form-group">
            <label for="has_drivers_license" class="form-label">{{ __('Heb je een rijbewijs?') }}</label>
            <div>
                <input
                    id="drivers-license-yes"
                    type="radio"
                    name="has_drivers_license"
                    value="1"
                    {{ $user->has_drivers_license === true ? 'checked' : '' }}
                />
                <label for="drivers-license-yes">Ja</label>

                <input
                    id="drivers-license-no"
                    type="radio"
                    name="has_drivers_license"
                    value="0"
                    {{ $user->has_drivers_license === false ? 'checked' : '' }}
                />
                <label for="drivers-license-no">Nee</label>
            </div>
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
