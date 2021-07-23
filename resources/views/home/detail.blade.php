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
        @if (request()->get('result'))
            <h1 class="text-white">Sepatu yang paling cocok</h1>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $product->file }}" width="350px">
                        @if ($product->file2)
                            <img src="{{ $product->file2 }}" width="350px">
                        @endif
                        @if ($product->file3)
                            <img src="{{ $product->file3 }}" width="350px">
                        @endif
                        <h1 class="pt-3">{{ $product->name }}</h1>
                        <p style="white-space: pre-wrap;">{{ $product->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
