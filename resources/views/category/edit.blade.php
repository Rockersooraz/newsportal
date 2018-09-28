@extends('layout.app')

@section('main-section')

<div class="container">
<div class="row">

<div class="col-lg-4 col-lg-offset-6">
    <h1>Create Category</h1>
<form action="{{ route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	@method('PUT')
  <fieldset>
  
    <div class="form-group">
      <label for="Inputcategory">Category</label>
      <input type="text" class="form-control" name="title" value="{{$category->title}}"  placeholder="Enter category"><br>
    
   
 <button type="submit" class="btn btn-primary">Update</button>
 

  </fieldset>
</form>
</div>
</div>
</div>

@endsection