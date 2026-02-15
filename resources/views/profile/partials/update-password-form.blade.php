<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Atualizar Senha</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">Certifique-se de usar uma senha longa e aleatória para manter segurança.</p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">Senha Atual</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label">Nova Senha</label>
                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                @error('password', 'updatePassword')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">Confirmar Nova Senha</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                @error('password_confirmation', 'updatePassword')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Salvar Senha</button>
                @if (session('status') === 'password-updated')
                    <span class="text-success ms-2">Salvo!</span>
                @endif
            </div>
        </form>
    </div>
</div>
