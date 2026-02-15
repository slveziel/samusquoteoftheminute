<x-app-layout>
<div class="container py-4">
    <h2 class="mb-4">Perfil</h2>

    <div class="mb-4">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="mb-4">
        @include('profile.partials.update-password-form')
    </div>

    <div class="mb-4">
        @include('profile.partials.delete-user-form')
    </div>
</div>
</x-app-layout>
