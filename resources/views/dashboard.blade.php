<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- knfkf --}}
    {{-- knfkf --}}
    {{-- knfkf --}}
    {{-- knfkf --}}
    <div class="flex flex-col">
        <div >
          <div class="p-4  pb-0  pl-10 font-bold text-gray-600">Statistics</div>
         
    
          <div class=" mt-8 grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10 ">
            <!--Grid starts here-->
            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Numbers of users</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">{{ $NumOfUser }}</div>
                </div>
              </div>
              <div class="text-gray-500 text-4xl">
                <i class="fa-solid fa-user"></i>
              </div>
            </div>
    
            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Total Coffee</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">{{ $NumOfCoffee }}</div>
                </div>
              </div>
              <div class="text-gray-500 text-4xl">
                <i class="fa-solid fa-microphone"></i>
              </div>
            </div>
    
            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Total Coffees</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">total coffee</div>
                </div>
              </div>
              <div class="text-gray-500 text-4xl">
                <i class="fa-solid fa-compact-disc"></i>
              </div>
            </div>
    
            <!-- Grid ends here..-->
    
          </div>
         
        </div>
      </div>


 
      <div class="px-5 w-full">
        @if (session ('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success !</span>{{ session('success') }}

        </div>
            
    @endif
    <div class="mt-5 w-full">
           
        <div class=" justify-between sm:block md:flex">   
                <div class="overflow-x-auto  w-full">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <div class="p-4    pl-5 font-bold text-gray-600">Latest</div>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
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
                        <tbody >
                            @foreach ($data as $dt)

                            <tr class=" border-b bg-gray-800 border-gray-700">
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $dt->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $dt->description }}
                                </td>
                                <td class="px-6 py-4">
                                    ${{ $dt->price }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ url('edit/'.$dt->id) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a> |
                                    <a href="{{ url('delete/'.$dt->id) }}" class="text-red-500 hover:text-red-400">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <div id="modal"  class="   pl-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="p-4 pl-5 font-bold text-gray-600">Add Section</div>
                    <div class="relative w-full h-full max-w-md md:h-auto">
                      <!-- Modal content -->
                      <div class="shadow bg-gray-700">
                       
                        <div class="px-6 py-1 lg:px-8">
                          <h3 class="mb-4 text-xl font-medium text-white">Add Product</h3>
                          <div class="model-body">
                            <form  method="POST" action="{{ route('save') }}"  enctype="multipart/form-data">
                                @csrf
                                <div>
                                  <input type="hidden" id="id" name="id" value="">
                                  <input type="file" name="image" id="file" class="border  text-white rounded-lg w-full bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="Coffee" >
                                </div>
                                <div>
                                  <label for="title" class=" mb-2 text-sm font-medium text-white">title</label>
                                  <input type="text" name="title" id="title" class="border  text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="Coffee" required>
                                </div>
                                
                               
                                <div>
                                  <label for="title" class=" mb-2 text-sm font-medium text-white">Price</label>
                                  <input type="text" id="price" name="price" class="border text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="Coffee price" required>
                                </div>
                                <div>
                                  <label for="lyrics" class="mb-2 text-sm font-medium  text-white">Description</label>
                                  <textarea type="text" name="description" id="description" placeholder="Something" class=" border  text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " required></textarea>
                                </div>
                              
                          </div>
                
                          <div class="flex justify-end ">
                            <div class="px-2">
                              <button type="submit" name="add" id="add" class="w-25% border border-white text-white font-medium  text-sm px-5 py-2.5 text-center  hover:text-black hover:bg-white hover:duration-300">Add</button>
                            </div>
                          </div>
                
                
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            
             
        </div>
    </div>

    
  <!--Add -->
  



    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>
