@extends('layouts.home')

@section('template_title')
    Home
@endsection

@section('content')
    <style>
        .bg-default {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        }

        .carousel-inner img {
            width: 100%;
            /* height: 100%; */
        }
    </style>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/img/banner/12.jpg" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/banner/2.jpg" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/banner/3.jpg" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center pb-3">
                <a href="{{ route('home.chose') }}" class="btn btn-secondary">Binggung memilih sepatu?, klik disini</a>
            </div>
        </div>
        <h1 class="text-white">Produk Terbaik Kami</h1>
        <div class="row">
            @foreach ($sortedResults as $k => $p)
                @if ($k < 4)
                    <div class="col-3">
                        <a href="{{ route('home.detail', $p['id']) }}">
                            <div class="card">
                                <div style="position: absolute;background: black;">
                                    <span class="p-3 text-white">{{ $k + 1 }}</span>
                                </div>
                                <div class="card-body oc">
                                    <img src="{{ $p['file'] }}" width="100%">
                                    <div class="overlay">{{ $p['name'] }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <h1 class="text-white">Produk</h1>
        <div class="row">
            <div class="col-12 pb-3">
                <input type="search" class="form-control" placeholder="Cari barang ..." id="search">
            </div>
        </div>
        <div class="row search-box">
            @foreach ($products as $p)
                <div class="col-3 search-area">
                    <a href="{{ route('home.detail', $p->id) }}">
                        <div class="d-none">
                            {{ $p->name }}
                        </div>
                        <div class="card">
                            <div class="card-body oc">
                                <img src="{{ $p->file }}" width="100%" >
                                <div class="overlay">{{ $p->name }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".search-box .search-area").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
