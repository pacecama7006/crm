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
                    <h1 class="m-0">Nuevo Tarea</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                                @csrf
                                @method('PUT')
                                {{-- form-row --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="project_id" class="required">Proyecto</label>
                                        <select name="project_id" id="project_id" class="form-control select2"
                                            style="width: 100%;">
                                            <option value="">Seleccione un proyecto</option>
                                            @foreach ($projects as $id => $project)
                                                <option value="{{ $id }}"
                                                    {{ (old('project_id') ? old('project_id') : $task->project->id ?? '') == $id ? 'selected' : '' }}>
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
                                            placeholder="Ingrese el nombre de la tarea" value="{{ old('name', $task->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="deadline" class="required">Fecha Límite</label>
                                        <input name="deadline" type="text" class="form-control date"
                                            value="{{ old('deadline', $task->deadline) }}">
                                    </div>
                                </div>
                                <!--Form-row -->

                                <div class="form-group">
                                    <label for="description" class="required">Descripción</label>
                                    <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- form-row --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="user_id" class="required">Responsable</label>
                                        <select name="user_id" id="user_id" class="form-control select2"
                                            style="width: 100%; ">
                                            <option value="">Seleccione un usuario</option>
                                            @foreach ($users as $id => $user)
                                            <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $task->user->id ?? '') == $id ? 'selected' : '' }}>
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
                                        <select name="client_id" id="client_id" class="form-control select2"
                                            style="width: 100%;">
                                            <option value="">Seleccione un cliente</option>
                                            @foreach ($clients as $id => $client)
                                                <option value="{{ $id }}"
                                                    {{ (old('client_id') ? old('client_id') : $task->client->id ?? '') == $id ? 'selected' : '' }}>
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
                                        <label for="task_status">Status del proyecto</label>
                                        <select class="form-control select2 {{ $errors->has('task_status') ? 'is-invalid' : '' }}"
                                            name="task_status" id="task_status" required>
                                            <option value="">Seleccione un status</option>
                                            @foreach (App\Models\Task::STATUS as $status)
                                            <option value="{{ $status }}" {{ (old('status') ? old('status') : $task->task_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="text-danger">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- form-row -->
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <a class="btn btn-danger" href="{{ route('admin.tasks.index') }}">
                                            <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                            Regresar
                                        </a>
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                "locale": "es",
                dateFormat: "d/m/Y",
            });
            // Select2
            $('.select2').select2({
                heigth: 'resolve'
            });
        });
    </script>
@endsection
