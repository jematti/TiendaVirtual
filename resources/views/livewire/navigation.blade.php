

{{-- barra de nevagacion  --}}
<nav
class="z-0 relative"
x-data="{open:false,menu:false, lokasi:false}">

  <div class="relative z-10 bg-sky-700 shadow">

    <div class="max-w-7xl mx-auto px-2 sm:px-4  ">
       {{-- barra de navegacion principal --}}
      <div class="relative flex items-center justify-between h-20">

        {{-- seccion del icono --}}
        <div class="flex items-center px-2 lg:px-0">

          <a class="flex-shrink-0" href="{{ route('home') }}">
            <img class="block lg:hidden h-12 w-16" src="{{ asset('img/logo1.jpg')}}" alt="Logo">
            <img class="hidden lg:block h-12 w-auto" src="{{ asset('img/logo1.jpg')}}" alt="Logo">
          </a>

        </div>

        {{-- barra de busqueda  --}}
        <div class="flex-1 flex justify-center px-2 lg:ml-6 lg:justify-start">
          <div class="max-w-lg w-full lg:max-w-2xl">
            <label for="search" class="sr-only">Search </label>
            <form methode="get" action="#" class="relative z-50">
              <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <input type="text" placeholder="Buscar libro por palabra clave / titulo / autor " name="s" id="s" class="block w-full pl-10 pr-3 py-2 h-12 border border-transparent rounded-md leading-5 bg-white text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="Search">
            </form>
          </div>
        </div>

        {{-- icono de inicio de session y login --}}

        @auth
        <div class="hidden lg:block lg:ml-2">
            <div class="flex">
                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-white font-medium text-black leading-5 hover:bg-gray-600 hover:text-white md:mx-2 md:w-auto" href="#">
                    Hola: <span class="font-normal">
                    {{auth()->user()->name}}
                    </span>
                </a>
                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="{{route('books.index')}}">Administrador</a>
                {{-- metodo para cerrar sesion --}}
                <form action="{{route('logout')}}" method="POST" class="mx-2">
                    @csrf
                    <button type="submit" class="block w-1/2 mx-2 px-1 py-2  rounded text-center text-sm bg-red-500 font-medium text-white leading-5 hover:bg-red-400 md:mx-0 md:w-auto "  >Cerrar Sesión</button>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <div class="hidden lg:block lg:ml-2">
            <div class="flex">
                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-white font-medium text-black leading-5 hover:bg-gray-600 hover:text-white md:mx-2 md:w-auto" href="{{ route('login') }}">Ingresa</a>
                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="{{ route('register') }}">Registrate</a>
            </div>
        </div>

        @endguest

        {{-- icono de menu desplegable movil --}}
        <div class="flex lg:hidden">
          <button @click="menu=!menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

      </div>
      {{-- fin barra de navegacion principal --}}
      <hr>
      {{-- segunda Barra de navegacion --}}
      <div class="mt-1 py-3 -mx-1  items-end  hidden lg:block text-white  rounded-md">

            <ul class="flex  text-base font-bold ">
                <li class="px-2 lg:px-3 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                   <a href="{{route('home')}}" class="truncate max-w-24 ">Novedades</a>
                </li>
                <li class="px-2 lg:px-3 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                  </svg>
                  <a href="{{route('home')}}" class="truncate max-w-24 ">Recomendados</a>
                </li>
                <li class="px-2 lg:px-3 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                  </svg>
                  <a href="{{route('home')}}" class="truncate max-w-24 " >Los Más Vistos</a>
                </li>
            </ul>
      </div>
      {{-- fin segunda barra de navegacion --}}

    </div>

    {{-- menu para dispositivos moviles --}}
    <div x-show="menu" class="block lg:hidden">
        menu
      <div class="px-2 pt-2 pb-3">
        <a href="{{route('home')}}" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Novedades</a>
        <a href="{{route('home')}}" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Recomendados </a>
        <a href="{{route('home')}}" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Los más vistos</a>

      </div>
      {{-- inicio y registro para modo celular --}}

      {{-- <div class="flex items-center py-2 -mx-1 md:mx-0">
        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto" href="{{ route('login') }}">Unete</a>
        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="{{ route('register') }}">Registrate</a>
      </div> --}}

    </div>
    {{-- fin de menu de dispositivos moviles --}}

  </div>
</nav>

{{-- fin de barra --}}

