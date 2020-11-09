@extends('layouts.app')

@section('content')
    <div style="padding:3%;margin-top:5%; width: 100%;height:300px">
        <div style="text-align: center;width:100%;height:300px;border: 1px solid #adadad;border-radius:0.8em;background:#e6e6e6">
           <div style="text-align: center;padding:3%">
                 <h3>Confirme a exclusão do produto {{$product->name}}</h3>
                <a class="btn btn-danger" href="{{route('products.delete',$product->id)}}">Confirmar</a>
                <a class="btn btn-info" href="{{route('products.index')}}">voltar</a>
            </div>
        </div>
    </div>
@endsection
