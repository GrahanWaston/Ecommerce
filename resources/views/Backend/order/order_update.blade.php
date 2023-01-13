@extends('Backend.Layouts.main')

@section('body')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Order
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0 tab-content">
                    <form action="/order/{{ $orders->id }}" id="form" method="POST">
                        @csrf
                        @method('put')
                        <div class="card mb-3">
                            <!-- <div class="card-header font-weight-bold"></div> -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <select class="form-select" name="customer_id">
                                        <option disabled selected value="{{ $orders->customer_id }}">{{ $orders->customers->nama }}</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Produk</label>
                                    <select class="form-select" aria-label="Default select example" name="product_id">
                                        <option disabled selected value="{{ $orders->product_id }}">{{ $orders->products->nama_barang }}</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="qty" name="qty" value="{{ $orders->qty }}">
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-light">
                                <button class="btn btn-publish btn-warning">Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <style type="text/css">
            [data-template] {
                display: none;
            }
        </style>
    @endsection
