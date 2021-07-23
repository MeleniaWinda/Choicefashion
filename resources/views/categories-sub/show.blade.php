@extends('layouts.app')

@section('template_title')
    {{ $categoriesSub->name ?? 'Show Categories Sub' }}
@endsection

@section('content')
    <section class="content container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categories Sub</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories-subs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $categoriesSub->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $categoriesSub->name }}
                        </div>
                        <div class="form-group">
                            <strong>Quality:</strong>
                            {{ $categoriesSub->quality }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
