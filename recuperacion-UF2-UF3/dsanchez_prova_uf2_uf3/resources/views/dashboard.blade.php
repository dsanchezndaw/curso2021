<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <header>
                        <h1></h1>
                    </header>
                    <p>Bienvenido {{Auth::user()->name }} {{Auth::user()->lastname}}</p> <br>
                    
                    @if(Auth::user()->img != null)
                        <img style="height:500px;width:500px" src="{{Auth::user()->img}}"> <br>
                    @endif

                    <a href="{{ 'edicio/'.Auth::user()->id}}">Edició user </a> <br>
                    <a href="{{ 'admin/'.Auth::user()->id}}">Admin </a> <br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
