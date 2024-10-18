@extends('layouts.admin.main')
@section('title', 'Admin Edit Flash Sale Product')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Produk Flash Sale</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.flashsale') }}">FlashSale</a></div>
                    <div class="breadcrumb-item">Edit Produk FlashSale</div>
                </div>
            </div>
            <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>
            <div class="card mt-4">
                <form action="{{ route('flashsale.update', $flashsales->id) }}" class="needs-validation" novalidate=""
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name">Nama Produk</label>
                                    <input id="product_name" type="text" class="formcontrol" name="product_name"
                                        required="" value="{{ $flashsales->product_name }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="original_price">Harga Normal (Point)</label>
                                    <input id="original_price" type="number" class="form-control" name="original_price"
                                        required="" value="{{ $flashsales->original_price }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount_price">Harga Diskon (Point)</label>
                                    <input id="discount_price" type="number" class="form-control" name="discount_price"
                                        required="" value="{{ $flashsales->discount_price }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="stock">Stok Produk</label>
                                    <input id="stock" type="text" class="formcontrol" name="stock" required=""
                                        value="{{ $flashsales->stock }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_time">Tanggal Mulai</label>
                                    <input id="start_time" type="datetime-local" class="form-control" name="start_time"
                                        required="">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_time">Tanggal Berakhir</label>
                                    <input id="end_time" type="datetime-local" class="form-control" name="end_time"
                                        required="">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi Produk</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{ $flashsales->description }}</textarea>
                                    <div class="invalid-feedback">
                                        Isi berita harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-icon icon-left btnprimary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
