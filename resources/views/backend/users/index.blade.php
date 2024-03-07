@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <a href="{{ route('user.create') }}" class="btn btn-block btn-primary">Adicionar Usuário</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="{{ route('user.edit', $user) }}" type="button" class="btn btn-info btn-flat">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button href="#" class="btn btn-danger btn-flat delete-user" data-method="delete" data-user-id="{{ $user->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este usuário?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger confirm-delete">Excluir</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#success-alert').fadeOut('slow');
            }, 3000); // Tempo em milissegundos (3 segundos neste exemplo)
        });
        $('.delete-user').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            var url = "{{ route('user.delete', ['user' => ':user']) }}";
            $('#deleteConfirmationModal').modal('show');
            $('.confirm-delete').attr('href', url.replace(":user", userId));
        });
    </script>
@endsection