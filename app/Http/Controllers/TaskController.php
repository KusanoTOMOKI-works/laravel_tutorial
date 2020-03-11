<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Folder;
use App\Model\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(int $id, Request $request)
    {
        $folders =Auth::user()->folders()->get();

        // 選択フォルダの取得

        $current_folder = Folder::find($id);

        $keyword =$request->input('keyword');
        $judge_status =$request->input('judge_status');


        if (!empty($keyword)) {
            if ($judge_status === '1') {
                $tasks =Task::where('status', 1)->orWhere('status', 2)->get();
                $tasks =Task::where('title', 'LIKE', '%'.$keyword.'%')->get();
            } else {
                $tasks =Task::where('title', 'LIKE', '%'.$keyword.'%')->get();
            }
        } else {
            if ($judge_status === '1') {
                $tasks =Task::where('status', 1)->orWhere('status', 2)->get();
            } else {
                $tasks = $current_folder->tasks()->get();
            }
        }
        return view('tasks/index', [
      'folders' => $folders,
      'current_folder_id' => $current_folder->id,
      'tasks'=> $tasks,
    ])->with('tasks', $tasks)->with('keyword', $keyword)->with('judge_status',$judge_status);
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
      'folder_id' => $id
    ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
          'id' => $current_folder->id,
      ]);
    }

    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit', [
        'task' => $task,
    ]);
    }


    // 詳細の表示を行う。

    public function showDetail(int $id, int $task_id)
    {
        $task =Task::find($task_id);

        return view('tasks/detail', [
      'task' => $task,
      'folder_id' => $id,
    ]);
    }



    // Edit function

    public function edit(int $id, int $task_id, Request $request)
    {
        // 1
        $task = Task::find($task_id);

        // 2
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        // 3
        return redirect()->route('tasks.index', [
         'id' => $task->folder_id,
     ]);
    }


    public function delete(int $id, int $task_id)
    {
        Task::destroy($task_id);
        return redirect()->route('tasks.index', [
      'id' => $id,
    ]);
    }


    // すでに終了したタスクは表示しない。
    public function nondisplayDone(int $id)
    {
        $tasks =Task::where('status', 1)->orWhere('status', 2)->get();

        return redirect()->route('tasks.index', [
      'id' => $id,

      'tasks'=> $tasks,
    ]);
    }


    // // // 検索機能作成中
    public function search(int $id, Request $request)
    {
        $keyword = $request->all();

        $query =Task::query();

        if (!empty($keyword)) {
            $query->where('title', 'LIKE', '%'.$keyword.'%')->get();
        }


        return redirect()->route('tasks.index', [
        'id' => $id,
        'tasks' => $query,
      ])->with('keyword', $keyword);
    }
}
