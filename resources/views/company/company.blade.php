<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col space-y-2">
                        <h2 class="text-blue-500 font-bold text-center text-2xl">COMPANY</h2>
                        
                         <a href="{{url('/company/add')}}" class="flex w-20 items-center justify-center p-2 rounded-md bg-green-700 text-white shadow-sm hover:bg-green-900">
                         <i class="fa-solid fa-plus mr-1"></i>    
                            ADD
                         </a>
                         @if(session('info'))
                         <div class="border border-green-700 text-green-700 p-2">
                             {{session('info')}}
                         </div>
                         @endif
                         <table class=" table-auto border border-black shadow-lg">
                            <thead class="p-2 bg-black text-white">
                                <tr>
                                    <th class="p-2">No</td>
                                    <th class="p-2">Companies</td>
                                    <th class="p-2">Email</td>
                                    <th class="p-2">Company Logo</td>
                                    <th class="p-2">Website</td>
                                    <th class="p-2">Edit</td>
                                    <th class="p-2">Delete</td>
                                </tr>
                            </thead>
                           
                            <tbody >
                                @foreach($companies as $company) 
                                <form action="{{route('company.delete',$company->id)}}" method="POST">
                                   @method("DELETE")
                                   @csrf
                                    <tr class="text-center">
                                        <td class="p-2">{{$company->id}}</td>
                                        <td class="p-2">{{$company->name}}</td>
                                        <td class="p-2">{{$company->email}}</td>
                                        <td class="p-2 flex justify-center items-center"><div class="min-w-[100px] min-h-[100px] flex items-center justify-center bg-gray-200">
                                             <img src="{{asset('storage/images/'.$company->logo)}}" alt="Logo" class="max-w-full max-h-full bg-center bg-cover">
                                             </div></td>
                                        <td class="p-2"><a href="{{$company->website}}" class="text-blue-600">{{$company->website}}</a></td>
                                        <td class="p-2"><a href="{{url('/company/edit/'.$company->id)}}"><i class="fa-solid fa-pen-to-square text-green-700 hover:text-green-900"></i></a></td>
                                        <td class="p-2"><button type="submit"> <i class="fa-solid fa-trash text-red-700 hover:text-red-900"></i></a></td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        
                         </table>
                         <div class="flex justify-center pt-4">
                            {{ $companies->links() }}
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
