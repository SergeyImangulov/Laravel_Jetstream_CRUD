<x-app-layout>
    <x-slot name="header">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Tasks List') }}
        </h2>

    </x-slot>
<div class="container">
  <div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container p-5">
            @yield('main-content')
        </div>

        <div class="container">

          <div>
            <div class="float-start">
              <h4 class = "pb-2">My tasks</h4>
            </div>
            <div class="float-end">
              <a href="{{ route('tasks.create') }}" class="btn btn-info">
              <i class="fa fa-plus-circle"> </i> Create task
              </a>
            </div>
            <div class="clearfix"></div>
          </div>

          @foreach($tasks as $task)
          <div class="card mt-3">
            <div class="card-header">

            @if($task->status === "Performed")
              {{ $task->title }}
            @else
                <del>{{ $task->title }}</del>
            @endif

            <span class="badge rounded-pill bg-warning text-dark">
              {{ $task->created_at->diffForHumans() }}
            </span>
          </div>

          <div class="card-body">
            <div class="card-text">
              <div class="float-start">
                @if($task->status === "Performed")
                {{ $task->sescription }}
                @else
                <del>{{ $task->sescription }}</del>
                @endif

                <br>

                @if($task->status === "Performed")
                <span class="badge rounded-pill bg-info text-dark">
                  Performed
                </span>
                @else
                <span class="badge rounded-pill bg-success text-white">
                  Done
                </span>
                @endif
                <small>Last Updated - {{ $task->updated_at->diffForHumans() }}</small>
              </div>

              <div class="float-end">
                <a href="{{ route('tasks.edit', $task->id ) }}" class="btn btn-success"> <i class="fa fa-edit"> </i> Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete ?')">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"> </i> Delete</button>
                </form>
            </div>
              <div class="clearfix"></div>
            </div>
            </div>
          </div>

      @endforeach
</div>
      @if (count($tasks) === 0)
        <div class="alert alert-danger p-2">
            No Task Found. Please Create one task
            <br>
            <br>
            <a href="{{ route('tasks.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Create Task
             </a>
        </div>
    @endif


</div>
    </div>
   </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</x-app-layout>
