<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carros;
use App\Reservas;
use App\Clientes;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

    public function allUsers()
    {
        dd('Access All Users');
    }

    public function adminSuperadmin()
    {
        dd('Access Admin and Superadmin');
    }

    public function superadmin()
    {
        dd('Access only Superadmin');
    }

    public function lista() {
        $carros = Carros::all();
        $clientes = Clientes::all();
        $reservas = Reservas::with('carroReserva')->get();

        return view('home', compact('carros', 'reservas', 'clientes'));
    }

    public function addVeiculo() {
        return view('addVeiculo');
    }

    public function addVeiculoDo(Request $req) {
        if ($req->has('modelo') && $req->has('placa') && $req->has('preco') &&  $req->has('assentos')) {
            $modelo = $req->input('modelo');
            $placa = $req->input('placa');
            $preco = $req->input('preco');
            $assentos = $req->input('assentos');

            $carro = new Carros;
            $carro->modelo = $modelo;
            $carro->placa = $placa;
            $carro->preco = $preco;
            $carro->assentos = $assentos;
            $carro->save();

        } 
        return redirect('/');
    }
    public function addAluguel() {
        $carros = Carros::all();
        $isDisponivel = $carros->where('disponivel', 1);

        $clientes = Clientes::all();
        $isAtivo = $clientes->where('ativo', 1);

        $reservas = Reservas::with('carroReserva')->get();

        return view('addAluguel', compact('carros', 'reservas', 'clientes', 'isDisponivel', 'isAtivo'));
    }
    public function addAluguelDo(Request $req) {
        if ($req->has('modelo') && $req->has('cliente') && $req->has('data_entrega') && $req->has('data_retorno')) {
            $carro_id = $req->input('modelo');
            $cliente_id = $req->input('cliente');
            $data_inicio = $req->input('data_entrega');
            $data_fim = $req->input('data_retorno');

            $reserva = new Reservas;
            $reserva->carro_id = $carro_id;
            $reserva->cliente_id = $cliente_id;
            $reserva->data_inicio = $data_inicio;
            $reserva->data_fim = $data_fim;
 
            $reserva->save();

            $carro = new Carros;
            $carro = Carros::where('id', $carro_id)->first();
            $carro->disponivel= 0;
            $carro->update();
            
        }
        return redirect('/');
    }

    public function addCliente() {
        return view('addCliente');
    }

    public function addClienteDo(Request $req) {
        if ($req->has('nome') && $req->has('cpf') && $req->has('telefone')) {
            $nome = $req->input('nome');
            $cpf = $req->input('cpf');
            $telefone = $req->input('telefone');
            
            $cliente = new Clientes;
            $cliente->nome = $nome;
            $cliente->cpf = $cpf;
            $cliente->telefone = $telefone;

            $cliente->save();
        }
        return redirect('/');
    }

    public function retornarVeiculo() {
        $carros = Carros::all();
        $clientes = Clientes::all();
        
        $reservas = Reservas::with('carroReserva', 'clienteReserva')->get();

        return view('retornarVeiculo', compact('carros', 'reservas', 'clientes')); 
    }

    public function retornarVeiculoDo($id, $carro_id) {
        Reservas::find($id)->delete();
 
        $carro = new Carros;
        $carro = Carros::where('id', $carro_id)->first();
        $carro->disponivel= 1;
        $carro->update();

        return redirect('/');
    }

    public function desativarCliente() {
        $clientes = Clientes::all();
        $arrayClientes = array('clientes'=>$clientes);
        return view('desativarCliente', $arrayClientes);
    }

    public function desativarClienteDo($id) {       
        $cliente = Clientes::where('id', $id)->first();

        if ($cliente->ativo == 1) {
            $cliente->ativo = 0;
            $cliente->update();
        } else {
            $cliente->ativo = 1;
            $cliente->update();  
        }

        return redirect('/');
    }

    public function concederAcesso() {
        $usuarios = User::all();
        $arrayUsuarios = array('users'=>$usuarios);
        return view('concederAcesso', $arrayUsuarios);
    }

    public function concederAcessoDo(Request $req) {
        $id = $req->input('usuario');
        $nivel = $req->input('nivel');
        $user = new User;
        $user = User::where('id', $id)->first();

        if ($nivel == "0") {
            $user->is_permission = 0;
            $user->update();
        } else if ($nivel == "1") {
            $user->is_permission = 1;
            $user->update(); 
        } else {
            $user->is_permission = 2;
            $user->update();
        }

        return redirect('/');
    }
}
