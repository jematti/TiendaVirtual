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
            </div>
        </div>
    </div>
</nav>
{{-- fin de barra --}}
