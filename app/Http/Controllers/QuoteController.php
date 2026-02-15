<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->get();
        return view('quotes.index', compact('quotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'author' => 'nullable|string',
        ]);

        Quote::create($request->all());

        return redirect()->route('quotes.index')->with('success', 'Quote cadastrada com sucesso!');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('quotes.index')->with('success', 'Quote excluída!');
    }

    public function random()
    {
        $quotes = Quote::all();
        
        if ($quotes->isEmpty()) {
            return view('quote', ['quote' => null, 'secondsUntilNext' => 60]);
        }
        
        // Calcular o minuto atual (0-59)
        $currentMinute = (int) date('i');
        $currentSecond = (int) date('s');
        $secondsUntilNext = 60 - $currentSecond;
        
        // Usar o minuto atual como índice para seleccionar quote
        // Assim todos veem a mesma quote no mesmo minuto
        $quoteIndex = $currentMinute % $quotes->count();
        $quote = $quotes[$quoteIndex];
        
        return view('quote', compact('quote', 'secondsUntilNext'));
    }
}
