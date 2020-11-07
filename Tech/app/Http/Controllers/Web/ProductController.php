<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function store(Request $request){
        $requestData = $request->all();
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
        return view('productView.createEditProduct');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product){
        $product = Product::find($product->id);
        if($product->update($request->all()))
            return redirect()->route('products')->with(['success'=>"Produto editado com sucesso"]);
        else
            return redirect()->route("products.edit",['id' => $product->id])
            ->withErrors(['errors'=>'Falha ao editar'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){
        $product = $this->product->find($product->id);

        if($product->delete())
            return redirect()->route('products.index')->with(['success'=>"Produto deletado com sucesso"]);
        else
            return redirect()->route("products.edit",['id' => $product->id])
            ->withErrors(['errors'=>'Falha ao deletar'])
            ->withInput();
    }
}
