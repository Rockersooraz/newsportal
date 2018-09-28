@extends('layout.app')

@section('main-section')

<div class="container">
<div class="row">

<div class="col-lg-4 col-lg-offset-6">
    <h1>Create News</h1>
<form action="{{ route('news.store')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
  <fieldset>
  
    <div class="form-group">
      <label for="Inputtitle">title</label>
      <input type="text" class="form-control" name="title"  placeholder="Enter Title">
    </div>

    <div class="form-group">
      <label for="Inputtitle">Category</label>
      <select name="cat_id"  class="form-control">
        <option value="">select</option>
      @foreach ($category as $c)
        <option value="{{$c->id}}">{{$c->title}}</option>
      @endforeach
    </select>
    </div>

      <div class="form-group">
      <label for="Inputtitle">author</label>
      <input type="text" class="form-control" name="author"  placeholder="Enter author">
    </div>
    
   
   
    <div class="form-group">
      <label for="exampleTextarea">Description</label>
      <textarea class="form-control" name="description" rows="7"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleInputFile">image input</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">
  
   <button type="submit" class="btn btn-primary">Submit</button>
 

  </fieldset>
</form>
</div>
</div>
</div>

@endsection