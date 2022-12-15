<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});

// Home > Pelanggan
Breadcrumbs::for('pelanggan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pelanggan', route('pelanggan.index'));
});

// Home > Pelanggan > [Pelanggan]
Breadcrumbs::for('pelanggan.show', function (BreadcrumbTrail $trail, $pelanggan) {
    $trail->parent('pelanggan');
    $trail->push($pelanggan->nama_pelanggan, route('pelanggan.show', $pelanggan));
});

// Home > Pemasok
Breadcrumbs::for('pemasok', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pemasok', route('pemasok.index'));
});

// Home > Pemasok > [Pemasok]
Breadcrumbs::for('pemasok.show', function (BreadcrumbTrail $trail, $pemasok) {
    $trail->parent('pemasok');
    $trail->push($pemasok->nama_pemasok, route('pemasok.show', $pemasok));
});

// Home > Produk
Breadcrumbs::for('produk', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Produk', route('produk.index'));
});

// Home > Produk > [Produk]
Breadcrumbs::for('produk.show', function (BreadcrumbTrail $trail, $produk) {
    $trail->parent('produk');
    $trail->push($produk->nama_produk, route('produk.show', $produk));
});

// Home > Kategori
Breadcrumbs::for('kategori', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kategori', route('kategori.index'));
});

// Home > Kategori > [Kategori]
Breadcrumbs::for('kategori.show', function (BreadcrumbTrail $trail, $kategori) {
    $trail->parent('kategori');
    $trail->push($kategori->nama_kategori, route('kategori.show', $kategori));
});

// Home > Merek
Breadcrumbs::for('merek', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Merek', route('merek.index'));
});

// Home > Merek > [Merek]
Breadcrumbs::for('merek.show', function (BreadcrumbTrail $trail, $merek) {
    $trail->parent('merek');
    $trail->push($merek->nama_merek, route('merek.show', $merek));
});

// Home > Barang
Breadcrumbs::for('barang', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Barang', route('barang.index'));
});

// Home > Barang > [Barang]
Breadcrumbs::for('barang.show', function (BreadcrumbTrail $trail, $barang) {
    $trail->parent('barang');
    $trail->push($barang->nama_produk, route('barang.show', $barang));
});

// Home > Barang > [Barang] > Edit
Breadcrumbs::for('barang.edit', function (BreadcrumbTrail $trail, $barang) {
    $trail->parent('barang.show', $barang);
    $trail->push('Edit', route('barang.edit', $barang));
});

// Home > Transaksi Pemasok
Breadcrumbs::for('transaksiPemasok', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Transaksi Pemasok', route('transaksiPemasok.index'));
});

// Home > Transaksi Pemasok > [Nama Pemasok]
Breadcrumbs::for('transaksiPemasok.show', function (BreadcrumbTrail $trail, $transaksiPemasok) {
    $trail->parent('transaksiPemasok');
    $trail->push($transaksiPemasok->pemasok->nama_pemasok, route('transaksiPemasok.show', $transaksiPemasok));
});

// Home > Transaksi Pemasok > [Nama Pemasok] > Edit
Breadcrumbs::for('transaksiPemasok.edit', function (BreadcrumbTrail $trail, $transaksiPemasok) {
    $trail->parent('transaksiPemasok.show', $transaksiPemasok);
    $trail->push('Edit', route('transaksiPemasok.edit', $transaksiPemasok));
});

// Home > Transaksi Pelanggan
Breadcrumbs::for('transaksiPelanggan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Transaksi Pelanggan', route('transaksiPelanggan.index'));
});

// Home > Transaksi Pelanggan > [Nama Pelanggan]
Breadcrumbs::for('transaksiPelanggan.show', function (BreadcrumbTrail $trail, $transaksiPelanggan) {
    $trail->parent('transaksiPelanggan');
    $trail->push($transaksiPelanggan->pelanggan->nama_pelanggan, route('transaksiPelanggan.show', $transaksiPelanggan));
});

// Home > Transaksi Pelanggan > [Nama Pelanggan] > Edit
Breadcrumbs::for('transaksiPelanggan.edit', function (BreadcrumbTrail $trail, $transaksiPelanggan) {
    $trail->parent('transaksiPelanggan.show', $transaksiPelanggan);
    $trail->push('Edit', route('transaksiPelanggan.edit', $transaksiPelanggan));
});





