@extends('layouts/master')

@section('page_style')

  <style>

    main {
      padding: 0;
    }

  </style>

@endsection

@section('inner_header')

  <div class="inner-header">

    <h2>Name: {{ $name }}</h2>

  </div>

@endsection

@section('main_content')

  <form class="edit-form flex-center" method="post" action="{{ route('submit_create') }}">

    {{ csrf_field() }}

    <i class="more-less-btn fa fa-plus-square fa-3x" aria-hidden="true" title="Show more"></i>

    <input type="hidden" name="name" value="{{ $name }}">

    <textarea name="text"></textarea>

    <button class="submit-create" type="submit" name="submit-create"><i class="fa fa-plus" aria-hidden="true"><span>Create</span></i></button>

  </form>

@endsection
