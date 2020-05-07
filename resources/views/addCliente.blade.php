@extends('layouts.app')
@if(checkPermission(['admin','superadmin']))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Cadastro de clientes</h1>
                <div class="panel-body">
                <form method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">Nome:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">CPF:</label>
                        <input type="number" name="cpf" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Telefone:</label>
                        <input type="number" name="telefone" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a class="btn btn-primary" role="button" href="home">Voltar</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 style="text-align:center">Você não tem permissão para acessar esta página.</h1>
@endif
@endsection