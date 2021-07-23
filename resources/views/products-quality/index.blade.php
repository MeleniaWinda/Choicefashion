@extends('layouts.app')

@section('template_title')
    Products Quality
@endsection

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h6 class="h2 text-white d-inline-block mb-0">Alternatif Produk</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/webadmin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/webadmin/products-qualities">Alternatif Produk</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Alternatif Produk</li>
                            </ol>
                        </nav>
                        <h6 class="h2 text-white d-inline-block mb-0">INFO : Input produk satu per satu sesuai dengan sub kriteria produk</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h3 class="mb-0">List {{ __('Alternatif Produk') }}</h3>
                        <a href="{{ route('products-qualities.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Create New') }}
                        </a>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>

                                    <th scope="col" class="sort" data-sort="Product">Produk</th>
                                    <th scope="col" class="sort" data-sort="Category">Kriteria</th>
                                    <th scope="col" class="sort" data-sort="Categories Sub">Sub Kriteria</th>
                                    <th scope="col" class="sort" data-sort="Quality">Bobot</th>

                                    <th width="1%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($productsQualities as $productsQuality)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $productsQuality->products->name }}</td>
                                        <td>{{ $productsQuality->categoriesSubs->categories->name }}</td>
                                        <td>{{ $productsQuality->categoriesSubs->name }}</td>
                                        <td>{{ $productsQuality->categoriesSubs->quality }}</td>

                                        <td>
                                            <form action="{{ route('products-qualities.destroy', $productsQuality->id) }}"
                                                method="POST">
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('products-qualities.show',$productsQuality->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('products-qualities.edit', $productsQuality->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-4 pb-3 d-flex justify-content-end pb-0">
                        {!! $productsQualities->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
