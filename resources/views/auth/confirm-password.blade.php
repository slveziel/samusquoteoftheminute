<x-guest-layout>
<div class="mb-3">
    <p class="text-muted">Por favor, confirme sua senha antes de continuar.</p>
</div>

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            Confirmar Senha
        </button>
    </div>
</form>
</x-guest-layout>
