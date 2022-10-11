<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Questao;
use Illuminate\Http\Request;

class AtividadeQuestaoController extends Controller
{

    public function storeAtividade(Request $request, $id)
    {
        try {
            $atividadeCadastrada = new Atividade();
            $atividadeCadastrada->descricao = $request->descricao_atividade;
            $atividadeCadastrada->descricao = $request->titulo_atividade;
            $atividadeCadastrada->save();

            $questao = Questao::find();
            // $atividadeCadastrada->questaoAtividades->attach()

            return redirect('/selecionar-questoes')->with('success', 'Atividade cadastrado com sucesso.');

        } catch (\Exception $ex) {
            // return $ex->getMessage();
            return redirect()->back()->with('erro', 'Ocorreu um erro, entre em contato com Adm.');
        }
    }

    public function selectQuestao()
    {
        try {
        //    $questoes = Questao::where('ativo', '=', 1)->get();
           return view('adm.atividade.listar-questoes');

        } catch (\Exception $ex) {
            // return $ex->getMessage();
            return redirect()->back()->with('erro', 'Ocorreu um erro, entre em contato com Adm.');
        }
    }
}