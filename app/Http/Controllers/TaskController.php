<?php

namespace App\Http\Controllers;

use DB;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TaskRepository;    //注入Repository

class TaskController extends Controller
{
    protected $tasks;
    //
    /**
     * 所有用户登录可以查看
     * TaskController constructor.
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;  //注入Repository
    }



    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * 通过依赖注入方式
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2(Request $request)
    {
        $value = $this->tasks->forUser($request->user());
        return view('task.index', ['tasks' => $value]);
    }


    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'name' => 'required|max:250'
            ]);
            $insert_data = [
                'name' => $request->input('name')
            ];

            //方法1
            //这种方法 create_at 和 update_at 不会被插入值
//            DB::table('tasks')->insert($insert_data);

            //方法2
            //这种方法会自动插入时间值
//            Task::create($insert_data);

            //方法3
            //如果使用insert_data作为参数save，根本没有值，表中name字段为空
            //使用对象方法可以
            $task = new Task();
            $task->name = $request->name;
            $task->user_id = $request->user()->id;
            $task->save();

            //方法4
//            $request->user()->tasks()->create([
//                'name' => $request->name,
//            ]);

            return redirect('task/index');

        }
        return view('task.add');
    }


    public function edit(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
//            Task::where('id', $request->id)->update(['name' => $request->name]);
//            Task::find($id)->save(['name' => $request->name]);    //这个方法是不正确
            Task::find($id)->update(['name' => $request->input('name')]);
            return redirect('task/index');
        } else {
            $task = Task::find($id);
            return view('Task.edit', ['task' => $task]);
        }
    }

    public function delete($id)
    {
        //方法1
//        Task::findOrFail($id)->delete();

        //方法2
//        DB::table('tasks')->delete($id);

        //方法3
        return redirect('task/index');
    }


    /**
     * 删除
     *
     * 加入权限控制
     * @param Request $request
     * @param Task $task
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('task/index');
    }


    /**
     * 这个方法不行
     * 获取不到$task->user_id  <== 获取不到task实例
     * @param Task $tasks
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_2(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        //delete code
        return redirect('task/index');
    }




}
