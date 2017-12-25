<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Task;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use function MongoDB\BSON\toJSON;
use PhpParser\Node\Expr\Cast\Int_;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');


    }


    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new Task();
        $task->name=$request->name;
        $task->author=$request->author;
        $task->save();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return new TaskResource(Task::Find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //done
        Task::where('id', $id)->update($request->all());
        return Task::find($id);


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //done
        $article = Task::find($id);
        if($article==null)
        {
            /*$data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);*/
            abort(404);
        }
        else
        {
            $article->delete();
            return [
                'message'=>'executed successfully',
                'data'=>$article
            ];
        }


    }
}
