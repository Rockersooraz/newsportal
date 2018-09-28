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

    <a class="btn btn-primary btn-lg" href="news/create" role="button">Add News</a><br><br>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">title</th>

    </tr>
  </thead>
  <tbody>
         @foreach ($news as $new)    
    <tr>
 
      <td scope="row">{{$new->id}}</td>
      <td>{{$new->title}}</td>
      <td>{{$new->description}}</td>
      <td>{{$new->category['title']}}</td>
      
      <td><a href="{{route('news.edit',$new->id)}}"><i class="fas fa-edit"></i></a></td>
      
     {{--  <td><a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><i class="fas fa-trash-alt"></i></a></td>
      <form method="post" action="{{route('news.destroy',$new->id)}}">
        {{csrf_field()}}
         @method('DELETE')
      </form>

 --}}
 <td>
<form id="delete-form-{{$new->id}}" method="post" action="{{route('news.destroy',$new->id)}}" style="display: none;">
                      {{csrf_field()}}
                      {{method_field('Delete')}}
                    </form>

                    <a onclick="
                    if(confirm('You are about to delete'))
                      {
                        event.preventDefault(); document.getElementById('delete-form-{{$new->id}}').submit();
                      }
                      else
                        {
                          event.preventDefault();
                        }">
                       <i class="fas fa-trash-alt"></i></a>
                
</td>

    </tr>
        @endforeach
  </tbody>

</table>
</div>
</center>


  {{-- <div>
    <h1>show news</h1> 
    @foreach($news as $new)
{{$new->id}}
{{$new->title}}
{{$new->description}}
@endforeach
  </div>
<a href="{{route('news.edit',$new->id)}}" class="btn btn-success">Edit</button>
</div> --}}

@endsection