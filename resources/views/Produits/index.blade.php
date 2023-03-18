
@extends("layouts.App")
@section("content")
<div class="container mt-5">
    <form action="/produits" method="get" class="d-flex gap-2">
        <input type="text" name="search" class="form-control w-50"  placeholder="Search ...">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>
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
            <td colspan="7" class="text-center bg-danger text-white">No data</td>
        </tr>
    </tbody>
    @else
    <tbody>
        @foreach ($produits as $prod )
      <tr>
            <td>{{$prod->id}}</td>
            <td>{{substr($prod->reference,0,15).'...'}}</td>
            <td>{{substr($prod->designation,0,15).'...'}}</td>
            <td>{{$prod->quantite}}</td>
            <td>{{$prod->prix}}</td>
            <td>{{$prod->user->name}}</td>
            <td>
                <a href="{{route('produits.show',$prod->id)}}"><button class="btn btn-primary">Show</button></a>
                <a href=""><button class="btn btn-warning">Edit</button></a>
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

@endsection
