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
                    
                  <form action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                     @method('PUT')
                      @csrf
                    <div class="flex flex-col space-y-4">
                        <h2 class="flex justify-center">EDIT COMPANY</h2>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Name</label>
                            <input type="text" name="company_name" value="{{$company->name}}" class="rounded-lg" placeholder="Enter Name">
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Email</label>
                            <input type="email" name="company_email" value="{{$company->email}}" class="rounded-lg" placeholder="Enter Email">
                        </div>
                        <div class="flex flex-col space-y-2">
                            <input type="file" name="company_logo" value="{{$company->logo}}" >
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-600">Website</label>
                            <input type="text" name="company_website" value="{{$company->website}}" class="rounded-lg" placeholder="Enter Website">
                        </div>
                        <button type="submit" class="flex justify-center text-white bg-green-700 p-2 rounded-md  hover:bg-green-900">EDIT</button>
                         
                    </div>
                </div>
            </form>
         
            </div>
        </div>
    </div>
</x-app-layout>
