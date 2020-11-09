@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($product))
            <form action="{{route('products.update',$product)}}" method="POST" >
            {{ method_field('PUT') }}
        @else
            <form  action="{{route('products.store')}}" method="POST">
        @endif
                @csrf
                <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" value="{{$product->name ?? ''}}" name="name" id="nome" aria-describedby="emailHelp" placeholder="Nome do produto">
                </div>

                <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" value="{{$product->description ?? ''}}" name="description" id="description" placeholder="Breve descrição do produto">
                </div>

                <div class="form-group">
                    <label for="price">Valor</label>
                    <input class="form-control" type="number" value="{{$product->price ?? ''}}" step="0.01" name="price" min="0.01">
                </div>
            @if(!isset($product))
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{route('products.index')}}" class="btn btn-info">Voltar</a>
            @else
                <button type="submit" class="btn btn-primary">Editar</button>
                <a class="btn btn-danger" href="{{route('products.confirmDelete',$product->id)}}">Deletar</a>
                <a href="{{route('products.index')}}" class="btn btn-info">Voltar</a>
            @endif
            </form>
    </div>
@endsection
