@extends('Backend.Layouts.main')
{{-- @dd($orders) --}}
@section('body')
    {{-- @if ($siswa->count()) --}}
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-4 text-gray-800">Data Product</h1> --}}
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Data Order
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/order/create" class="btn btn-danger d-inline-block">
                            <i class="fa fa-plus me-2"></i> Order
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 mt-4">
            <div class="table-responsive">
                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div class="text-center">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="table table-danger">
                            <th width="200">Aksi</th>
                            <th scope="400" class="text-center">Customer</th>
                            <th scope="400" class="text-center">Produk</th>
                            <th scope="400" class="text-center">Quantity</th>
                            <th scope="400" class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                {{-- <th scope="row"><a href="/datasiswa/{{ $student->id }}" style="text-decoration: none" class="text-dark">{{ $student->id }}</a></th> --}}
                                <td>
                                    <div class="text-center btn-group">
                                        <a href="/order/{{ $order->id }}/edit" class="btn btn- m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                        <form action="/order/{{ $order->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-delete m-1 h3 text-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">{{ $order->customers->nama }}</a></td>
                                <td class="text-center">{{ $order->products->nama_barang }}</td>
                                <td class="text-center">{{ $order->qty }}</td>
                                <td class="text-center">{{ number_format($order->products->harga * $order->qty) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">

                </div>
            </div>

        </div>
        <!-- End of Main Content -->
    @endsection
