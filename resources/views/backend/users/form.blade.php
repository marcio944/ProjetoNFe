@extends('adminlte::page')

@if (is_null($user))
    @section('title', 'Cadastrar Usuário')
    @section('content_header')
        <h1 class="m-0 text-dark">Cadastrar Usuário</h1>
    @stop
@else
    @section('title', 'Editar Usuário')
    @section('content_header')
        <h1 class="m-0 text-dark">Editar Usuário</h1>
    @stop
@endif

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulário de Cadastro de Usuário</h3>
                    </div>
                    @if( is_null($user) )
                        {!! Form::open(['route' => 'user.store', 'method' => 'post', 'id' => 'form-user']) !!}
                    @else
                        {!! Form::open(['route' => ['user.update', $user], 'method' => 'put', 'id' => 'form-user-update']) !!}
                    @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        {!! Form::label('name', __('adminlte::adminlte.full_name')) !!}
                                        <div class="input-group">
                                            {!! Form::text('name', $user ? $user->name : null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('adminlte::adminlte.full_name')]) !!}
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        {!! Form::label('email', __('adminlte::adminlte.email')) !!}
                                        <div class="input-group">
                                            {!! Form::email('email', $user ? $user->email : null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('adminlte::adminlte.email')]) !!}
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        {!! Form::label('password', __('adminlte::adminlte.password')) !!}
                                        <div class="input-group">
                                            {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => __('adminlte::adminlte.password')]) !!}
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        {!! Form::label('retype_password', __('adminlte::adminlte.retype_password')) !!}
                                        <div class="input-group">
                                            {!! Form::password('retype_password', ['class' => 'form-control' . ($errors->has('retype_password') ? ' is-invalid' : ''), 'placeholder' => __('adminlte::adminlte.retype_password')]) !!}
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('retype_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if( is_null($user) )
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            @else
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            @endif
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@stop