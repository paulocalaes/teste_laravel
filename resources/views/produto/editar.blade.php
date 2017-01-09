@extends('layout.principal')
@section('conteudo')			
<h1>Editar produto: {{$p->nome}}</h1>
<form action="/produtos/edita/{{$p->id}}" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$p->id}}">
	<div class="form-group">
		<label>Nome</label>
		<input name="nome" value="{{$p->nome}}" class="form-control">
	</div>
	<div class="form-group">
		<label>Descricao</label>
		<input name="descricao" value="{{$p->descricao}}" class="form-control">
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" value="{{$p->valor}}" class="form-control">
	</div>
	<div class="form-group">
		<label>Quantidade</label>
		<input name="quantidade" value="{{$p->quantidade}}" type="number" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@stop			
		