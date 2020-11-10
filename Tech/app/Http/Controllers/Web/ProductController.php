<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\CreateEditFormRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $paginate = 10;
    public function index(){
        $products = Product::OrderBy("id","DESC")->paginate(10);
        return view('productView.indexProduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('productView.createEditProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEditFormRequest $request){
        $requestData = $request->all();
        if( auth()->user()->products()->create($requestData))
            return redirect()->route('products.index')->with(['success'=>"Produto cadastro com sucesso"]);
        else
            return redirect()->route("products.confirmDelete",['id' => $product->id])
            ->withErrors(['errors'=>'Falha ao deletar produto'])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product){
        return view('productView.showProduct');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product){
        $product = Product::find($product->id);
        return view('productView.createEditProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEditFormRequest $request, Product $product){
        $product = Product::find($product->id);
        if($product->update($request->all()))
            return redirect()->route('products.index')->with(['success'=>"Produto editado com sucesso"]);
        else
            return redirect()->route("products.edit",['id' => $product->id])
            ->withErrors(['errors'=>'Falha ao editar'])
            ->withInput();
    }

    public function confirmDeleteProduct($id){
        $product = Product::find($id);
        return view('productView.confirmDelete',compact('product'));
    }

    public function delete($id){
        $product = Product::find($id);

        if($product->delete())
            return redirect()->route('products.index')->with(['success'=>"Produto deletado com sucesso"]);
        else
            return redirect()->route("products.edit",['id' => $product->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){

    }
}
