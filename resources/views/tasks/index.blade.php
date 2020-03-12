@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">
            FOLDER
          </div>

          <!-- SHOW FOLDERS -->
          <div class="panel-body">
            <a  href="{{ route('folders.create') }}"
                class="btn btn-default btn-block">
                Add Folder
            </a>
          </div>

          <div class="list-group">
            @foreach($folders as $folder)
            <a
                href="{{ route('tasks.index',['id' => $folder->id]) }}"
                class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
              >
              {{ $folder->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>

      <!--  SHOW TASKS -->

      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            TASK
          </div>

          <div class="panel-body">
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>
                    <a  href="{{ route('tasks.create', ['id' => $current_folder_id]) }}"
                        class="btn btn-default btn-sm" >
                        Add Task
                    </a>
                  </th>
                  <th>
                    <form class="form-inline" action="" method="get">
                      <input type="checkbox" name="judge_status" value="1"> ElseDONE
                      <input type="text" name="keyword" class="form-control" value="{{ $keyword }}" placeholder="keyword">
                      <input type="submit" value="submit" class="btn btn-info">
                    </form>
                  </th>
                </tr>
              </table>

              </div>
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th>TITLE</th>
                  <th>STATUS</th>
                  <th>DUE DATE</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                @foreach($tasks as $task)
                  <tr>

                        <td>
                          <!-- 詳細ページへの遷移 -->
                          <a href="{{ route('tasks.detail',['id'=>$task->folder_id,'task_id' =>$task->id ])}}">
                            {{ $task->title}}
                          </a>
                        </td>
                        <td>
                            <span class="label {{ $task->status_class }}">
                              {{ $task->status_label }}
                            </span>
                        </td>
                        <td>
                            {{ $task->formatted_due_date}}
                        </td>
                    </div>

                    <td>
                    <a href=" {{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id])}}"
                       class="btn btn-info btn-sm">
                      Edit
                    </a></td>

                    <td>
                      <a  href="{{ route('tasks.delete',['id'=> $task->folder_id, 'task_id' => $task->id])}}"
                          class="btn btn-danger btn-sm">
                      Delete
                      </a></td>
                  </tr>
                  @endforeach

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
