@extends('template.dashboard')

@section('content')
   @forelse ($products as $product)
       <ul>
            <li>{{$product->id}}</li>
            <li>{{$product->title}}</li>
       </ul>
   @empty
       <h3>Nenhum produto encontrado</h3>
   @endforelse
   {{ $products->links() }}
@endsection