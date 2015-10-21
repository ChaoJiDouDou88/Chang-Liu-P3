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
    <h1> User Generator </h1>
    @if(count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <h3><span class = "label label-danger">{{ $error }}</span></h3>
        @endforeach
    </ul>
    @endif

    <form method="POST" actions="/user-generator">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <fieldset>
          <label for="users">How many users? (Max: 50):</label>
          <input maxlength="2" type="text" id="users" name="users" value="{{ old('users'), 5}}" >
        </fieldset>
        <br>
        <fieldset>
          <label for="address">Address</label>
          <input type="checkbox" id="address" name="address" value="address" {{ old('address') ? "checked" : ""}} >
        </fieldset>
        <fieldset>
          <label for="text">Text</label>
          <input type="checkbox" id="text" name="text" value="text" {{ old('text') ? "checked" : ""}} >
        </fieldset>
        <br>
      <button type="submit" class="btn btn-success">Generate!</button><hr>
    </form>

    @if ($_SERVER['REQUEST_METHOD'] == 'POST')
      <?php
        foreach($users as $user){
          echo $user;
          echo "<br>"."<br>"."<br>";
        }
        #echo implode('<p>', $users);
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
