@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clientes</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="cardt-title">
                                Listado de Clientes
                            </h5>
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-3">Nuevo cliente</a>
                            <table id="client_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Nombre de la empresa</th>
                                        <th>Dirección empresa</th>
                                        <th>Teléfono empresa</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->contact_name }}</td>
                                            <td>{{ $client->contact_phone_number }}</td>
                                            <td>{{ $client->contact_email }}</td>
                                            <td>{{ $client->company_name }}</td>
                                            <td>{{ $client->company_adress }}</td>
                                            <td>{{ $client->company_phone_number }}</td>
                                            <td>
                                                <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-success">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('admin.clients.destroy', $client->id) }}" id="delete_form" method="post" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')" style="display: inline-block">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#client_table').DataTable();
        });
    </script>
@endsection
