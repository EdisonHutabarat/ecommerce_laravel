@extends('layouts.user.main')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="">
                        <!-- single-slide -->
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Nike New <br>Collection!</h1>
                                    <p>Produk terbaru dari NIKE ini merupakan hasil kolaborasi Polbeng dengan Brand NIKE.
                                        Keren kan? Pasti keren lah, mantap kali ini.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid"
                                        src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start product Area -->
    <section class="section_gap">
        <!-- Latest Products -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                        <p>Semua barang disini dapat anda dapatkan dengan murah</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @forelse ($products as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                            <div class="product-details">
                                <h6>{{ $item->name }}</h6>
                                <div class="price">
                                    <h6>Harga: {{ $item->price }} Points</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a class="social-info" href="javascript:void(0);"
                                        onclick="confirmPurchase('{{ $item->id }}', '{{ Auth::user()->id }}')">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Beli</p>
                                    </a>
                                    <a href="{{ route('user.detail.product', $item->id) }}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">Detail</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="single-product">
                            <h3 class="text-center">Tidak ada produk</h3>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Flash Sale Section -->
            <h1>Flash Sale</h1>
            <div class="row">
                @forelse($flashsales as $flashSaleItem)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('images/' . $flashSaleItem->image) }}" alt="{{ $flashSaleItem->product_name }}">
                            <div class="product-details">
                                <h6>{{ $flashSaleItem->product_name }}</h6>
                                <div class="price">
                                    <h6>
                                        <strike>Rp{{ number_format($flashSaleItem->original_price, 2) }}</strike>
                                    </h6>
                                    <h6>Rp{{ number_format($flashSaleItem->discount_price, 2) }}</h6>
                                    <h6>Diskon: {{ round($flashSaleItem->discount_percentage) }}%</h6>
                                    <p>Sisa waktu: {{ \Carbon\Carbon::parse($flashSaleItem->end_time)->diffForHumans() }}</p>
                                    <p>Stok tersisa: {{ $flashSaleItem->stock }}</p>
                                </div>
                                <div class="prd-bottom">
                                    <a class="social-info" href="javascript:void(0);"
                                        onclick="confirmFlashSalePurchase('{{ $flashSaleItem->id }}', '{{ Auth::user()->id }}')">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Beli</p>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h3 class="text-center">Tidak ada produk flash sale saat ini.</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- SweetAlert for Purchase Confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmPurchase(productId, userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan membeli produk ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Beli!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/product/purchase/' + productId + '/' + userId;
                }
            });
        }
        function confirmFlashSalePurchase(flashSaleId, userId) { 
            Swal.fire({ 
                title: 'Apakah Anda yakin?', 
                text: "Anda akan membeli produk Flash Sale ini!", 
                icon: 'warning', 
                showCancelButton: true, 
                confirmButtonColor: '#3085d6', 
                cancelButtonColor: '#d33', 
                confirmButtonText: 'Ya, Beli!', 
                cancelButtonText: 'Batal' 
            }).then((result) => { 
                if (result.isConfirmed) { 
                    window.location.href = '/user/#Flashsale'; 
                } 
            }); 
        }
    </script>
@endsection
