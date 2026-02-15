<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote of the Minute</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .fade-in { animation: fadeIn 1s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen flex items-center justify-center">
    <div class="text-center px-4 max-w-2xl">
        <div class="mb-4">
            <span class="bg-purple-500/20 text-purple-300 px-4 py-1 rounded-full text-sm">Quote of the Minute</span>
        </div>
        
        @if($quote)
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 md:p-12 shadow-2xl fade-in">
            <p class="text-2xl md:text-3xl font-light text-white leading-relaxed mb-6">
                "{{ $quote->text }}"
            </p>
            @if($quote->author)
            <p class="text-purple-300 text-lg">— {{ $quote->author }}</p>
            @endif
        </div>
        @else
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8">
            <p class="text-white text-xl">Nenhuma quote cadastrada ainda.</p>
        </div>
        @endif

        <div class="mt-8 flex items-center justify-center gap-4">
            <div class="animate-pulse">
                <span class="text-purple-400 text-sm">Próxima quote em <span id="timer" class="font-bold text-white">60</span>s</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('login') }}" class="text-slate-400 hover:text-white text-sm transition">
                🔐 Área Administrativa
            </a>
        </div>
    </div>

    <script>
        let seconds = 60;
        const timer = document.getElementById('timer');
        
        setInterval(() => {
            seconds--;
            if (seconds <= 0) {
                location.reload();
            }
            timer.textContent = seconds;
        }, 1000);
    </script>
</body>
</html>
