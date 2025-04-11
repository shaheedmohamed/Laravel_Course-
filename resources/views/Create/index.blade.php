<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<form class="container mt-5" method="POST" action="{{route('posts.store')}}">
    @csrf
  <div class="mb-3">
    <label for="Title" class="form-label">Title</label>
    <input name='title' type="text" class="form-control" id="Title"require >
  </div>

  <div class="mb-3">
    <label for="Descreption" class="form-label">Descreption</label>
    <textarea name='description' class="form-control" id="Descreption" require></textarea>
  </div>

  <div class="mb-3">
    <label for="Creator" class="form-label">Post Creator</label>
    <input name='creator' type="text" class="form-control" id="Creator" require>
  </div>
  

  <button type="submit" class="btn btn-primary">Create</button>
</form>
</body>
</html>