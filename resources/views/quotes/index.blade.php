@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Gerenciar Quotes</h2>
                    <a href="{{ route('home') }}" class="text-purple-600 hover:underline">Ver Quote do Minuto</a>
                </div>

                <!-- Formulário para adicionar quote -->
                <form action="{{ route('quotes.store') }}" method="POST" class="mb-8 p-4 bg-gray-50 rounded-lg">
                    @csrf
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto da Quote</label>
                            <textarea name="text" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Autor (opcional)</label>
                            <input type="text" name="author" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                            Adicionar Quote
                        </button>
                    </div>
                </form>

                <!-- Lista de quotes -->
                <div class="space-y-4">
                    @forelse($quotes as $quote)
                    <div class="flex justify-between items-start p-4 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-lg font-medium">"{{ $quote->text }}"</p>
                            @if($quote->author)
                            <p class="text-sm text-gray-500 mt-1">— {{ $quote->author }}</p>
                            @endif
                            <p class="text-xs text-gray-400 mt-2">{{ $quote->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <form action="{{ route('quotes.destroy', $quote) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Excluir esta quote?')">
                                🗑️
                            </button>
                        </form>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-4">Nenhuma quote cadastrada.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
