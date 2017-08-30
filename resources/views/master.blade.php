<!-- master.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>&#9997; TASKMaster</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>
      <br/><br/>

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

        @yield('content')

    <footer class="container">
      <hr/>
      <p class="text-center">&copy; <?= date('Y') ?> Avik Nandy &middot; All Rights Reserved</p>
    </footer>

    </body>

</html>
