<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">Item Terlaris</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    @foreach ($informasi['produk_terlaris'] as $produk_terlaris)
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-img">
                        <!--<img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50"><-->
                    </div>
                    <div class="product-info">
                        <a href="{{ route('barang.show', $produk_terlaris->id) }}"
                            class="product-title">{{ $produk_terlaris->nama_produk }}
                            <span class="badge badge-primary float-right">{{ $produk_terlaris->total }}</span></a>
                        <span class="product-description">
                            {{ $produk_terlaris->nama_pemasok }}
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    @endforeach



    <div class="card-footer text-center">
        <a href="{{ route('barang.index') }}" class="uppercase">Lihat Semua Item</a>
    </div>

</div>
