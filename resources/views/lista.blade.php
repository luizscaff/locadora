<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<h1 style="text-align:center">Lista de Veículos</h1>
<table class="table table-sm table-striped table-bordered">
    <thead >
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
<a class="btn btn-primary" role="button" href="inserirVeiculo">Adicionar novos veículos</a>
<a class="btn btn-primary" role="button" href="registrarAluguel">Registrar novo aluguel</a>
<a class="btn btn-primary" role="button" href="cadastroClientes">Cadastrar novo cliente</a>
<a class="btn btn-primary" role="button" href="fimAluguel">Redisponibilizar veículo</a>

</body>
</html>