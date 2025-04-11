<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- NavBar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">Shaheed</a>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <!-- Table Of Posts-->
    <div class=" container mt-5">
        <div class="text-center">
            <a href="{{route('posts.create')}}" type="button" class=" btn btn-success"  >Create Post</a>
        </div>

        <table class="table mt-5">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">POsted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $posts)
        <tr>
        <td>{{$posts['id']}}</td>
        <td>{{$posts['title']}}</td>
        <td>{{$posts['Psted_by']}}</td>
        <td>{{$posts['created_at']}}</td>
        <td>
            <a href="{{route('posts.show',$posts['id'])}}" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-success">Edit</a>
            <a href="#" class="btn btn-danger">delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</body>
</html>


<!-- وقفت عند 2:36 -->