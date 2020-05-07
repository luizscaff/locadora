@extends('layouts.app')
@section('content')
@if(checkPermission(['admin','superadmin']))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Retornar veículo à garagem</h1>
                <div class="panel-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead >
                        <tr>
                            <th>Retornar</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Cliente</th>
                            <th>Disponibilidade</th>    
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($reservas) > 0)
                        @foreach($reservas as $reserva)
                        <tr>
                            <td><a href="retornarVeiculo/{{$reserva->id}}/{{$reserva->carro_id}}">Retornar à garagem</a></td>
                            <td>{{$reserva->carroReserva->modelo}}</td>
                            <td>{{$reserva->carroReserva->placa}}</td>
                            <td>{{$reserva->clienteReserva->nome}} - CPF {{$reserva->clienteReserva->cpf}}</td>
                            <td class="table-danger">Indisponível</td> 
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