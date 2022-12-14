@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="display-10" style="text-align: center" >Halaman Mengenai Applikasi</h1>
@stop


@section('content')

<div class="card">
    <h5 class="card-header">About Application</h5>
    <div class="card-body">
      <p class="card-text">Elektronik Supply Chain Management atau E-SCM adalah sebuah applikasi
            yang digunakan untuk mengelola dan mengawasi rantai siklus
            aliran arus produk dari pemasok ke produsen hingga ke konsumen akhir.
            Tujuan dari supply chain management adalah untuk meningkatkan efisiensi
            dan mengurangi biaya dengan cara mengelola dan mengoptimalkan supply dan
            emand secara efektif. Applikasi E-SCM menggabungkan informasi terdistribusi,
            sistem informasi bisnis, dan jaringan komputer untuk menghubungkan semua anggota rantai pasokan.
      </p>
      <a href="#" class="btn btn-primary">Download User Manual</a>
    </div>
</div>


        <!-- Default box -->

        <div class="card card-solid">
            <div class="card-body pb-0">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">About Developer</h3>
                </div>
              <div class="row">

              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Team Leader
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>Hernando Diopalma</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Full-stack Developer </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bookmark"></i></span> Jurusan : Teknik Elektro</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Asal Daerah: Cilengsih</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src={{url('/img/kucing.jpg')}} alt="user-avatar" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                      </a>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Anggota
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Abdul Majid Refindo</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Back End Developer </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bookmark"></i></span> Jurusan : Teknik Elektro</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Asal Daerah: Kota Tangerang</li>
                        </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src={{url('/img/kucing.jpg')}} alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col
                -sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Anggota
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Ivan Munandar Purnama</b></h2>
                          <p class="text-muted
                            text-sm"><b>About: </b> Front End Developer </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bookmark"></i></span> Jurusan : Teknik Elektro</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Asal Daerah: Kota Tangerang</li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src={{url('/img/kucing.jpg')}} alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                          <a href="#" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Profile
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col
                  -sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                          Anggota
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b>Ismail Bintang</b></h2>
                            <p class="text-muted
                              text-sm"><b>About: </b> Front End Developer </p>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bookmark"></i></span> Jurusan : Teknik Elektro</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Asal Daerah: Kota Tangerang</li>
                              </ul>
                          </div>
                          <div class="col-5 text-center">
                            <img src={{url('/img/kucing.jpg')}} alt="user-avatar" class="img-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal">
                              <i class="fas fa-comments"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                              <i class="fas fa-user"></i> View Profile
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
