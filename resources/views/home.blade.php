@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Lista de Veículos</h1>
                <div class="panel-body">
<!--
                    @if(checkPermission(['user','admin','superadmin']))
                    <a href="{{ url('permissions-all-users') }}"><button>Access All Users</button></a>
                    @endif


                    @if(checkPermission(['admin','superadmin']))
                    <a href="{{ url('permissions-admin-superadmin') }}"><button>Access Admin and Superadmin</button></a>
                    @endif


                    @if(checkPermission(['superadmin']))
                    <a href="{{ url('permissions-superadmin') }}"><button>Access Only Superadmin</button></a>
                    @endif
-->
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>Assentos</th>
                                <th>Preço/dia</th>
                                <th>Disponibilidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carros as $carro)
                            <tr>
                                <td>{{$carro->modelo}}</td>
                                <td>{{$carro->placa}}</td>
                                <td>{{$carro->assentos}}</td>
                                <td>R$ {{$carro->preco}},00</td> 
                                @if($carro->disponivel == 1)
                                <td>Disponível</td>
                                @else    
                                <td class="table-danger">Indisponível</td>
                                @endif
                            </tr>        
                            @endforeach       
                        </tbody>
                    </table>
                    @if(checkPermission(['superadmin']))
                    <a class="btn btn-primary" role="button" href="addVeiculo">Adicionar novos veículos</a>
                    @endif
                    @if(checkPermission(['admin','superadmin']))
                    <a class="btn btn-primary" role="button" href="addAluguel">Registrar novo aluguel</a>
                    @endif
                    @if(checkPermission(['admin','superadmin']))
                    <a class="btn btn-primary" role="button" href="addCliente">Cadastrar novo cliente</a>
                    @endif
                    @if(checkPermission(['superadmin']))
                    <a class="btn btn-primary" role="button" href="desativarCliente">Desativar cliente</a>
                    @endif
                    @if(checkPermission(['admin','superadmin']))
                    <a class="btn btn-primary" role="button" href="retornarVeiculo">Redisponibilizar veículo</a>
                    @endif
                    @if(checkPermission(['superadmin']))
                    <a class="btn btn-primary" role="button" href="concederAcesso">Níveis de acesso</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection