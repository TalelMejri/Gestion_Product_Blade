<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->search)){
            $produits=Produit::with("user")->where('reference','like','%'.$request->search.'%')->paginate(4);
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
        $user=User::all();
        return view('Produits.create',['users'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {
        /*$request->validate(
            $this->validationsRules()
        );*/
      $image=Storage::disk('public')->put('produits',$request->file('image'));
       /*$produit=new Produit();
       $produit->reference=$request->reference;*/
       $produit=Produit::create([
          "reference"=>$request->reference,
          "designation"=>$request->designation,
          "prix"=>$request->prix,
          "quantite"=>$request->quantite,
          "photo"=>$image,
          "user_id"=>$request->user
       ]);
       return view("Produits.show",['produit'=>$produit]);
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
        $produit=Produit::with("user")->find($id);
        $users=User::all();
        return view('Produits.edit',['produit'=>$produit,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit=Produit::find($id);
        if($produit){
            if($request->hasFile('image')){
                $image=Storage::disk('public')->put('produits',$request->file('image'));
                $produit->photo=$image;
                $produit->save();
            }
            $produit->update([
                "reference"=>$request->reference,
                "designation"=>$request->designation,
                "prix"=>$request->prix,
                "quantite"=>$request->quantite,
                "user_id"=>$request->user
            ]);
            $produits=Produit::with("user")->get();
            return view('Produits.index',['produits'=>$produits,'message_sucess'=>'Updated with sucess']);
        }else{
            $produits=Produit::with("user")->get();
            return view('Produits.index',['produits'=>$produits,'message'=>'No product with id :'.$id]);
        }
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

    private function validationsRules(){
        return[
            "reference"=>"required|unique:users",
        ];
    }

}

