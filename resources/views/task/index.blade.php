@extends('layouts.master')

@section('title')
	Task List
@endsection

@section('content')
@if($errors->any())
   @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
  @endforeach
@endif
	<div class ="row">
	  <div class = "col-md-4 col-md-offset-4">
	    <h3>Task List</h3>
	    <form action ="{{route('list.add')}}" method="post">
	      <div class ="form-group">
	        <input type = "text" id ="task" name ="task" class ="form-control" placeholder="Type a new task here" required>
	      </div>
	      <button type ="submit" class ="btn btn-primary">Add
	      </button>
	      {{csrf_field()}}
	    </form>
	  </div>
	</div>
    <!-- If no Task is available -->
    @if($tasks->count() == 0)
    <div class ="row">
	  <div class = "col-md-4 col-md-offset-4">
	    <label>No Task Available or Created yet</label>
	  </div>
	</div>
    @else
    @foreach($tasks as $index => $task)       
    <div class ="row">
	  <div class = "col-md-4 col-md-offset-4">
	    @if($task->created == 0)
	    <label>{{ $index +1}}.</label>
	    <label>{{$task->taskname}}</label>
	    <a href ="{{route('list.edit',['id' => $task->id,'action' => 'e'])}}">Edit</a>|<a href ="{{route('list.edit',['id' => $task->id,'action' => 'm'])}}">Mark as Done</a>|<a href ="{{route('list.edit',['id' => $task->id,'action' => 'd'])}}">Delete</a>
	    @else
	    <label><strike>{{$task->taskname}}</strike></label>
	    <a href ="{{route('list.edit',['id' => $task->id,
	    'action' => 'd'])}}">Delete</a>
	    @endif 
	  </div>
	</div>
	@endforeach 
  @endif
@endsection