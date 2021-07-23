@extends('layouts.home')

@section('template_title')
    Home
@endsection

@section('content')
    <style>
        .bg-default {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        }

    </style>
    <div class="container">
        @if (count($sortedResults) > 0)
            <h1 class="text-white">Produk Paling Cocok</h1>
            <div class="row">
                @foreach ($sortedResults as $k => $p)
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
                @endforeach
            </div>
        @else
            <h1 class="text-white">Silahkan pilih satu jawaban dari setiap kategori</h1>
            <form method="POST" action="{{ route('home.chose') }}" role="form">
                @csrf
                <div class="row">
                    @foreach ($categories as $c)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pb-3">{{ $c->question }}</div>
                                    @foreach ($c->categoriesSubs as $cc)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="answer[{{ $c->id }}]"
                                                    value="{{ $cc->id }}" required>{{ $cc->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <button class="btn btn-success btn-block">Selesai</button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
