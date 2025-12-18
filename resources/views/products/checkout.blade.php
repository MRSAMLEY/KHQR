@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light p-3">
    <div class="card border-0 shadow-lg p-3 p-md-4" style="width: 100%; max-width: 420px; border-radius: 24px;">
        
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Checkout</h2>
            <p class="text-muted small">Complete your payment using Bakong KHQR</p>
        </div>

        <div class="d-flex justify-content-between align-items-center p-3 mb-4 bg-primary bg-opacity-10 rounded-4">
            <div>
                <span class="d-block text-muted small text-uppercase fw-bold" style="letter-spacing: 0.5px;">Amount Due</span>
                <h3 class="mb-0 fw-bold text-primary">{{ number_format($product->price, 0) }} ៛</h3>
            </div>
            <div class="text-end">
                <span class="badge bg-white text-primary border border-primary-subtle rounded-pill px-3">#{{ substr($md5, 0, 8) }}</span>
            </div>
        </div>

        <div class="text-center">
            @if ($qr)
                <div class="qr-container p-3 mb-3">
                    <div class="qr-wrapper d-inline-block bg-white p-2 rounded-4 shadow-sm border">
                        {{-- size(300) acts as the base resolution; CSS handles the actual display scale --}}
                        {!! QrCode::size(300)->gradient(0, 0, 0, 63, 29, 117, 'radial')->margin(1)->generate($qr) !!}
                    </div>
                </div>
                
                <div id="status-badge" class="mb-3">
                    <span class="badge bg-soft-info text-primary p-2 px-3 animate-pulse fw-medium">
                        <i class="fas fa-sync fa-spin me-2"></i> Waiting for payment...
                    </span>
                </div>
            @else
                <div class="alert alert-danger border-0 rounded-4 py-4">
                    <i class="fas fa-exclamation-circle fa-2x mb-2 text-danger"></i>
                    <p class="mb-0 fw-bold">QR Generation Failed</p>
                    <small>Please refresh the page to try again.</small>
                </div>
            @endif
        </div>

        <div class="text-center mt-2 px-3">
            <div class="progress mb-2" style="height: 6px; border-radius: 10px; background-color: #e9ecef;">
                <div id="timer-bar" class="progress-bar bg-primary" role="progressbar" style="width: 100%; transition: width 1s linear;"></div>
            </div>
            <p class="small text-muted">Expires in <span id="seconds" class="fw-bold text-dark">120</span> seconds</p>
        </div>

        <div class="mt-4 pt-2 border-top text-center">
            <a href="{{ route('home') }}" class="btn btn-link text-decoration-none text-muted btn-sm">
                <i class="fas fa-chevron-left me-1 small"></i> Cancel and go back
            </a>
        </div>
    </div>
</div>

<style>
    /* Fixed Scale & Fluidity */
    .qr-wrapper svg {
        width: 100% !important;
        height: auto !important;
        max-width: 240px; /* Limits size on desktop */
        display: block;
    }
    
    .bg-soft-info { background-color: #ebf0ff; }
    
    .qr-wrapper { 
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0 !important;
    }
    
    .qr-wrapper:hover { 
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }

    @keyframes pulse {
        0% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.7; transform: scale(0.98); }
        100% { opacity: 1; transform: scale(1); }
    }
    .animate-pulse { animation: pulse 2.5s ease-in-out infinite; }

    /* Adjustments for very small screens */
    @media (max-width: 350px) {
        .qr-wrapper svg { max-width: 180px; }
        h3 { font-size: 1.25rem; }
    }
</style>

<script>
    let timeLeft = 120;
    const totalTime = 120;
    let isProcessing = false;

    const secondsText = document.getElementById('seconds');
    const timerBar = document.getElementById('timer-bar');
    const statusBadge = document.getElementById('status-badge');

    const timer = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timer);
            handleTimeout();
            return;
        }

        timeLeft--;
        secondsText.textContent = timeLeft;
        const percentage = (timeLeft / totalTime) * 100;
        timerBar.style.width = percentage + "%";

        // Poll every 3 seconds
        if (timeLeft % 3 === 0 && !isProcessing) {
            verifyTransaction();
        }
    }, 1000);

    function verifyTransaction() {
        isProcessing = true;
        fetch("{{ route('verify.transaction') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ md5: "{{ $md5 }}" })
        })
        .then(response => response.json())
        .then(data => {
            if (data.responseCode === 0 || data.status === 'success') {
                clearInterval(timer);
                showSuccess();
            }
        })
        .catch(error => console.error('Verification Error:', error))
        .finally(() => isProcessing = false);
    }

    function showSuccess() {
        statusBadge.innerHTML = `<span class="badge bg-success p-2 px-4 rounded-pill shadow-sm"><i class="fas fa-check-circle me-2"></i> Payment Received!</span>`;
        timerBar.classList.replace('bg-primary', 'bg-success');
        setTimeout(() => {
            window.location.href = "{{ route('home') }}?status=success";
        }, 2000);
    }

    function handleTimeout() {
        statusBadge.innerHTML = `<span class="badge bg-danger p-2 px-3">Session Expired</span>`;
        setTimeout(() => {
            window.location.href = "{{ route('home') }}?error=timeout";
        }, 1500);
    }
</script>
@endsection