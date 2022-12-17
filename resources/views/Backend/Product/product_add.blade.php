@extends('Backend.Layouts.main')

@section('body')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title">
                        Edit Layanan
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8 mb-4 mb-md-0 tab-content">
                    <form action="/product" id="form" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <!-- <div class="card-header font-weight-bold"></div> -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="nama_barang">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="url" name="harga">
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

        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('.btn-publish').on('click', function() {
                    Swal.fire({
                        title: 'Tambah Layanan?',
                        text: "Apakah anda yakin?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Success!',
                                'Layanan Berhasil ditambah',
                                'success',
                            ).then((result) => {
                                window.location = "?page=layanan";
                            })
                        }
                    })
                });
            });
        </script>


        <script type="text/javascript">
            $(function() {
                $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Layanan")').parents(
                    '.nav-item').addClass('active');
            });
        </script>

        <script src="assets/libs/litepicker/dist/litepicker.js"></script>
        <!-- QUILL EDITOR -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'align': []
                }],
                ['image'],
                ['clean']
            ];

            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });
            var quill = new Quill('#editor2', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });

            new Litepicker({
                element: document.getElementById('input-eg-show-nights'),
                singleMode: false,
                tooltipText: {
                    one: 'night',
                    other: 'nights'
                },
                tooltipNumber: (totalDays) => {
                    return totalDays - 1;
                }
            })

            $(function() {
                $('#form-template').on('change', function() {
                    var template = $(this).val();
                    $('[data-template]').hide();
                    $('[data-template*=' + template + ']').show();
                }).change();

                $(document).on('click', '.btn-add-accordion', function() {
                    var title = $('#accordion-title').val();
                    var desc = $('#accordion-description').val();
                    var number = $('#table-accordion-list tbody tr').length;

                    var template = '<tr data-id="' + (number + 1) + '">' +
                        '<td class="title">' + title + '</td>' +
                        '<td class="desc">' + desc + '</td>' +
                        '<td class="text-nowrap" valign="top">' +
                        '<a href="#" class="btn-edit-accordion">Edit</a>' +
                        '<div class="vr mx-1"></div>' +
                        '<a href="#" class="text-danger btn-delete-accordion">Delete</a>' +
                        '</td>' +
                        '</tr>';


                    $('#table-accordion-list tbody').append(template);
                });

                $(document).on('click', '.btn-edit-accordion', function() {
                    var title = $(this).parents('tr').find('td')
                    var desc = $('#accordion-description').val();
                    var number = $('#table-accordion-list tbody tr').length;

                    var template = '<tr data-id="' + (number + 1) + '">' +
                        '<td class="title">' + title + '</td>' +
                        '<td class="desc">' + desc + '</td>' +
                        '<td class="text-nowrap" valign="top">' +
                        '<a href="#" class="btn-edit-accordion">Edit</a>' +
                        '<div class="vr mx-1"></div>' +
                        '<a href="#" class="text-danger btn-delete-accordion">Delete</a>' +
                        '</td>' +
                        '</tr>';


                    $('#table-accordion-list tbody').append(template);
                });
            })
        </script>
        <script></script>
    @endsection
