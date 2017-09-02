<!-- edit.blade.php -->

@extends('master')
@section('content')

<div class="container">

  @if(Auth::check())
  <form method="post" action="{{action('CRUDController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$crud->title}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="80" style="width: 100%;">{{$crud->post}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block">&#x21bb; Update</button></div>
      <div class="col-sm-6"><button type="reset" onclick="javascript:document.forms[0].reset();" class="btn btn-default btn-block">&#9100; Undo Edits</button></div>
    </div>
  </form>
  @endif

  @if(Auth::guest())
    <a href="/login" class="btn btn-info">Login to see this content.</a>
  @endif
</div>

@endsection
