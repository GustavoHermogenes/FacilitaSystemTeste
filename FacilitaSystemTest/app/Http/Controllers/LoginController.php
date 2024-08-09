<?php

namespace App\Http\Controllers;

use App\Models\Examinador;
use App\Models\Login;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'senha' => 'required|string|min:6',
        ],[
            'email.required'         => 'O campo de email é obrigatório.',
            'email.email'            => 'Por favor, forneça um endereço de email válido.',
            'email.max'              => 'O campo de email não pode exceder 255 caracteres.',
            'senha.required'         => 'O campo de senha é obrigatório.',
            'senha.min'              => 'A senha deve ter pelo menos 6 caracteres.',
        ]);

        $email = $request->input('email');
        $senha = $request->input('senha');

        $usuario = Login::where('email', $email)->first();

        if(!$usuario){
            return back()->withErrors(['email' => 'O email informado não está cadastrado']);
        }
        if($usuario->senha != $senha){
            return back()->withErrors(['senha' => 'A senha informada está incorreta']);
        }

        $tipoUsuario = $usuario->tipo_usuario;

        session([
            'email' => $usuario->email,
        ]);

        if($tipoUsuario === 'usuario'){
            $usuario = Usuario::where('emailUsuario', $email)->first();
            session([
                'id' => $usuario->id,
                'nome' => $usuario->nomeUsuario,
                'sobrenome' => $usuario->sobrenomeUsuario,
                'email' => $usuario->emailUsuario,
            ]);
            return redirect()->route('dashboard.usuario');

        } elseif($tipoUsuario === 'examinador'){
            $examinador = Examinador::where('emailExaminador', $email)->first();
            // dd($examinador);
            session([
                'id' => $examinador->id,
                'nome' => $examinador->nomeExaminador,
                'sobrenome' => $examinador->sobrenomeExaminador,
                'email' => $examinador->emailExaminador,
            ]);
            return redirect()->route('dashboard.examinador');
        }
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function registro(Request $request)
    {
        $request->validate([
            'nome'          => 'required|string|max:50',
            'sobrenome'     => 'required|string|max:50',
            'email'         => 'required|email|max:255',
            'senha'         => 'required|string|min:6',
            'tipo_usuario'  => 'required|in:examinador,usuario'
        ], [
            'nome.required'          => 'O campo de nome é obrigatório.',
            'nome.max'               => 'O campo de nome não pode exceder 50 caracteres.',
            'sobrenome.required'     => 'O campo de sobrenome é obrigatório.',
            'sobrenome.string'       => 'O campo de sobrenome deve ser uma string.',
            'sobrenome.max'          => 'O campo de sobrenome não pode exceder 50 caracteres.',
            'email.required'         => 'O campo de email é obrigatório.',
            'email.email'            => 'Por favor, forneça um endereço de email válido.',
            'email.max'              => 'O campo de email não pode exceder 255 caracteres.',
            'senha.required'         => 'O campo de senha é obrigatório.',
            'senha.min'              => 'A senha deve ter pelo menos 6 caracteres.',
            'tipo_usuario.required'  => 'O campo de tipo de usuário é obrigatório.',
            'tipo_usuario.in'        => 'O tipo de usuário selecionado é inválido. Escolha entre "examinador" ou "usuario".'
        ]);

        $login = new Login();
        $login->nome = $request->input('nome');
        $login->sobrenome = $request->input('sobrenome');
        $login->email = $request->input('email');
        $login->senha = $request->input('senha');
        $login->tipo_usuario = $request->input('tipo_usuario');
        $login->status = 'ativo';
        $login->save();

        if ($request->input('tipo_usuario') === 'usuario') {
            $usuario = new Usuario();
            $usuario->nomeUsuario = $request->input('nome');
            $usuario->sobrenomeUsuario = $request->input('sobrenome');
            $usuario->emailUsuario = $request->input('email');
            $usuario->statusUsuario = 'ativo';
            $usuario->save();
        } elseif ($request->input('tipo_usuario') === 'examinador') {
            $examinador = new Examinador();
            $examinador->nomeExaminador = $request->input('nome');
            $examinador->sobrenomeExaminador = $request->input('sobrenome');
            $examinador->emailExaminador = $request->input('email');
            $examinador->statusExaminador = 'ativo';
            $examinador->save();
        }

        

        return redirect()->route('login');
    }
}
