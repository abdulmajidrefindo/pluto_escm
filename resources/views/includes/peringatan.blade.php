

<div class="row">
    <div class="col-md-12 col-md-6">
        <div class="card card-dark">
            <div class="card-header" role="button" data-card-widget="collapse">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle fa-fw"></i>
                    Pemberitahuan
                </h3>
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
                @foreach ($notifikasi as $notifikasi)
                <div class="alert bg-purple alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fas fa-exclamation-circle fa-fw"></i> Stok {{$notifikasi->data['nama_barang']}} Hampir Habis!
                    Jumlah stok tersisa {{$notifikasi->data['sisa_stok']}}. <a href="{{route('barang.show',$notifikasi->data['barang_id'])}}">Kunjungi Halaman</a>



                </div>


                @endforeach

            </div>

        </div>

    </div>
</div>
