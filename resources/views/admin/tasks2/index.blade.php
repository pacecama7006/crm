@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tareas</h1>
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
                                Listado de Tareas
                            </h5>
                            <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">Nueva tarea</a>
                            <table id="tasks_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Proyecto</th>
                                        <th>Tarea</th>
                                        <th>Descripción</th>
                                        <th>Fecha límite</th>
                                        <th>Status</th>
                                        <th>Responsable</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->project->name }}</td>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->deadline }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->client->contact_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-success">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('admin.tasks.destroy', $task->id) }}" id="delete_form" method="post" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')" style="display: inline-block">
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
            $('#tasks_table').DataTable();
        });
    </script>
@endsection
