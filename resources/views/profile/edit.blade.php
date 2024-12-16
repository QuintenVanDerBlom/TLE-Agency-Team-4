<x-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="profile-container">
        <div class="profile-card">
            <h3 class="section-title">Profiel Informatie Updaten</h3>
            <div class="profile-content">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="profile-card">
            <h3 class="section-title">Wachtwoord Veranderen</h3>
            <div class="profile-content">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="profile-card delete-section">
            <h3 class="section-title">Verwijder Account</h3>
            <div class="profile-content">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-layout>
