@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('success'))
 		<div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px">
 			{{Session::get('success')}}
 		</div>
        <hr>
    @endif
    <table class="table">
        <div class="col-12" style="padding: 0.2%;margin:1%">
            <a class="btn btn-info" href="{{route('products.create')}}">Cadastrar</a>
        </div>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
       @forelse ($products as $product)
            <tbody>
                <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.edit',$product)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <a href="{{route('products.confirmDelete',$product->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>

       @empty
           <h3>Nenhum produto encontrado</h3>
       @endforelse
    </table>
    {{ $products->links() }}
</div>
@endsection
