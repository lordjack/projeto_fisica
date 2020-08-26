<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Pessoa;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
  public function listar(){

    $aluno = Aluno::get();

    return view('alunos')->with('alunos',$aluno);
  }


  public function cadastrar()
  {
    return view('alunoCadastrar');
  }

  public function salvar(Request $request, $id)
  {
    if ($id == 0){
    $aluno = new Aluno();
    $aluno->nome = $request->input('nome');
    $aluno->numero = $request->input('numero');
    $aluno->matricula = $request->input('matricula');
    $aluno->email = $request->input('email');
    $aluno->contato = $request->input('contato');
    $aluno->contato_responsaveis = $request->input('contato_responsaveis');
    $aluno->turma_id = $request->input('turma_id');

    $aluno->save();

    return redirect()->action('AlunoController@listar');
  }else {
    $aluno = Aluno::find($id);
    $aluno->nome = $request->input('nome');
    $aluno->numero = $request->input('numero');
    $aluno->matricula = $request->input('matricula');
    $aluno->email = $request->input('email');
    $aluno->contato = $request->input('contato');
    $aluno->contato_responsaveis = $request->input('contato_responsaveis');
    $aluno->turma_id = $request->input('turma_id');

    $aluno->save();

    return redirect()->action('AlunoController@listar');
  }
}
public function editar($id)
{
  $aluno = Aluno::find($id);

  return view('alunoEditar')->with('alunos',$aluno);
}

public function deletar($id)
{
  $aluno = Aluno::find($id);

  if (empty($aluno)) {
    return '<h2>Houve um problema ao consultar o ID informado</h2>';
  }
  $aluno->delete();

  return redirect()->action('AlunoController@listar');
}

}
