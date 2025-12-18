@extends('layouts.app')

@section('content')
<style>
    .checkout-container { max-width: 900px; margin-top: 50px; margin-bottom: 50px; }
    .payment-card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    .product-preview-img { width: 100px; height: 100px; object-fit: cover; border-radius: 12px; }
    .khqr-logo { height: 35px; }
    .price-total { font-size: 1.5rem; color: #1e293b; font-weight: 800; }
    .btn-khqr { 
        background-color: #e11d48; /* KHQR Brand Red-ish */
        color: white; 
        border: none; 
        padding: 15px; 
        font-weight: bold; 
        border-radius: 12px; 
        transition: 0.3s;
    }
    .btn-khqr:hover { background-color: #be123c; transform: translateY(-2px); color: white; }
    .security-badge { font-size: 0.85rem; color: #64748b; }
</style>

<div class="container checkout-container">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Secure Checkout</h2>
        <p class="text-muted">Review your order and proceed to payment</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card payment-card p-4">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                <div class="d-flex align-items-center mb-4">
                    <img src="{{ $product->image }}" class="product-preview-img me-3" alt="{{ $product->name }}">
                    <div>
                        <h6 class="mb-1 fw-bold">{{ $product->name }}</h6>
                        <p class="text-muted small mb-0">{{ Str::limit($product->description, 50) }}</p>
                    </div>
                </div>

                <hr class="border-dashed">

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span>{{ number_format($product->price, 0) }} ៛</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Service Fee</span>
                    <span>0 ៛</span>
                </div>
                <div class="d-flex justify-content-between mt-3 pt-3 border-top">
                    <span class="fw-bold">Total Amount</span>
                    <span class="price-total">{{ number_format($product->price, 0) }} ៛</span>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card payment-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Payment Method</h5>
                    <img src="https://bakong.nbc.gov.kh/assets/img/khqr-logo.png" class="khqr-logo" alt="KHQR">
                </div>

                <div class="alert alert-info border-0 small mb-4" style="background-color: #f0f9ff;">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Click the button below to generate a unique KHQR code. You can scan it with any mobile banking app in Cambodia.
                </div>

                <form action="{{ route('checkout', $product->id) }}" method="POST" id="khqr-form">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Phone Number (Optional)</label>
                        <input type="text" class="form-control form-control-lg" placeholder="012 345 678" style="border-radius: 10px; font-size: 1rem;">
                    </div>

                    <button type="submit" class="btn btn-khqr w-100 mb-3" onclick="showLoading()">
                        <i class="bi bi-qr-code-scan me-2"></i> Generate KHQR to Pay
                    </button>
                </form>

                <div class="text-center mt-auto">
                    <div class="security-badge">
                        <i class="bi bi-shield-lock-fill text-success me-1"></i>
                        Encrypted & Secure Payment via Bakong
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left me-1"></i> Cancel and go back
        </a>
    </div>
</div>

<script>
    function showLoading() {
        const btn = document.querySelector('.btn-khqr');
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Generating...';
        btn.classList.add('disabled');
    }
</script>
@endsection