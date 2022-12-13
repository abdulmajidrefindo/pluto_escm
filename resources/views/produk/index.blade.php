@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Produk</h1>
@stop

@section('content')

    <div class="card card-dark card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-tools">

                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

            </div>

            <ul class="nav nav-tabs" id="produk-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="produk-tabs-table-tab" data-toggle="pill" href="#produk-tabs-table"
                        role="tab" aria-controls="produk-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="produk-tabs-add-tab" data-toggle="pill" href="#produk-tabs-add" role="tab"
                        aria-controls="produk-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Produk Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="produkTabContent">
                <div class="tab-pane active show" id="produk-tabs-table" role="tabpanel"
                    aria-labelledby="produk-tabs-table-tab">

                    <!-- Table barang -->
                    <div class="table-responsive">
                        <table id="produk-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Produk</th>
                                    <th>Unit</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>

                <div class="tab-pane fade" id="produk-tabs-add" role="tabpanel" aria-labelledby="produk-tabs-add-tab">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-input name="nama_produk" label="Nama Produk"
                                    placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-input name="unit" label="Unit"
                                    placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Apa saja "
                                    fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-select2 id="selectKategori" name="kategori_id" label="Kategori Produk"
                                    label-class="" fgroup-class="col-md-6" data-placeholder="Pilih kategori...">
                                    <option />
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->first()->nama_kategori }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select name="jenis_produk" label="Jenis Produk" fgroup-class="col-md-6">
                                    <x-adminlte-options :options="['Bahan Jadi', 'Bahan Baku', 'Bahan Olahan']" disabled="-1" />
                                </x-adminlte-select>
                                <x-adminlte-button class="btn" type="submit" label="Simpan Data" theme="info"
                                    icon="fas fa-sm fa-fw fa-save" />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>

    <x-adminlte-modal id="modalProduk" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td id="idProduk">Mark</td>
                </tr>
                <tr>
                    <th scope="row">Nama Produk</th>
                    <td id="namaProduk">Mail</td>

                </tr>
                <tr>
                    <th scope="row">Unit</th>
                    <td id="unit">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td id="keterangan">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Kategori</th>
                    <td id="kategori">halah</td>
                </tr>
            </tbody>
        </table>
        <x-slot name="footerSlot">
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')

                <input id="id" name="id" hidden value="">
                <x-adminlte-button type="submit" class="mr-auto" theme="danger" label="Iya, hapus data." />

                <x-adminlte-button theme="success" label="Tidak" data-dismiss="modal" />
            </form>
        </x-slot>

    </x-adminlte-modal>


    <x-adminlte-modal id="modalProdukDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian kategori
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td id="idProduk">Mark</td>
                </tr>
                <tr>
                    <th scope="row">Nama Produk</th>
                    <td id="namaProduk">Mail</td>

                </tr>
                <tr>
                    <th scope="row">Unit</th>
                    <td id="unit">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td id="keterangan">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Kategori</th>
                    <td id="kategori">halah</td>
                </tr>
            </tbody>
        </table>

    </x-adminlte-modal>

@stop



@section('js')
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            let namaProduk = $(this).attr('data-nama-produk');
            let unit = $(this).attr('data-unit');
            let keterangan = $(this).attr('data-keterangan');
            let kategori = $(this).attr('data-kategori');

            $('#deleteForm').attr('action', '/produk/' + id);
            document.getElementById("idProduk").innerHTML = id;
            document.getElementById("namaProduk").innerHTML = namaProduk;
            document.getElementById("unit").innerHTML = unit;
            document.getElementById("keterangan").innerHTML = keterangan;
            document.getElementById("kategori").innerHTML = kategori;
        });
    </script>

    <script>
        //document ready
        $(document).ready(function() {


            //datatable
            $('#produk-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('produk.getTable') }}",
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },

                    {
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'unit',
                        name: 'unit'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ]
            }); //end of datatable

            $(document).on('click', '.delete', function() {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "SEMUA data ITEM BARANG dan TRANSAKSI yang berkaitan dengan produk ini akan terhapus!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        let id = $(this).attr('data-id');
                        deleteData(id);
                    }
                });
            });


        });

        //delete data with ajax
        function deleteData(id) {
            $.ajax({
                url: "{{ route('produk.index') }}" + '/' + id,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success != null) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Berhasil Dihapus',
                            icon: 'success',
                            iconColor: '#fff',
                            color: '#fff',
                            toast: true,
                            background: '#8D72E1',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        $('#produk-table').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Gagal Dihapus',
                            icon: 'error',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data Gagal Dihapus',
                        icon: 'error',
                        iconColor: '#fff',
                        toast: true,
                        background: '#f8bb86',
                        position: 'center-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
            });
        }


        //end of document ready
    </script>
@stop
