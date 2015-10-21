@extends('layouts.master')


@section('title')
    Lorem-Ipsum Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/books/create.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('content')
    <h1> Lorem-Ipsum Generator </h1>
    <h3>How many paragraphs do you want?</h3>
    @if(count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <h3><span class = "label label-danger">{{ $error }}</span></h3>
        @endforeach
    </ul>
    @endif

    <form method="POST" actions="/lorem-ipsum">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <fieldset>
          <label for="paragraphs">Paragraphs (Max: 50):</label>
          <input maxlength="2" type="text" id="paragraphs" name="paragraphs" value="5">
        </fieldset>
        <br>
      <button type="submit" class="btn btn-success">Generate!</button><hr>
    </form>

    @if ($_SERVER['REQUEST_METHOD'] == 'POST')
      <?php
        $generator = new Badcow\LoremIpsum\Generator();
        $text = $generator->getParagraphs($paragraphs);
        echo implode('<p>', $text );
      ?>
    @endif
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
