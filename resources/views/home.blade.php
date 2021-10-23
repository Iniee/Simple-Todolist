<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.9.0/mdb.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.9.0/mdb.min.js" type="text/javascript"></script>

<body class="bg-secondary">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do list</h3>
                <form action="{{ route ('store')}}" method="POST" autocomplete="off">
                 @csrf
                 <div class="input-group">
                     <input type="text" name="content" class="form-control" placeholder="Add a new Task">
                     <button type="submit" class="btn btn-info btn-sm px-4"><i class="fas fa-plus"></i></button>
                 </div>
                </form>

                @if (count($todolists))
               <ul class="list-group list-group-flush mt-3">
                @foreach ($todolists as $todolist )
                   <li class="list-group-item">
                       <form action="{{route ('destroy', $todolist->id)}}" method="POST">
                        {{ $todolist->content }}
                       @csrf
                       @method('delete')
                       <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>  
                      </form>
                   </li>    
                 @endforeach
                </ul>
                @else
                  <p class="mt-3 text-center">No Task Available!</p>  
                @endif
            </div>
            @if (count($todolists))
            <div class="card-footer">
                You have {{count($todolists)}} pending tasks 
            </div>
                
            @endif
        </div>
    </div>

    
</body>
</html>