<x-guest-layout>
<div class="mb-4 text-muted">
    Obrigado por se registrar! Antes de começar, você pode verificar seu endereço de e-mail clicand no link que acabamos de enviar? Se você não recebeu o e-mail, podemos enviar outro.
</div>

@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success mb-4">
        Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu durante o registro.
    </div>
@endif

<div class="d-flex justify-content-between">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">
            Reenviar Email de Verificação
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">
            Sair
        </button>
    </form>
</div>
</x-guest-layout>
