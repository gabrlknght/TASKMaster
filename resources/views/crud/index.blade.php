<!-- index.blade.php -->

<!-- Extend primary app HTML5/js/css template -->
@extends('layouts.app')

<!-- Primary content area -->
@section('content')

<!-- Ceate page template container -->
  <div class="container">

    <!-- Flash Messaging Placeholder -->
    @include('flash::message')
    
    <table class="table table-striped table-bordered">
    <thead>
      <tr style="background: #f6f6f6;">
        <th class="text-muted text-center text-uppercase" title="Task Number">#</th>
        <!-- Variable widths if logged in/out -->
        <th class="text-muted text-center text-uppercase"
        @auth width="15%" @endauth
        @auth width="30%" @endauth
        title="Task">Task</th>
        <th class="text-muted text-center text-uppercase" title="Details">Details</th>
        @auth
        <th colspan="2" class="text-muted text-center text-uppercase" title="Actions">Actions</th>
        @endauth
      </tr>
    </thead>
    <tbody>
      <!-- Start row count -->
      <?php $i = 1; ?>
      <!-- Initiate main loop for CRUD index -->
      @foreach($cruds as $post)
      <tr>
        <td class="lead text-center text-muted">
          <!-- Auto-incremented index for each row -->
          <strong><?php echo $i; $i++; ?> <!-- {{$post['id']}} --></strong></td>
        <!-- Task title -->
        <td class="lead text-center"><strong>{{$post['title']}}</strong></td>
        <!-- Task details -->
        <td class="text-secondary">{{$post['post']}}</td>
        <!-- Edit & Delete buttons shown if user logged in. -->
        @auth
        <td width="15%" class="text-center"><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-default btn-block" title="Edit">&#9997;<span class="hidden-xs">&nbsp;&nbsp;Edit</span></a></td>
        <td width="15%" class="text-center">
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            <!-- Cross-scripting Request Field Token -->
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-default btn-block" type="submit" title="Delete">&#128465;<span class="hidden-xs">&nbsp;&nbsp;Delete</span></button>
          </form>
        </td>
        @endauth

      </tr>
      @endforeach

    </tbody>
  </table>
  </div>

@endsection
