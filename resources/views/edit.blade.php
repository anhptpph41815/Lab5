{{-- @extends('welcome')

@section('content')
<!-- Page Header End -->
</div>
</div>
</div>

<!-- Shop Detail Start -->
<div class="container-fluid ">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('/Storage/'. $movie->poster)}}" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{asset('/Storage/'. $movie->poster)}}" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{asset('/Storage/'. $movie->poster)}}" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{asset('/Storage/'. $movie->poster)}}" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$movie->title}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">${{$movie->intro}}</h3>
            <p class="mb-4">Ngày xuất bản: {{$movie->release_date}}</p>
            <p class="mb-4">Thể loại: {{$movie->genre->name}}</p>
        
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus" >
                        <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center"  value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                        
                    </div>
                    
                </div>
                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
          
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facemovie-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection --}}

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
    <h2 class="text-center">Chi tiết phim phim </h2>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<a href="{{route('index')}}" class="btn btn-primary">Danh sách</a>

<form action="{{route('update', $movie->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title movie" value="{{$movie->title}}" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Poster</label>
        <input type="file" class="form-control" id="poster" name="poster" placeholder="Poster movie" value="{{$movie->poster}}">
        <img src="{{asset('/Storage/' .$movie->poster)}}" alt="" width="100px" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label" >Intro Movie</label>
        <textarea class="form-control" id="intro" name="intro" rows="3" >{{$movie->intro}}</textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Release date</label>
        <input type="date" class="form-control" id="release" name="release_date" placeholder="release movie"  value="{{$movie->release_date}}">
      </div>

      <select name="genre_id" id="" class="form-select">
        @foreach ($genre as $gen)
            <option value="{{ $gen->id }}" @if ($movie->genre_id == $gen->id) selected @endif>
                {{ $gen->name }}
            </option>
        @endforeach
    </select>
      <div class="mb-3 mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
    
</body>
</html>