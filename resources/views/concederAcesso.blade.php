@extends('layouts.app')
@section('content')
@if(checkPermission(['superadmin']))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 style="text-align:center">Conceder Acesso</h1>
                <div class="panel-body">
                  <form method="POST" >
                  {{csrf_field()}}
                    <div class="form-group">
                      <label for="usuario">Usuário:</label>
                      <select name="usuario" class="form-control" required>
                        <option></option>
                        @foreach($users as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->name}} - {{$usuario->email}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nivel">Nível de acesso:</label><br/>
                      <input type="radio" name="nivel" value="0">Usuário comum<br/>
                      <input type="radio" name="nivel" value="1">Admin<br/>
                      <input type="radio" name="nivel" value="2">Super Admin<br/>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <a class="btn btn-primary" role="button" href="home">Voltar</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 style="text-align:center">Você não tem autorização para acessar esta página.</h1>
@endif
@endsection