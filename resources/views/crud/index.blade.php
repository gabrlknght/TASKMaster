<!-- index.blade.php -->

@extends('master')
@section('content')

  <!-- Flash Notification -->
  @if(session()->has('message.level'))
      <div class="alert alert-dismissable alert-{{ session('message.level') }} container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {!! session('message.content') !!}
      </div>
  @endif

  <div class="container">
    <table class="table table-striped" style="border: 1px solid #ccc; -webkit-box-shadow: 0px 0px 3px 3px rgba(220,220,220,0.5);
-moz-box-shadow: 0px 0px 3px 3px rgba(220,220,220,0.5);
box-shadow: 0px 0px 3px 3px rgba(220,220,220,0.5);">
    <thead>
      <tr style="background: #f6f6f6;">
        <th class="text-muted text-center text-uppercase" title="Task Number">#</th>
        <th class="text-muted text-center text-uppercase" width="15%" title="Task">Task</th>
        <th class="text-muted text-center text-uppercase" title="Task Details">Task Details</th>
        <th colspan="2" class="text-muted text-center text-uppercase" title="Actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach($cruds as $post)
      <tr>
        <td style="vertical-align: middle;" class="lead text-center text-muted"><strong><?php echo $i; $i++; ?> <!-- {{$post['id']}} --></strong></td>
        <td style="background: white; vertical-align: middle; border: 1px solid #ddd;" class="lead text-center"><strong>{{$post['title']}}</strong></td>
        <td class="text-secondary" style="vertical-align: middle;">{{$post['post']}}</td>
        <td width="13%" style="background: #eee; border: 1px dotted #ccc; vertical-align: middle;"><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-default btn-block" title="Edit">&#9997;<span class="hidden-xs">&nbsp;&nbsp;Edit</span></a></td>
        <td width="13%" style="background: #eee; border: 1px dotted #ccc; vertical-align: middle;">
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
