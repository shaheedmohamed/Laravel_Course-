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
    </nav>


    <!-- Cards -->

    <div class="card mt-5">
        <h5 class="card-header">Post info</h5>
        <div class="card-body">
            <h5 class="card-title">Title : {{$post['id']}} </h5>
            <p class="card-text">Description : {{$post['Description']}} </p>
        </div>
    </div>
    <div class="card mt-5">
        <h5 class="card-header">Post Creator info</h5>
        <div class="card-body">
            <h5 class="card-title">Name : {{$post['Psted_by']}} </h5>
            <p class="card-text">Email : {{$post['email']}} </p>
            <p class="card-text">Created At : {{$post['created_at']}} </p>
        </div>
    </div>

</div>
</body>
</html>
