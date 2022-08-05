{{-- barra de nevagacion  --}}
<nav class="sticky w-full top-0 z-50" x-data="{open:false,menu:false, lokasi:false}">

    <div class="bg-custom-100 shadow ">

        <div class="max-w-7xl mx-auto px-2 sm:px-4  ">
            {{-- barra de navegacion principal --}}
            <div class="container flex items-center justify-between h-20">

                {{-- seccion del icono --}}
                <div class="hidden lg:flex items-center px-2 lg:px-0">

                    <a class="flex-shrink-0" href="{{ route('home') }}">
                        <img class="block lg:hidden h-12 w-16" src="{{ asset('img/logo100.png')}}" alt="Logo">
                        <img class="hidden lg:block h-12 w-auto" src="{{ asset('img/logo100.png')}}" alt="Logo">
                    </a>

                </div>

                {{-- barra de busqueda  --}}
                <div class="flex-1">
                    @livewire('search-main')
                </div>

                @auth

                    @can('nav.admin')
                    <div class="hidden lg:block lg:ml-2">
                        <div class="flex">
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-white font-medium text-black leading-5 hover:bg-gray-600 hover:text-white md:mx-2 md:w-auto" href="#">
                                Hola: <span class="font-normal">
                                    {{auth()->user()->name}}
                                </span>
                            </a>
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-custom-400 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="{{route('books.index')}}">Administración</a>
                            {{-- metodo para cerrar sesion --}}
                            <form action="{{route('logout')}}" method="POST" class="mx-2">
                                @csrf
                                <button type="submit" class="block w-1/2 mx-2 px-1 py-2  rounded text-center text-sm bg-red-500 font-medium text-white leading-5 hover:bg-red-400 md:mx-0 md:w-auto ">Cerrar Sesión</button>
                            </form>

                        </div>
                    </div>
                    @endcan

                @endauth

                 @guest

                <div class="hidden lg:block lg:ml-2">
                    <div class="flex">
                        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-white font-medium text-black leading-5 hover:bg-gray-600 hover:text-white md:mx-2 md:w-auto" href="{{ route('login') }}">Administración</a>
                    </div>
                </div>
                 @endguest

            </div>
        </div>
    </div>
</nav>
{{-- fin de barra --}}
