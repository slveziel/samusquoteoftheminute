<div class="card">
    <div class="card-header">
        <h5 class="mb-0 text-danger">Excluir Conta</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">Uma vez que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja manter.</p>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
            Excluir Conta
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza que deseja excluir sua conta?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Uma vez que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Por favor, insira sua senha para confirmar que deseja excluir permanentemente sua conta.</p>
                
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Senha">
                        @error('password', 'userDeletion')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
