<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote of the Minute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { 
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
        }
        .quote-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .fade-in { 
            animation: fadeIn 1s ease-in-out; 
        }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(20px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="text-center px-4" style="max-width: 800px;">
        <div class="mb-4">
            <span class="badge bg-primary fs-6">Quote of the Minute</span>
        </div>
        
        @if($quote)
        <div class="quote-card fade-in">
            <p class="fs-3 fw-light text-white mb-4">
                "{{ $quote->text }}"
            </p>
            @if($quote->author)
            <p class="text-primary fs-5">— {{ $quote->author }}</p>
            @endif
        </div>
        @else
        <div class="quote-card">
            <p class="text-white fs-5">Nenhuma quote cadastrada ainda.</p>
        </div>
        @endif

        <div class="mt-4">
            <span class="text-white-50">
                Próxima quote em <span id="timer" class="fw-bold text-white">{{ $secondsUntilNext ?? 60 }}</span>s
            </span>
        </div>

        <div class="mt-3">
            <a href="{{ route('login') }}" class="text-white-50 text-decoration-none">
                🔐 Área Administrativa
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let seconds = {{ $secondsUntilNext ?? 60 }};
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
