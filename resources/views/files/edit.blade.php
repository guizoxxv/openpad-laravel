@extends('layouts/master')

@section('page_style')

  <style>

    main {
      padding: 0;
    }

    /*footer {
      padding-top: 30px;
    }*/

  </style>

@endsection

@section('inner_header')

  <div class="inner-header">

    <h2>Name: {{ $file->name }}</h2>

    <div class="break"></div>

    <ul class="tools-wrapper">

      <li>
        <a href="{{ route('raw', [$file->name]) }}"><i class="fa fa-eye" aria-hidden="true"><span>Raw</span></i></a>
      </li>
      <li>
        <a href="{{ route('load', [$file->name]) }}"><i class="fa fa-file" aria-hidden="true"><span>File</span></i></a>
      </li>
      <li>
        <a class="copy-btn" href="#" data-clipboard-target=".copy-text-target"><i class="fa fa-clipboard" aria-hidden="true"><span>Copy</span></i></a>
      </li>
      <li>
        <a href="#" data-remodal-target="modal-change-password"><i class="fa fa-lock" aria-hidden="true"><span>Password</span></i></a>
      </li>
      <li>
        <a class="delete-btn" href="#" data-remodal-target="modal-delete"><i class="fa fa-trash" aria-hidden="true"><span>Delete</span></i></a>
      </li>

    </ul>

  </div>

@endsection

@section('main_content')

  <form class="edit-form flex-center" method="post" action="">

    {{ csrf_field() }}

    <i class="more-less-btn fa fa-plus-square fa-3x" aria-hidden="true" title="Show more"></i>

    <textarea class="text-input copy-text-target" name="text">{{ $file->text }}</textarea>

    <input class="update-name-input" type="hidden" name="name" value="{{ $file->name }}">

    <div class="status-wrapper edit-status-wrapper" style="display:none"></div>

  </form>

@endsection

@section('modals')

  @include('modals/change_password')
  @include('modals/delete')

@endsection
