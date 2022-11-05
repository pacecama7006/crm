@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Cliente</h1>
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
                        <form action="{{ route('admin.clients.update', $client->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="contact_name" class="required">Nombre del contacto</label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" placeholder="Ingrese el nombre del contacto" value="{{ old('contact_name', $client->contact_name) }}">
                                @if ($errors->has('contact_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact_phone_number" class="required">Teléfono del contacto</label>
                                <input type="text" name="contact_phone_number" id="contact_phone_number" class="form-control {{ $errors->has('contact_phone_number') ? 'is-invalid' : '' }}" placeholder="Ingrese el nombre del contacto" value="{{ old('contact_phone_number', $client->contact_phone_number) }}">
                                @if ($errors->has('contact_phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contact_email" class="required">Email del contacto</label>
                                <input type="email" name="contact_email" id="contact_email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" placeholder="Ingrese el email del contacto" value="{{ old('contact_email', $client->contact_email) }}">
                                @if ($errors->has('contact_email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contact_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="company_name" class="required">Nombre de la compañía</label>
                                <input type="text" name="company_name" id="company_name" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" placeholder="Ingrese el nombre de la empresa" value="{{ old('company_name', $client->company_name) }}">
                                @if ($errors->has('company_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company_phone_number" class="required">Teléfono de la compañía</label>
                                <input type="text" name="company_phone_number" id="company_phone_number" class="form-control {{ $errors->has('company_phone_number') ? 'is-invalid' : '' }}" placeholder="Ingrese el teléfono de la empresa" value="{{ old('company_phone_number', $client->company_phone_number) }}">
                                @if ($errors->has('company_phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('company_phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_adress" class="required">Dirección de la compañía</label>
                            <input type="text" name="company_adress" id="company_adress" class="form-control {{ $errors->has('company_adress') ? 'is-invalid' : '' }}" placeholder="Ingrese la dirección de la empresa" value="{{ old('company_adress', $client->company_adress) }}">
                            @if ($errors->has('company_adress'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('company_adress') }}</strong>
                            </span>
                            @endif
                        </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin.clients.index') }}" class="btn btn-danger">
                                        <i class="fas fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                        Editar
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
