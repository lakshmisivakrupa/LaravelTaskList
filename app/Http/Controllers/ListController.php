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
        //Check if the task is already created
        $tasks = DB::table('tasks')
                    ->where('taskname', $request->input('task'))
                    ->exists();

        /*If the task already exists,return with a 
          message 
        */ 
        if($tasks){
            return redirect()->back() ->withInput()
                             ->withErrors(['exists' => 
                                'Task already created']);           
        }
        /*It Tasks is not present ,continue with creating a new  
          task 
        */   
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
        //Edit the task and update the database
        DB::table('tasks')
            ->where('id', $request->input('id'))
            ->update(['taskname' => $request->input('taskname')]);
        return redirect()->route('list.index');
        
    }
    public function getEdit(Request $request,$id,$action)
    {
        //delete the task
        if($action == 'd'){
            DB::table('tasks')->where('id',$id)->delete();
        }
        //Set the 'created' field of table to 1 for Mark as Done
        if($action == 'm'){
            DB::table('tasks')
            ->where('id', $id)
            ->update(['created' => 1]);
        }
        //Redirect to edittask page to edit the task
        if($action == 'e'){
            $task = Task::find($id);
            $taskname = $task->taskname;
            //dd($taskname);
            return view('task.edittask',  ['id' => $id,
                                   'taskname'=>$taskname]);
                                         
        }
        return redirect()->route('list.index');        
    }
}
