@extends('layouts.master')
@section('title')
 Edit Task
@endsection
@section('content')
<form action ="{{route('list.edittask')}}" method ="get">
	<div class ="row">
	<div class = "col-md-4 col-md-offset-4">
		<h2>Edit The Task</h2>
		<div class ="form-group">
		 <input type = "text" id ="edit-task" name ="taskname" class ="form-control" value = "{{$taskname}}">
		 <input type ="hidden" name = "id" value = "{{$id}}">
		 </div>
		 <button type = "submit">Save</a>
		 {{csrf_field()}}
	</div>
	</div>
</form>
@endsection