@extends('layouts.admin')
@section('styles')
    <!-- DatePicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nueva Tarea</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.tasks.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="project_id" class="required">Proyecto</label>
                                        <select name="project_id" id="project_id" class="form-control select2"
                                            style="width: 100%;">
                                            <option value="">Seleccione un proyecto</option>
                                            @foreach ($projects as $id => $project)
                                                <option value="{{ $id }}"
                                                    {{ old('project_id') == $id ? 'selected' : '' }}>
                                                    {{ $project }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('project_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('project_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name" class="required">Tarea</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            placeholder="Ingrese la tarea" value="{{ old('name', '') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="deadline" class="required">Fecha de límite</label>
                                        <input type="text" name="deadline" id="deadline" class="form-control date"
                                            value="{{ old('deadline', '') }}">
                                        @if ($errors->has('deadline'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('deadline') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="required">Descripción de la tarea</label>
                                    <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">
                                    {{ old('description', '') }}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="user_id" class="required">Responsable</label>
                                        <select name="user_id" id="user_id" class="form-control select2" style="width: 100%; ">
                                            <option value="">Seleccione un usuario</option>
                                            @foreach ($users as $id => $user)
                                                <option value="{{ $id }}"
                                                    {{ old('user_id') == $id ? 'selected' : '' }}>
                                                    {{ $user }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="client_id" class="required">Cliente</label>
                                        <select name="client_id" id="client_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Seleccione un cliente</option>
                                            @foreach ($clients as $id => $client)
                                                <option value="{{ $id }}"
                                                    {{ old('client_id') == $id ? 'selected' : '' }}>
                                                    {{ $client }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('client_id'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('client_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status" class="required">Status de la tarea</label>
                                        <select name="status" id="status"
                                            class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                            style="width: 100%;" required>
                                            <option value="">Seleccione un status</option>
                                            @foreach (App\Models\Task::STATUS as $status)
                                                <option value="{{ $status }}"
                                                    {{ old('status') == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('admin.tasks.index') }}" class="btn btn-danger">
                                            <i class="fas fa-fw fa-lg fa-arrow-left"></i>
                                            Regresar
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('scripts')
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- FlatPicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(document).ready(function() {
            // Flatpicker
            flatpickr(".date", {
                "locale": "es"
            });
            // Select2
            $('.select2').select2({
                heigth: 'resolve'
            });
        });
    </script>
@endsection
