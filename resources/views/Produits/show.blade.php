@extends('layouts.App')

@section('content')
<div class="container d-flex justify-content-center mx-5 mt-5">
<div class="card mb-3 " style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{Storage::URL($produit->photo)}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Reference :{{$produit->reference}}</h5>
          <p class="card-text">designation :{{$produit->designation}}</p>
          <p class="card-text">Quantite :{{$produit->quantite}}</p>
            <p class="card-text">Prix :{{$produit->prix}}</p>
            <p class="card-text">User Name :{{$produit->user->name}}</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
