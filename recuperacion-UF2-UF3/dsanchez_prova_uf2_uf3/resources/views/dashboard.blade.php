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
                    @include('editMessage')
                    <p>Bienvenido {{Auth::user()->name }} {{Auth::user()->lastname}}</p> <br>
                    <form action="{{ url('admin/'.Auth::user()->id) }}" method="post">
                        <input type="hidden" name="user" id="username" value="{{Auth::user()->name}}">
                        <p>Suma los dos primeros números: </p><input type="text" name="text" id="suma">
                        <button class="enviar" type="submit">Enviar</button>
                    </form><br>

                    <header>
                        <div class="notificacion"></div>
                    </header>
                    
                    @if(Auth::user()->img != null)
                        <img style="height:500px;width:500px" src="{{Auth::user()->img}}"> <br>
                    @endif
                    
                    <br><a href="{{ 'edicio/'.Auth::user()->id}}">Edició user </a> <br>

                    @if(Auth::user()->is_admin == 1)
                        <a href="{{ 'admin/'.Auth::user()->id}}">Admin </a> <br>

                    @else
                        <p>No tienes rol de administrador, lo siento</p>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
