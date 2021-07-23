@extends('layouts.app')

@section('template_title')
    {{ $productsQuality->name ?? 'Show Products Quality' }}
@endsection

@section('content')
    <section class="content container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Products Quality</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products-qualities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productsQuality->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categories Sub Id:</strong>
                            {{ $productsQuality->categories_sub_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
