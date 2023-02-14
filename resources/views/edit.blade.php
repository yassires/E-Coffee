<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
    
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-2xl pb-2">Edit Product</p>
                    @if (session ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('update/'.$data->id)}}" enctype="multipart/form-data">
                        @csrf
                       
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="enter name" value="{{ $data->title }}"  required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="enter dexcription" value="{{ $data->description }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" name="price" class="form-control" placeholder="enter price" value="{{ $data->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Image</label>
                            <input type="file" id="file" name="image" class="form-control" >
                            <img src="{{asset($data->image)}}" name="old_image" width="200px" alt="">
                        </div>
                        
                        
                        {{-- <button type="submit" class="">Submit</button> --}}
                        <button type="submit" name="add" id="add" class=" border-2 border-black hover:bg-black  hover:text-gray-50    hover:duration-300  font-medium   px-4 py-2 text-center  ">Add</button>

                      </form>
                </div>
            </div>
        </div>
    </x-app-layout>


    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>