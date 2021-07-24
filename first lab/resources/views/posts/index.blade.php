

@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-danger text-center">Laravel 8 CRUD Operation </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr class="text-primary text-center bg-dark">
            <th >Title</th>
            <th>Description</th>
            <th>created_at</th>
            <th >Action</th>
        </tr>
        
        @foreach ($posts as $post)
        <tr>
            
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->created_at }}</td>
           
            <td >
                 <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger show_confirm" onclick="ConfirmDelete(event)" >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
// alert("55")
function ConfirmDelete(event)

{
    // console.log(event)
  var x = confirm("Are you sure you want to delete?");
 
  if (x)
      {return true;}
  else{ event.preventDefault();}

}
</script>