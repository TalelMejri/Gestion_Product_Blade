@extends('layouts.App')

@section('content')
    <form action="{{route('produits.update',$produit->id)}}" class="shadow container mt-5 text-center" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        {{--<div class="alert alert-danger">
             @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>--}}
        <h1>Update Product</h1>
        <div class="row mb-2">
             <input type="hidden" name="id" value="<?=$produit->id?>">
            <div class="col-lg-6">
                <label for="">Reference</label>
                <input type="text" name="reference" class="form-control @error("reference") is-invalid
                @enderror" value="{{old('reference')??$produit->reference}}">
                @error("reference")
                   <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{old('designation')??$produit->designation}}">
                @error("designation")
                <small class="text-danger">{{$message}}</small>
             @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-6">
                <label for="">Quantite</label>
                <input type="number" name="quantite" class="form-control"  value="{{old('quantite')??$produit->quantite}}">
                @error("quantite")
                  <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="">Prix</label>
                <input type="text" name="prix" class="form-control" value="{{old('prix')??$produit->prix}}">
                @error("prix")
                  <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-6">
                <img width="400px" height="200px" src="{{Storage::url($produit->photo)}}" alt="">
                <br>
                <label for="">Photo</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="">User</label>
               <select name="user" class="form-control">
                    @foreach ($users as $user )
                        <option value="{{$user->id}}" @if  ($user->id == ( old('user_id')??$produit->user_id) ) ? selected : "" @endif >{{$user->name}}</option>
                    @endforeach
               </select>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-warning mb-2">Update</button>
        <a href="{{route('produits.index')}}"><button type="button"  class="btn btn-outline-secondary mb-2">retour</button></a>
    </form>
@endsection
