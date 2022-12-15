 @extends('adminlte::page')

 @section('content_header')
     <h1>Rincian Pemasok</h1>

 @stop

 @section('content')

     <div class="row">
         <div class="col-12 col-sm-12 col-md-4">
             <div class="card card-dark">
                 <div class="card-header border-transparent">
                     <h3 class="card-title"> {{ $pemasok->nama_pemasok }} </h3>
                     <div class="card-tools">
                         <!-- button to edit page-->

                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">

                     <div class="row">
                         <div class="col-sm-12">

                             <div class="form-group col-md-12">
                                 <label class="text-lightdark">
                                     ID Pemasok
                                 </label>
                                 <div class="input-group">
                                     <input id="id" name="id" value="{{ $pemasok->id }}" class="form-control"
                                         disabled>
                                 </div>
                             </div>

                             <div class="form-group col-md-12">
                                 <label for="merek" class="text-lightdark">
                                     Nama Pemasok
                                 </label>
                                 <div class="input-group">
                                     <input id="nama_pemasok" name="nama_pemasok" value="{{ $pemasok->nama_pemasok }}"
                                         class="form-control" disabled>
                                 </div>
                             </div>

                             <div class="form-group col-md-12">
                                 <label for="merek" class="text-lightdark">
                                     Kontak Pemasok
                                 </label>
                                 <div class="input-group">
                                     <input id="kontak_pemasok" name="kontak_pemasok" value="{{ $pemasok->kontak_pemasok }}"
                                         class="form-control" disabled>
                                 </div>
                             </div>

                             <div class="form-group col-md-12">
                                 <label for="alamat_pemasok">
                                     Alamat Pemasok
                                 </label>
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <div class="input-group-text bg-purple">
                                             <i class="fas fa-location-dot"></i>
                                         </div>
                                     </div>
                                     <textarea id="alamat_pemasok" name="alamat_pemasok" class="form-control" disabled="disabled">{{ $pemasok->alamat_pemasok }} </textarea>
                                 </div>
                             </div>


                             <x-adminlte-input name="created_at" type="text" value="{{ $pemasok->created_at }}"
                                 label="Waktu Ditambahkan" fgroup-class="col-md-12" disabled>

                                 <x-slot name="prependSlot">
                                     <div class="input-group-text bg-purple">
                                         <i class="fas fa-calendar-alt"></i>
                                     </div>
                                 </x-slot>

                             </x-adminlte-input>

                             <x-adminlte-input name="updated_at" type="text" value="{{ $pemasok->updated_at }}"
                                 label="Waktu Diperbaharui" fgroup-class="col-md-12" disabled>

                                 <x-slot name="prependSlot">
                                     <div class="input-group-text bg-purple">
                                         <i class="fas fa-calendar-alt"></i>
                                     </div>
                                 </x-slot>

                             </x-adminlte-input>

                             <x-adminlte-button class="btn bg-purple col-12 simpan" type="submit" label="Simpan Data"
                                 icon="fas fa fa-fw fa-save" hidden />

                             <x-adminlte-button class="btn bg-purple col-12 edit" type="submit" label="Edit Data"
                                 icon="fas fa fa-fw fa-edit" />

                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-12 col-sm-12 col-md-8">
             <div class="card card-dark">
                 <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                     <h3 class="card-title">Daftar Transaksi {{ $pemasok->nama_pemasok }}</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <table id="tabel-transaksi" class="table table-striped table-hover table-bordered">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Tanggal Transaksi</th>
                                 <th>Total Harga</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>

                     </table>
                 </div>
             </div>
         </div>

     </div>





 @stop

 @section('css')

 @stop
 @section('js')

     <script>
         $(document).ready(function() {
             //set csrf token
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
         });

         //make input available when edit button is clicked
     </script>

     <script>
         $(document).ready(function() {
             $('.edit').click(function() {
                 $('#nama_pemasok').prop('disabled', false);
                 $('#alamat_pemasok').prop('disabled', false);
                 $('#kontak_pemasok').prop('disabled', false);
                 $('.simpan').prop('hidden', false);
                 $('.edit').prop('hidden', true);

             });

             $('.simpan').click(function() {
                 //ajax update data
                 $.ajax({
                     url: "{{ route('pemasok.update', $pemasok->id) }}",
                     type: 'PUT',
                     data: {
                         nama_pemasok: $('#nama_pemasok').val(),
                         alamat_pemasok: $('#alamat_pemasok').val(),
                         kontak_pemasok: $('#kontak_pemasok').val(),

                     },
                     success: function(data) {
                         $('#nama_pemasok').prop('disabled', true);
                         $('#alamat_pemasok').prop('disabled', true);
                         $('#kontak_pemasok').prop('disabled', true);
                         $('.simpan').prop('hidden', true);
                         $('.edit').prop('hidden', false);


                         Swal.fire({
                             icon: 'success',
                             title: 'Berhasil',
                             text: 'Data berhasil diperbaharui',
                         });
                     },
                     error: function(data) {
                         Swal.fire({
                             icon: 'error',
                             title: 'Gagal',
                             text: 'Data gagal diperbaharui',
                         });
                     }
                 });

                 //set updated_at with now
                 var now = new Date();
                 var date = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
                 var time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
                 var dateTime = date + ' ' + time;
                 $('#updated_at').val(dateTime);

             });

         });
     </script>

     <script>
         $(document).ready(function() {
             //set data table
                $('#tabel-transaksi').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pemasok.getTransaksi', $pemasok->id) }}",
                    columns: [{
                            data: 'id',
                            name: 'id',

                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'total_harga',
                            name: 'total_harga'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });
         });

         //make input available when edit button is clicked
     </script>


 @stop
