<!-- create.blade.php -->

<!-- Extend primary app HTML5/js/css template -->
@extends('layouts.app')

<!-- Primary content area -->
@section('content')

<!-- Ceate page template container -->
<div class="container">

  <!-- Flash Messaging Placeholder -->
  @include('flash::message')

  <!-- User should be authenticated to show this content area -->
  @auth
  <form method="post" action="{{url('crud')}}">
    <div class="form-group row">
      <!-- Cross-scripting Request Field Token -->
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Title" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="120" style="width: 100%;"></textarea>
      </div>
    </div>
    <!-- Create form actions -->
    <div class="form-group row">
      <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block">&#10133;&nbsp;&nbsp;Create</button></div>
      <div class="col-sm-6"><button type="reset" onclick="javascript:document.forms[0].reset();" class="btn btn-default btn-block">&#9100; Reset Form</button></div>
    </div>
  </form>
  @endauth

  <!-- Show login redirect button on this page if user not logged in -->
  @guest
    <a href="/login" class="btn btn-info btn-block text-center">Login to see this content.</a>
  @endguest
</div>

@endsection
