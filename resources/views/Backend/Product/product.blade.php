@extends('Backend.Layouts.main')

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
                        Data Product
                    </h2>
                </div>
                <div class="col-auto d-print-none">
                    <div class="btn-list">
                        <a href="/product/create" class="btn btn-danger d-inline-block">
                            <i class="fa fa-plus me-2"></i> Product
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
                <table class="table table-bordered">
                    <thead>
                        <tr class="table table-danger">
                            <th width="200">Aksi</th>
                            <th scope="400" class="text-center">Product Name</th>
                            <th scope="400" class="text-center">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                {{-- <th scope="row"><a href="/datasiswa/{{ $student->id }}" style="text-decoration: none" class="text-dark">{{ $student->id }}</a></th> --}}
                                <td>
                                    <div class="text-center">
                                        <a href="/product/{{ $product->id }}/edit" class="m-1 h3"><i
                                                class="fas fa-file-signature"></i></a>
                                        <a href="#" class="btn-delete m-1 h3 text-danger"><i
                                                class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                                <td class="text-center">{{ $product->nama_barang }}</a></td>
                                <td class="text-center">{{ $product->harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">

                </div>
            </div>
            {{-- </div> --}}


            <!-- /.container-fluid -->
            {{-- @else --}}
            {{-- <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Siswa Tidak ditemukan</p>
                        <a href="/dashboard" class="text-info">&larr; Back to Dashboard</a>
                    </div>

                </div> --}}
            {{-- @endif --}}
        </div>
        <!-- End of Main Content -->
    @endsection
