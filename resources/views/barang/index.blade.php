@extends('adminlte::page')

@section('plugins.Select2', true)

@section('title', 'Barang')

@section('content_header')
    <h1>Barang</h1>
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

            <ul class="nav nav-tabs" id="barang-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="barang-tabs-table-tab" data-toggle="pill" href="#barang-tabs-table"
                        role="tab" aria-controls="barang-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="barang-tabs-add-tab" data-toggle="pill" href="#barang-tabs-add" role="tab"
                        aria-controls="barang-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Barang
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="barangTabContent">
                <div class="tab-pane active show" id="barang-tabs-table" role="tabpanel"
                    aria-labelledby="barang-tabs-table-tab">

                    <!-- Table barang -->
                    <div class="table-responsive">
                        <table id="barang-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Merek</th>
                                    <th>Pemasok</th>

                                    <th>Harga</th>
                                    <th>Total Terjual</th>
                                    <th>Total Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>



                </div>
                <div class="tab-pane fade" id="barang-tabs-add" role="tabpanel" aria-labelledby="barang-tabs-add-tab">

                    <!-- Form input barang -->

                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-select2 id="selectProduk" name="produk_id" label="Produk"
                                    label-class="text-lightblue" fgroup-class="col-md-6" data-placeholder="Pilih produk...">
                                    <option />
                                    @foreach ($produk as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 id="selectMerek" name="merek_id" label="Merek Barang"
                                    label-class="text-lightblue" fgroup-class="col-md-6" data-placeholder="Pilih merek...">
                                    <option />
                                    @foreach ($merek as $merek)
                                        <option value="{{ $merek->id }}">{{ $merek->nama_merek }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok"
                                    label-class="text-lightblue" fgroup-class="col-md-6"
                                    data-placeholder="Pilih pemasok...">
                                    <option />
                                    @foreach ($pemasok as $pemasok)
                                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-input name="sku" label="SKU Barang" label-class="text-lightblue"
                                    placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-input name="harga" label="Harga Barang" label-class="text-lightblue"
                                    placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
                                    disable-feedback />

                                <x-adminlte-input name="total_stok" label="Total Stok Barang" label-class="text-lightblue"
                                    placeholder="Contoh : Apa saja " fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-button class="btn" type="submit" label="Simpan Data" theme="info"
                                    icon="fas fa-lg fa-save" />
                            </div>
                        </div>
                    </form>

                    <!-- End of form input barang -->

                </div>

            </div>
        </div>



    </div>


    <!-- End of card barang -->

    <!-- Modal -->




@stop


@section('js')
    <script>
        $(document).ready(function() {

            //csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#barang-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('barang.getTableBarang') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%',
                        sClass: 'text-center'
                    },
                    {
                        data: 'produk.nama_produk',
                        name: 'produk.nama_produk'
                    },
                    {
                        data: 'merek.nama_merek',
                        name: 'merek.nama_merek',


                    },
                    {
                        data: 'pemasok.nama_pemasok',
                        name: 'pemasok.nama_pemasok'
                    },

                    {
                        data: 'harga',
                        name: 'harga'

                    },
                    {
                        data: 'total_terjual',
                        name: 'total_terjual'
                    },
                    {
                        data: 'total_stok',
                        name: 'total_stok'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        sClass: 'text-center'
                    },
                ]
            });

            //delete data pelanggan
            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                deleteData(id);
            });

        });

        //function delete data
        //delete data
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "SEMUA data TRANSAKSI yang berkaitan dengan barang ini akan terhapus!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Anda benar-benar yakin?',
                        text: "Data yang terhapus tak dapat dikembalikan!!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{ route('barang.index') }}' + '/' + id,
                                dataType: 'json',
                                success: function(data) {
                                    if (data.success != null) {
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
                                        $('#barang-table').DataTable().ajax
                                            .reload();
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
                                errors: function(data) {
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
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter',
                                                Swal
                                                .stopTimer)
                                            toast.addEventListener('mouseleave',
                                                Swal
                                                .resumeTimer)
                                        }
                                    });
                                }

                            });

                        }
                    })
                }
            })
        }
    </script>

    <script>
        $(document).ready(function(){
            //open edit form through iframe
            $(document).on('click', '.edit', function(){
                let id = $(this).attr('data-id');
                $('#edit-modal').modal('show');
                $('#edit-modal').find('.modal-body').load('{{ route('barang.index') }}' + '/' + id + '/edit');
            });
        })
    </script>
@stop
