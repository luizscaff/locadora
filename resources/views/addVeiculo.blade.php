@extends('layouts.app')
@section('content')
@if(checkPermission(['admin','superadmin']))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Adicionar novos veículos à frota</h1>
                <div class="panel-body">                 
                    <form method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email">Modelo:</label>
                            <input type="text" name="modelo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Placa:</label>
                            <input type="text" name="placa" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Preço:</label>
                            <input type="number" name="preco" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Número de assentos:</label>
                            <input type="number" name="assentos" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Adicionar</button>
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