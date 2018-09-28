@extends('layout.app')

@section('main-section')

<div class="container">
<div class="row">

<div class="col-lg-4 col-lg-offset-6">
  <h1>Edit News</h1>
<form action="{{route('news.update',$news->id)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
  @method('PUT')
  <fieldset>
  
    <div class="form-group">
      <label for="Inputtitle">title</label>
      <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="{{$news->title}}">
    </div>

      <div class="form-group">
      <label for="Inputtitle">category</label>
     
       <select name="cat_id" class="form-control">
  <option value="">select</option>
   @foreach ($category as $c)
     <option value="{{$c->id}}"
@if($c->id==$news->cat_id)
selected

@endif
>

      {{$c->title}}</option>
   @endforeach



 </select>
</div>


      <div class="form-group">
      <label for="Inputtitle">author</label>
      <input type="text" class="form-control" name="author"  value="{{$news->author}}" placeholder="Enter author">
    </div>
    
   
   
    <div class="form-group">
      <label for="exampleTextarea">Description</label>
      <textarea class="form-control" name="description"  rows="7">{{$news->description}}</textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputFile">image input</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      <img src="{{ asset('storage/uploads/articles/'.$news->image)}}">
      <small id="fileHelp" class="form-text text-muted">
   <input type="submit"  value="Update" class="btn btn-primary">
  

  </fieldset>
</form>
</div>
</div>
</div>

@endsection