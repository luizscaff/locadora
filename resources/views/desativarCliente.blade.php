@extends('layouts.app')
@section('content')
@if(checkPermission(['superadmin']))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Desativar / Reativar clientes</h1>
                <div class="panel-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead >
                        <tr>
                            <th>Ativar/Desativar</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ativado</th>      
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($clientes) > 0)
                        @foreach($clientes as $cliente)
                        <tr>
                            @if($cliente->ativo == 1)
                            <td><a href="desativarClienteDo/{{$cliente->id}}">Desativar</a></td>
                            @else
                            <td><a href="desativarClienteDo/{{$cliente->id}}">Ativar</a></td>
                            @endif
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->cpf}}</td>
                            <td>{{$cliente->telefone}}</td>
                            @if($cliente->ativo == 1)
                            <td>Ativo</td>
                            @else
                            <td class="table-danger">Inativo</td> 
                            @endif
                        </tr>               
                        @endforeach
                        @else
                        <tr>
                            <td><h3>Não há veículos alugados</h3></td>
                        </tr>
                        @endif
                    </tbody>
                
                </table>
                <a class="btn btn-primary" role="button" href="home">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 style="text-align:center">Você não tem permissão para acessar esta página.</h1>
@endif
@endsection