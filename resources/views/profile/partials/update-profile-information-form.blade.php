<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Perfil</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">Atualize as informações do perfil e endereço de e-mail da sua conta.</p>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name)" required autofocus>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email)" required autocomplete="username">
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                @if (session('status') === 'profile-updated')
                    <span class="text-success ms-2">Salvo!</span>
                @endif
            </div>
        </form>
    </div>
</div>
