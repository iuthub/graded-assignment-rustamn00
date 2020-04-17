@extends('layouts.app')

@section('content')
@if ($note = Session::get('msg'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <p class="text-center"><strong>{{ $note }}</strong></p>
</div>
@endif

<form action="/task/" method="POST">
    <div id="myDIV" class="header">
      @csrf
      {{-- Show input field if user is logged in --}}
      @if(Auth::user())
        <h2>My To Do List</h2>
        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
          @error('title')
            <div class="alert alert-danger">{{ $note }}</div>
          @enderror
        <input class="@error('title') is-invalid @enderror" name="title" type="text" placeholder="Title...">
        <button type="submit" class="addBtn">Add</button>
      @else
      <h2>
        Please
        <a href="/login">login</a>or 
        <a href="/register">register</a>
        to see and create tasks
      </h2>
      @endif
    </div>
</form>
@if(Auth::user())
  <ul id="myUL">
    @foreach($tasks as $task)
    <li>
      <div class="task">
          {{$task->name}}
      </div>
      <div class="action">
          <a href="/task/{{$task->id}}/edit"><i class="fa fa-edit"></i></a>
      </div>
      <div class="action">
        <a href="/task/del/{{$task->id}}"><i class="fa fa-trash-alt"></i></a> 
      </div>
    </li>
    @endforeach
  </ul>
@endif
@endsection
