@extends('layouts/master')

@section('inner_header')

  <div class="inner-header">

    <h2>Name: {{ $file->name }}</h2>

    <ul class="tools-wrapper">

      <li>
        <a href="{{ route('raw', [$file->name]) }}"><i class="fa fa-eye" aria-hidden="true"><span>Raw</span></i></a>
      </li>
      <li>
        <a href="{{ route('edit', [$file->name]) }}"><i class="fa fa-pencil" aria-hidden="true"><span>Edit</span></i></a>
      </li>
      <li>
        <a class="copy-btn" href="#" data-clipboard-target=".copy-text-target"><i class="fa fa-clipboard" aria-hidden="true"><span>Copy</span></i></a>
      </li>

    </ul>

  </div>

@endsection

@section('main_content')

  <div class="text-wrapper">

<pre class="file-pre copy-text-target">{{ $file->text }}</pre> <!-- Do not use identation markup with pre -->

  </div>

@endsection

@section('modals')

  @include('modals/check_password')

@endsection
