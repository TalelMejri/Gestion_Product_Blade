<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->search)){
            $produits=Produit::with("user")->where('reference','like','%'.$request->search.'%')->get();
        }else{
            $produits=Produit::with("user")->get();
        }
        return view('Produits.index',['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit=Produit::with("user")->find($id);
        if($produit){
            return view('Produits.show',['produit'=>$produit]);
        }else{
            $produits=Produit::with("user")->get();
            return view('Produits.index',['produits'=>$produits,'message'=>'No product with id :'.$id]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=Produit::find($id)->with("user");
        return view('Produits.edit',['produits'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit=Produit::find($id);
        if($produit){
            $produit->delete();
            $produits=Produit::with("user")->get();
            return view('Produits.index',['produits'=>$produits,'message_sucess'=>'Delete with sucess']);
        }else{
            $produits=Produit::with("user")->get();
            return view('Produits.index',['produits'=>$produits,'message'=>'No product with id :'.$id]);
        }
    }
}
