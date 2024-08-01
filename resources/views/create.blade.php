<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Cập nhật phim phim </h2>
<a href="{{route('index')}}" class="btn btn-primary">Danh sách</a>

<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title movie">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Poster</label>
        <input type="file" class="form-control" id="poster" name="poster" placeholder="Poster movie">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Intro Movie</label>
        <textarea class="form-control" id="intro" name="intro" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Release date</label>
        <input type="date" class="form-control" id="release" name="release_date" placeholder="release movie">
      </div>
      <select name="genre_id" id="">
       @foreach ($genre as $gen)
       <option value="{{$gen->id}}">{{$gen->name}}</option>
           
       @endforeach
      </select>
      <div class="mb-3 mt-2">
        <button type="submit" class="btn btn-primary">Create new</button>
    </div>
</form>
    
</body>
</html>