<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5 mx-12">
           
        <div class="row">   
            <div class="px-5 col-md-8">
                <h1>Our Menu</h2>
                    @if (session ('success'))
                    <div class="alert alert-success  mx-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                    {{-- <div class="flex justify-end">
                        <a href="{{ url('add') }}">
                            <button type="button" class="text-black border-2 border-black bg-white hover:bg-black hover:text-white hover:duration-200   font-medium  text-sm px-5 py-2.5 mr-2 mb-2   ">Add</button>                        </a>
                    </div> --}}

                <div class="relative overflow-x-auto shadow-md rounded-2">
                    <table class="table">
                        <thead class="table-light">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Name
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Description
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Price
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $dt->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $dt->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $dt->description }}
                                </td>
                                <td class="px-6 py-4">
                                    ${{ $dt->price }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ url('edit/'.$dt->id) }}" class="btn btn-primary">Edit</a> |
                                    <a href="{{ url('delete/'.$dt->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            
            <div class="container col-md-4">
                <p class="text-2xl">Add Product</p>
                <form method="POST" action="{{ route('save') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control"  required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" id="file" class="form-control" >
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>   
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</x-app-layout>
