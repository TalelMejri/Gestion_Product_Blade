@extends('layouts.App')

@section('content')
    <form action="{{route('produits.store')}}" class="shadow container mt-5 text-center" method="post" enctype="multipart/form-data">
      @csrf
        {{--<div class="alert alert-danger">
             @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>--}}
        <h1>Add Product</h1>
        <div class="row mb-2">
            <div class="col-lg-6">
                <label for="">Reference</label>
                <input type="text" name="reference" class="form-control @error("reference") is-invalid
                @enderror" value="{{old('reference')}}">
                @error("reference")
                   <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="">Designation</label>
                <input type="text" name="designation" class="form-control">
                @error("designation")
                <small class="text-danger">{{$message}}</small>
             @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-6">
                <label for="">Quantite</label>
                <input type="number" name="quantite" class="form-control">
                @error("quantite")
                <small class="text-danger">{{$message}}</small>
             @enderror
            </div>
            <div class="col-lg-6">
                <label for="">Prix</label>
                <input type="text" name="prix" class="form-control">
                @error("prix")
                <small class="text-danger">{{$message}}</small>
             @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-6">
                <label for="">Photo</label>
                <input type="file" name="image" class="form-control">
                @error("photo")
                <small class="text-danger">{{$message}}</small>
             @enderror
            </div>
            <div class="col-lg-6">
                <label for="">User</label>
               <select name="user" class="form-control">
                    @foreach ($users as $user )
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
               </select>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success mb-2">Add</button>
        <a href="{{route('produits.index')}}"><button type="button"  class="btn btn-outline-secondary mb-2">retour</button></a>
    </form>
@endsection
