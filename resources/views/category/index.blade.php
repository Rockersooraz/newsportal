@extends('layout.app')

@section('main-section')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Latest News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sport News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<br>
<center> 
<div class="col-lg-6 col-lg-offset-6">

    <a class="btn btn-primary btn-lg" href="category/create" role="button">Add Categories</a><br><br>

<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($category as $cat)
       
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->title}}</td>
      <td><a href="{{route('category.edit',$cat->id)}}"><i class="fas fa-edit"></i></a></td>
      
 
 <td>
<form id="delete-form-{{$cat->id}}" method="post" action="{{route('category.destroy',$cat->id)}}" style="display: none;">
                      {{csrf_field()}}
                      {{method_field('Delete')}}
                    </form>

                    <a onclick="
                    if(confirm('You are about to delete'))
                      {
                        event.preventDefault(); document.getElementById('delete-form-{{$cat->id}}').submit();
                      }
                      else
                        {
                          event.preventDefault();
                        }">
                       <i class="fas fa-trash-alt"></i></a>
                
</td>

    </tr>
  </tbody>
    @endforeach
</table>
</div>
</center>



@endsection