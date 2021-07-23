@extends(!$print ? 'layouts.app' : 'layouts.blank')

@section('template_title')
    Result
@endsection

@section('content')
    @if ($print)
        <style>
            * {
                font-family: sans-serif;
            }
        </style>
    @endif
    @if (!$print)
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Hasil</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="/webadmin"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="/webadmin/result">Hasil</a></li>
                                    {{-- <li class="breadcrumb-item active" aria-current="page">Result</li> --}}
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="?print=1" class="btn btn-secondary" target="_BLANK">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h3 class="mb-0">Matrik Awal</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" {{ $print ? 'border=1 cellpadding=10 cellspacing=0 style=margin-bottom:50px;' : '' }}>
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>
                                    <th scope="col" class="sort" data-sort="Name">Product</th>
                                    @foreach ($categories as $k => $c)
                                        <th scope="col" class="sort" data-sort="{{ $c->name }}">
                                            {{ $c->name }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="list">
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($results as $r)
                                    <tr>
                                        <td>{{ $k++ }}</td>
                                        <td>{{ $r['name'] }}</td>
                                        @foreach ($r['categories'] as $c)
                                            <td>{{ $c['name'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h3 class="mb-0">Matrik Kecocokan Alternatif Kriteria</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" {{ $print ? 'border=1 cellpadding=10 cellspacing=0 style=margin-bottom:50px;' : '' }}>
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>
                                    <th scope="col" class="sort" data-sort="Name">Product</th>
                                    @foreach ($categories as $k => $c)
                                        <th scope="col" class="sort" data-sort="{{ $c->name }}">
                                            {{ $c->name }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="list">
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($results as $r)
                                    <tr>
                                        <td>{{ $k++ }}</td>
                                        <td>{{ $r['name'] }}</td>
                                        @foreach ($r['categories'] as $c)
                                            <td>{{ $c['quality'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h3 class="mb-0">Matrik Normalisasi</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" {{ $print ? 'border=1 cellpadding=10 cellspacing=0 style=margin-bottom:50px;' : '' }}>
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>
                                    <th scope="col" class="sort" data-sort="Name">Product</th>
                                    @foreach ($categories as $k => $c)
                                        <th scope="col" class="sort" data-sort="{{ $c->name }}">
                                            {{ $c->name }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="list">
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($results as $r)
                                    <tr>
                                        <td>{{ $k++ }}</td>
                                        <td>{{ $r['name'] }}</td>
                                        @foreach ($r['categories'] as $c)
                                            <td>{{ $c['normaled_quality'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h3 class="mb-0">Perangkingan</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" {{ $print ? 'border=1 cellpadding=10 cellspacing=0 style=margin-bottom:50px;' : '' }}>
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>
                                    <th scope="col" class="sort" data-sort="Name">Product</th>
                                    <th scope="col" class="sort" data-sort="Value">Value</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($sortedResults as $r)
                                    <tr>
                                        <td>{{ $k++ }}</td>
                                        <td>{{ $r['name'] }}</td>
                                        <td>{{ $r['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($print)
        <script>
            window.print();
        </script>
    @endif
@endsection
