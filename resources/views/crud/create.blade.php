<!-- create.blade.php -->

@extends('layouts.app')
@section('content')

<header>
  <div class="container">
    <div id="main-nav" class="well well-sm pull-right"><p class="text-info text-center"><strong>MENU</strong></p>
      <?php if (\Request::is('crud')) { ?> <!-- Auto-hides 'Create New' on all pages except front -->
        <a href="{{action('CRUDController@create')}}" class="btn btn-md btn-primary" style="margin-right: 0.5em;" title="Create New">&#10133;<span class="hidden-xs">&nbsp;&nbsp;Create New</span></a>
      <?php } ?>
        <a href="{{action('CRUDController@index')}}" class="btn btn-md btn-info pull-right" title="View All">&#128065;<span class="hidden-xs">&nbsp;&nbsp;View All</span></a>
    </div>
    <h1><a href="/crud" style="text-decoration: none;" title="Back to TASKMaster Index">&#9997; TASKMaster</a></h1>
    <p class="text-secondary">Actually, it's just a really CRUDdy app!</p>
  </div>
</header>

<div class="container">
  @if(Auth::check())
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
    </div>
  </form>
  @endif

  @if(Auth::guest())
    <a href="/login" class="btn btn-info">Login to see this content.</a>
  @endif
</div>

@endsection
