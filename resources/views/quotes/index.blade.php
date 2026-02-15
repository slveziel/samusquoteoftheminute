@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Gerenciar Quotes</span>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Ver Quote do Minuto</a>
                </div>

                <div class="card-body">
                    <!-- Formulário para adicionar quote -->
                    <form action="{{ route('quotes.store') }}" method="POST" class="mb-4 p-3 bg-light rounded">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <label class="form-label">Texto da Quote</label>
                                <textarea name="text" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Autor (opcional)</label>
                                <input type="text" name="author" class="form-control">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Lista de quotes -->
                    <div class="list-group">
                        @forelse($quotes as $quote)
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">"{{ $quote->text }}"</div>
                                @if($quote->author)
                                <small class="text-muted">— {{ $quote->author }}</small>
                                @endif
                                <br>
                                <small class="text-secondary">{{ $quote->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                            <form action="{{ route('quotes.destroy', $quote) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Excluir esta quote?')">
                                    🗑️
                                </button>
                            </form>
                        </div>
                        @empty
                        <div class="text-center py-4 text-muted">
                            Nenhuma quote cadastrada.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
