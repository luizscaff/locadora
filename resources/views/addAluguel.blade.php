@extends('layouts.app')
@section('content')
@if(checkPermission(['admin','superadmin']))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Registrar nova reserva</h1>
                <div class="panel-body">
                  <form method="POST" >
                  {{csrf_field()}}
                    <div class="form-group">
                      <label for="email">Veículo:</label>
                      <select name="modelo" class="form-control" required>
                        <option></option>
                        @foreach($carros as $carro)
                        @if($carro->disponivel == 1)
                        <option value="{{$carro->id}}">{{$carro->modelo}} - {{$carro->placa}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="email">Cliente:</label>
                      <select name="cliente" class="form-control" required>
                        <option></option>
                        @foreach($clientes as $cliente)
                        @if($cliente->ativo == 1)
                        <option value="{{$cliente->id}}">{{$cliente->nome}} - CPF {{$cliente->cpf}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label><input type="date" name="data_entrega" class="form-control" required>Data de início:</label>
                    </div>
                    <div class="form-group">
                      <label><input type="date" name="data_retorno" class="form-control" required>Data de retorno:</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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