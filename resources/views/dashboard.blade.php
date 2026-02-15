<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está logado!') }}
                    
                    <div class="mt-4">
                        <a href="{{ route('quotes.index') }}" class="btn btn-primary">Gerenciar Quotes</a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Ver Quote do Minuto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
