{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Atualizar um Veículo</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" id="update-form" method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        {{-- o método de atualização é o PUT --}}
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $vehicle->name }}">
        <label for="Nome">Ano:</label>
        <input type="number" name="year" id="year" required value="{{ $vehicle->year }}">
        <label for="Nome">Cor:</label>
        <input type="text" name="color" id="color" required value="{{ $vehicle->color }}">
    </form>
    {{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    {{-- form para exclusão --}}
    <form method="POST" class="form" id="delete-form" action="{{ route('vehicles.destroy', $vehicle->id) }}">
        @csrf
        {{-- o método HTTP para exclusão deve ser o DELETE --}}
        @method('DELETE')
    </form>
@endsection