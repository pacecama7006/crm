@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proyectos</h1>
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
                                Listado de Proyectos
                            </h5>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Nuevo proyecto</a>
                            <table id="projects_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Proyecto</th>
                                        <th>Descripción</th>
                                        <th>Fecha límite</th>
                                        <th>Status</th>
                                        <th>Responsable</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>{{ $project->user->name }}</td>
                                            <td>{{ $project->client->contact_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}" id="delete_form" method="post" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')" style="display: inline-block">
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
            $('#projects_table').DataTable();
        });
    </script>
@endsection
