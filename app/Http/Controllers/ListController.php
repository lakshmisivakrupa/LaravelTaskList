<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class ListController extends Controller
{
    public function getIndex()
    {
    	$tasks = Task::get();
        return view('task.index',['tasks' => $tasks]);
    }
    public function postAdd(Request $request)
    {
    	$tasks = DB::table('tasks')
                    ->where('taskname', $request->input('task'))
                    ->exists();
                           
        if($tasks){
        	return redirect()->back() ->withInput()
                             ->withErrors(['exists' => 
                             	'Task already created']);	        
        }
    	    
        else{
        	$tasks = new Task();
            $tasks->taskname = $request->input('task');
            $tasks->created = 0;
            $tasks->save();
            return redirect()->route('list.index');   
        }  	     
    }
    public function getEditTask(Request $request)
    {
    	DB::table('tasks')
            ->where('id', $request->input('id'))
            ->update(['taskname' => $request->input('taskname')]);
        return redirect()->route('list.index');
        
    }
    public function getEdit(Request $request,$id,$action)
    {
    	//dd($action);
        if($action == 'd'){
        	DB::table('tasks')->where('id',$id)->delete();
        }
        if($action == 'm'){
        	DB::table('tasks')
            ->where('id', $id)
            ->update(['created' => 1]);
        }
        if($action == 'e'){
        	$task = Task::find($id);
            $taskname = $task->taskname;
            //dd($taskname);
            return view('task.edittask',  ['id' => $id,'taskname'=>$taskname]);
        	        	                 
        }

        return redirect()->route('list.index');
        
    }
}
