<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Alola Todo List</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>
<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow -sm">
            <div class="card-body">
                <h3 class="text-center"><b>To-do List</b></h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-primary btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                <!-- if tasks count -->
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                        <li class="bg-light list-group-item">
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                {{ $todolist->content }}
                                @csrf
                                @method('delete')
                                <button type="submit" href="#" class="btn btn-danger btn-sm float-end active" role="button" aria-pressed="true"><i class="fas fa-trash"></i></button>

                            </form>
                        </li>
                    @endforeach
                </ul>
                @else
                <p class="bg-success text-center mt-3">No Tasks!</p>
                @endif
            </div>
            @if (count($todolists))
                <div class="bg-warning text-center card-footer">
                    You have {{ count($todolists) }} pending tasks!
                </div>
            @else
            @endif
        </div>
    </div>
</body>
</html>