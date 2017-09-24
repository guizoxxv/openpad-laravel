@extends('layouts/master')

@section('main_content')

  <form method="post" action="{{ route('submit_name') }}">

    {{ csrf_field() }}

    <i id="search-icon" class="fa fa-search fa-3x" aria-hidden="true"></i>

    <div class="break"></div>

    <div class="search hint--top hint--rounded hint--bounce" aria-label="3-10 characters. [ a-z ], [ 0-9 ] or [ -_ ]">

      <input class="name-input" type="text" name="name" maxlength="10" pattern="[a-z0-9-_]{3,10}" placeholder="Enter file name" required>

    </div>

    <div class="break"></div>

    <div class="status-wrapper" style="display:none"></div>

    @include('includes/errors')

    <button class="submit-create" type="submit" name="submit-create" disabled="true"><i class="fa fa-plus" aria-hidden="true"><span>Create</span></i></button>

    <button class="submit-load" type="submit" name="submit-load" disabled="true"><i class="fa fa-folder-open" aria-hidden="true"><span>Load</span></i></button>

  </form>

  <div class="break"></div>

@endsection
