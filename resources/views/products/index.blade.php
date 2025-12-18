@extends('layouts.app')

@section('content')
<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h2 class="fw-bold border-start border-primary border-4 ps-3 mb-1">Available Products</h2>
        <p class="text-muted mb-0">Select an item to pay instantly via KHQR</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
            Showing {{ $products->count() }} Results
        </span>
    </div>
</div>

<div class="row g-4">
    @forelse($products as $product)
        <div class="col-sm-6 col-xl-4">
            <div class="rgb-container">
                <div class="card h-100 border-0 transition-hover product-card">
                    <div class="position-relative d-flex align-items-center justify-content-center" 
                         style="height: 240px; overflow: hidden; background: #ffffff; border-radius: 15px 15px 0 0;">
                        
                        <img src="{{ $product->image }}" 
                             class="p-3" 
                             style="width: 100%; height: 100%; object-fit: contain;" 
                             alt="{{ $product->name }}">
                        
                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill bg-white text-primary shadow-sm px-3 border">
                            {{ $product->category }}
                        </span>
                    </div>
                    
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="fw-bold mb-2 text-dark">{{ $product->name }}</h5>
                        <p class="text-muted small flex-grow-1 line-clamp">
                            {{ Str::limit($product->description, 70) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                            <div class="d-flex flex-column">
                                <small class="text-muted x-small text-uppercase fw-bold">Price</small>
                                <span class="text-primary fw-bold h5 mb-0">{{ number_format($product->price, 0) }} ៛</span>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-dark rounded-pill px-4 shadow-sm fw-bold btn-sm">
                                Buy <i class="fas fa-shopping-bag ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="py-5">
                <i class="fas fa-box-open display-1 text-light mb-4"></i>
                <h4 class="text-muted">No products found</h4>
                <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 mt-2">View All Products</a>
            </div>
        </div>
    @endforelse
</div>

<style>
    /* RGB Glowing Frame Logic */
    .rgb-container {
        position: relative;
        padding: 3px; 
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        z-index: 1;
        height: 100%;
        transition: all 0.3s ease;
    }

    .rgb-container::before {
        content: '';
        position: absolute;
        width: 150%;
        height: 150%;
        background: conic-gradient(
            #ff0000, #ff7300, #fffb00, #48ff00, 
            #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000
        );
        top: -25%;
        left: -25%;
        animation: spin 4s linear infinite;
        z-index: -2;
    }

    .rgb-container::after {
        content: '';
        position: absolute;
        inset: 3px;
        background: white;
        border-radius: 17px;
        z-index: -1;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .product-card {
        background: white;
        border-radius: 17px !important;
    }

    .transition-hover {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .rgb-container:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .rgb-container:hover::before {
        animation-duration: 1.5s;
        filter: brightness(1.2);
    }

    .x-small { font-size: 0.65rem; letter-spacing: 0.5px; }

    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
@endsection