@extends('Backend.Layouts.main')

@section('body')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Tambah Product
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0 tab-content">
                    <form action="/customer" id="form" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <!-- <div class="card-header font-weight-bold"></div> -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="nama">
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
