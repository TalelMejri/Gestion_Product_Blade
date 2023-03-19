
@extends("layouts.App")
@section("content")
<div class="container-fluid mt-5 row text-center">
    <form action="/produits" method="get" class="d-flex gap-2 text-center col-lg-6">
        <input type="text" name="search" class="form-control w-50"  placeholder="Search ...">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>
    <span class="col-lg-6">
         <a href="{{url('produits/create')}}"><button class="btn btn-primary">Add Product</button></a>
    </span>
</div>
<div class="container w-50 mt-2">
    @if (isset($message_sucess))
        <div class="alert alert-success">
             <?=$message_sucess?>
        </div>
    @endif
    @if (isset($message))
    <div class="alert alert-danger w-50">
        <?=$message?>
    </div>
   @endif
</div>
<table class="table container mt-2">
    <thead class="table-dark">
       <th>
          #
       </th>
        <th>
          Photo
       </th>
       <th>
         Reference
       </th>
       <th>
        Designation
      </th>
      <th>
        Quantite
      </th>
      <th>
        Prix
      </th>
      <th>
        Name User
      </th>
      <th>
       Operation
      </th>
    </thead>
    @if (count($produits)==0)
    <tbody>
        <tr>
            <td colspan="8" class="text-center bg-danger text-white">No data</td>
        </tr>
    </tbody>
    @else
    <tbody>
        @foreach ($produits as $prod )
      <tr>
            <td>{{$prod->id}}</td>
            <td><img  width="100px" height="100px" src="{{Storage::URL($prod->photo)}}"></td>
            <td>{{substr($prod->reference,0,15).'...'}}</td>
            <td>{{substr($prod->designation,0,15).'...'}}</td>
            <td>{{$prod->quantite}}</td>
            <td>{{$prod->prix}}</td>
            <td>{{$prod->user->name}}</td>
            <td>
                <a href="{{route('produits.show',$prod->id)}}"><button class="btn btn-primary">Show</button></a>
                <a href="{{route('findbyId',$prod->id)}}"><button class="btn btn-warning">Edit</button></a>
                 <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$prod->id}}">Delete</button>

  <div class="modal fade" id="staticBackdrop{{$prod->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Confirme Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{$prod->reference}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{route('produits.destroy',$prod->id)}}" method="POST">
             @csrf
             @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
            </td>
      </tr>

      @endforeach
    </tbody>
    @endif
  </table>
  {{-- <div style="height: 18px" class=" text-center mt-4   d-inline">
       <p > {{$produits->links()}}</p>
  </div> --}}
  {{-- <div class="row">
    <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li>
          @for ($num=1  ; $num<=(ceil($produits->perPage() ?  $produits->total()/$produits->perPage() : 1));$num++ )
          <li  class="page-item @if ($num==$produits->currentPage()) ? active : '' @endif" aria-current="page">
            <a class="page-link" href="#">{{$num}}</a>
          </li>
          @endfor
          <li class="page-item">
            <a class="page-link" href="">Next</a>
          </li>
        </ul>
      </nav>
        {{echo explode($produits->nextPageUrl(),"=")}}
        {{$produits->previousPageUrl()}} --}}
 </div>

@endsection
