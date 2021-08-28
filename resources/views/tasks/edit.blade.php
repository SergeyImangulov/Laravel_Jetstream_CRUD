<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Task - 
            <span class="badge bg-info">{{ $task->title }}</span>
        </h2>
    </x-slot>
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">   
    <div class="container">
      
    <div>
      <div class="float-end">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">
        <i class="fa fa-arrow-left"></i> All task
        </a>
      </div>
      
      <div class="clearfix"></div>
    </div>


    <div class="card card-body bg-light p-4">           
      <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
        </div> 

        <div class="mb-3">
          <label for="sescription" class="form-label">Description</label>
          <textarea type="text" class="form-control" id="sescription" name="sescription" rows="5"> {{ $task->sescription }}</textarea>
        </div> 

        <div class="mb-3">
          <label for="description" class="form-label">Status</label>
          <select name="status" id="status" class="form-control">
              @foreach($statuses as $status)
                <option value="{{ $status['value'] }}" {{ $task->status === $status['value'] ? 'selected' : '' }}>{{ $status['label'] }}</option>
              @endforeach
          </select>
        </div> 
        
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mr-2">Cancel</a>
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-check"></i>
          Save
        </button>
      </form>
    </div>
    </div>
   </div>
  </div>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</x-app-layout>