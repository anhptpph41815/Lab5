<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Danh sách phim </h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

<div class="d-flex">
  <a href="{{route('create')}}" class="btn btn-primary ">Thêm mới phim</a>
  <form action="{{route('search')}}" method="GET" class="d-flex justify-content-end ms-3">
    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
    <button class="btn " type="submit">
      <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
    </button>
  </form>
</div>
<table class="table  table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Poster</th>
        <th scope="col">Intro</th>
        <th scope="col">Release At</th>
        <th scope="col">Genre</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $da)
    <tr>
        <th scope="row">{{$da->id}}</th>
        <td>{{$da->title}}</td>
        <td><img src="{{ asset('/Storage/'. $da->poster)}}" alt="" width="100px"></td>
        <td>{{$da->intro}}</td>
        <td>{{$da->release_date}}</td>
        <td>{{$da->genre->name}}</td>
        <td class="d-flex">
          <a class="btn btn-primary me-2"  href="{{route('show', $da->id)}}">Xem</a>
          <a class="btn btn-warning me-2"  href="{{route('edit', $da->id)}}">Sửa</a>
        <form action="{{route('destroy', $da->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn xóa không ?')">Xóa</button>
        </form>
        </td>
      </tr>
    @endforeach
      
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
   {{$data->links()}}
  </div>
    
</body>
</html>