<!-- index.blade.php -->

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
    <table class="table table-striped table-bordered">
    <thead>
      <tr style="background: #f6f6f6;">
        <th class="text-muted text-center text-uppercase" title="Task Number">#</th>
        <th class="text-muted text-center text-uppercase" width="15%" title="Task">Task</th>
        <th class="text-muted text-center text-uppercase" title="Details">Details</th>
        <th colspan="2" class="text-muted text-center text-uppercase" title="Actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach($cruds as $post)
      <tr>
        <td style="vertical-align: middle;" class="lead text-center text-muted"><strong><?php echo $i; $i++; ?> <!-- {{$post['id']}} --></strong></td>
        <td style="background: white; vertical-align: middle;" class="lead text-center"><strong>{{$post['title']}}</strong></td>
        <td class="text-secondary" style="vertical-align: middle;">{{$post['post']}}</td>
        <td width="15%" style="background: #eee; vertical-align: middle;"><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-default btn-block" title="Edit">&#9997;<span class="hidden-xs">&nbsp;&nbsp;Edit</span></a></td>
        <td width="15%" style="background: #eee; vertical-align: middle;">
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-default btn-block" type="submit" title="Delete">&#128465;<span class="hidden-xs">&nbsp;&nbsp;Delete</span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
