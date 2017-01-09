<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{
	public function __construct(){
		//$this->middleware('nosso-middleware', //sequisermos usar noss middleware
		$this->middleware('auth',
			['only' => ['adiciona','remove']]
			);
	}
    public function lista(){
    	//$produtos = DB::select('select * from produtos');
    	$produtos = Produto::all();
		return view('produto.listagem')
			->with('produtos', $produtos);//chama view listagem e passa a variavel produtos
		//return view('listagem')->with('produtos',array()); testar array vazio
	}

	public function mostra($id){
		//$produto = DB::select('select * from produtos where id = ?', [$id]);
		$produto = Produto::find($id);
		//var_dump($produto->nome); //debug
		if(empty($produto)) {
			return "Esse produto não existe";
		}
    	return view('produto.detalhes')
    		->with('p',$produto);

	}
	public function novo(){
		return view('produto.formulario');
	}

	public function adiciona(ProdutosRequest $request){

		Produto::create($request->all());//le os parametros autorizados e salva no banco de dados
		return redirect()
			->action('ProdutoController@lista')
			->withInput(Request::only('nome'));
		//return view('produto.adicionado')->with('nome',$nome);
	}
	public function listaJson(){
		$produtos = Produto::all();
		return response()
			->json($produtos);
	}

	public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
		return redirect()
			->action('ProdutoController@lista');
	}

	public function editar($id){
		//$produto = DB::select('select * from produtos where id = ?', [$id]);
		$produto = Produto::find($id);
		//var_dump($produto->nome); //debug
		if(empty($produto)) {
			return "Esse produto não existe";
		}
    	return view('produto.editar')
    		->with('p',$produto);
	}
	public function edita($id){

		Produto::find($id)->update(Request::all());

		return redirect()
			->action('ProdutoController@lista')
			->withInput(Request::only('nome'));
	}
}
