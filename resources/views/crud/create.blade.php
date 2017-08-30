<!-- create.blade.php -->

@extends('master')

@section('content')

<div class="container">
  <form method="post" action="{{url('crud')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="120" style="width: 100%;"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block">&#10133;&nbsp;&nbsp;Create</button></div>
      <div class="col-sm-6"><button type="reset" onclick="javascript:document.forms[0].reset();" class="btn btn-default btn-block">&#9100; Reset Form</button></div>
      <!-- <input type="submit" class="btn btn-primary btn-block"> -->
    </div>
  </form>
</div>

@endsection
