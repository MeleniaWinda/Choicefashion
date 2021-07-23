@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/webadmin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/webadmin/users">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lists Admin</li>
                            </ol>
                        </nav>
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
                        <h3 class="mb-0">{{ __('Admin') }}</h3>
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Create New') }}
                        </a>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" width="1%">No</th>

                                    <th scope="col" class="sort" data-sort="Name">Nama</th>
                                    <th scope="col" class="sort" data-sort="Email">Email</th>

                                    <th width="1%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('users.edit', $user->id) }}"><i
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
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
