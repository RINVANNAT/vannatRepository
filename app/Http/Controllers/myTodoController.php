<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Todo;
use Carbon\Carbon;
use DB;

class myTodoController extends Controller
{
    public function index() {
		$todos = DB::table('todo')->where('deleted_at', '=', null )->get();
		return view('frontend.layouts.my-todo', compact('todos'));		
	}

	public function addNewTodo() {
		return view('frontend.layouts.add-new-todo');
	}

	public function addTodo(Request $request) {
		$response=DB::table('todo')->insert(
    		array('title' => $request->get('title'),
    			  'description' => $request->get('description'),
    			  'deadline' => $request->get('deadline'),
		          'is_done' => $request->get('date'),
		          'created_at' => Carbon::now()
		          ));
		if (json_encode($response)) {
			return redirect('/index');
		}else {
			return "no";
		}
	}

	public function editTodo($id, Request $request) {
		
		$response=DB::table('todo')
		            ->where('id', $id)
		            ->update(['title' 		=> $request->get('test'),
		            		  'updated_at'	=> Carbon::now()
		            		  ]);
		 if($response){
		 	return $request->all();
		 }
		 else{
		 	echo "you are not updated";
		 }
	}

	public function deleteTodo($id) {

		$response=DB::table('todo')
		            ->where('id', $id)
		            ->update(['deleted_at'	=> Carbon::now()]);
		return $response;
	}
}
