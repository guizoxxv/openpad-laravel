<!DOCTYPE html>
<html>

  <head>

    @include('includes/head')

    @yield('page_style')

  </head>

  <body>

    <header>

      @include('includes/header')

    </header>

    @yield('inner_header')

    <main>

      @yield('main_content')

    </main>

    <footer>

      @include('includes/footer')

    </footer>

    @yield('modals')

    @include('includes/scripts')

  </body>

</html>
