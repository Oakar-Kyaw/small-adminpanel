<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl shadow-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{route('company.add')}}" method="POST" enctype="multipart/form-data">
                  
                  @csrf
                    <div class="flex flex-col space-y-4">
                        <h2 class="flex justify-center">ADD COMPANY</h2>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Name</label>
                            <input type="text" name="company_name" class="rounded-lg" placeholder="Enter Name" required>
                            @error('company_name')
                                <div class="flex space-x-1 items-center">
                                  <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                  <div class="p-2 text-red-500 ">{{ $message }}</div>
                                </div>
                                
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Email</label>
                            <input type="email" name="company_email" class="rounded-lg" placeholder="Enter Email">
                            @error('company_email')
                                <div class="flex space-x-1 items-center">
                                  <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                  <div class="p-2 text-red-500 ">{{ $message }}</div>
                                </div>
                                
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-2">
                            <input type="file" name="company_logo"  >
                            @error('company_logo')
                                <div class="flex space-x-1 items-center">
                                  <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                  <div class="p-2 text-red-500 ">{{ $message }}</div>
                                </div>
                                
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Website</label>
                            <input type="text" name="company_website" class="rounded-lg" placeholder="Enter Website">
                            @error('company_website')
                                <div class="flex space-x-1 items-center">
                                  <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                  <div class="p-2 text-red-500 ">{{ $message }}</div>
                                </div>
                                
                            @enderror
                        </div>
                        <button type="submit" class="flex justify-center text-white bg-green-700 p-2 rounded-md  hover:bg-green-900">ADD</button>
                         
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
