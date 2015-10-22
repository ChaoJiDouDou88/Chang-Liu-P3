@extends('layouts.master')


@section('title')
    User Generator
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
    <h1> Xkcd Generator </h1>
    @if(count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <h3><span class = "label label-danger">{{ $error }}</span></h3>
        @endforeach
    </ul>
    @endif

    <form method="POST" actions="/xkcd-generator">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <fieldset>
          <label for="number_of_words"># of Words (Max 9)</label>
          <input maxlength="1" type="text" id="number_of_words" name="number_of_words" value="{{ old('number_of_words'), 5}}" >
        </fieldset>
        <br>
        <fieldset>
          <label for="number_of_symbols"># of Symbols (Max 3)</label>
          <input type="text" id="number_of_symbols" name="number_of_symbols" value="{{ old('number_of_symbols'), 2}}" >
        </fieldset>
        <fieldset>
          <label for="add_number">Add a number</label>
          <input type="checkbox" id="add_number" name="add_number" value="add_number" {{ old('add_number') ? "checked" : ""}} >
        </fieldset>
        <br>
      <button type="submit" class="btn btn-success">Generate!</button><hr>
    </form>

    @if ($_SERVER['REQUEST_METHOD'] == 'POST')
      <?php
        #foreach($users as $user){
          #echo $user;
          #echo "<br>"."<br>"."<br>";
        #}
        #echo implode('<p>', $password);
        echo $password;
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
