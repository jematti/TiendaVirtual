
@extends('layouts.app')


@section('contenido')
<main class="max-w-7xl mx-auto bg-white">
    <section class="text-gray-600 body-font overflow-hidden ">
       {{-- seccion descripcion de libro  --}}
      <div class="container px-5 py-5 mx-auto">
        <div class="lg:w-full flex flex-wrap mx-2 object-center">
          {{-- seccion de la imagen --}}
          {{-- <img
            alt="imagen del post {{ $book->titulo }}"
            class="lg:w-1/4 max-w-screen-sm lg:h-72 h-64 object-cover object-center rounded"
            src="{{ asset('uploads').'/'.$book->imagen}}"> --}}
            <img
            alt="imagen del post {{ $book->titulo }}"
            class="lg:w-1/4 max-w-screen-sm lg:h-72 h-64 object-cover object-center rounded"
            src="{{ asset('img/portada1.jpg')}}">
          {{-- seccion informacion del libro --}}
          <div class="lg:w-2/5 w-full lg:pl-5 lg:py-6 lg:pr-2 mt-6 lg:mt-0 ">
            <h1 class="text-gray-900 text-2xl title-font font-bold mb-1">{{ $book->titulo }}</h1>
            <h2 class="text-lg title-font text-gray-500 tracking-widest">
                {{-- <a href="{{ route('author.show', $book->author->id) }}">
                    {{ $book->author->nombre_autor }}
                </a> --}}
            </h2>
                {{-- <p
                x-data="{ isCollapsed: false, maxLength: 750, originalContent: '', content: '' }"
                x-init="originalContent = $el.firstElementChild.textContent.trim(); content = originalContent.slice(0, maxLength)"
                >
                    <span x-text="isCollapsed ? originalContent : content">
                        {{ $book->resumen }}
                    </span>
                    ...
                    <button
                    @click="isCollapsed = !isCollapsed"
                    x-show="originalContent.length > maxLength"
                    x-text="isCollapsed ? 'Ver menos' : 'Ver mas'"
                    class="font-semibold text-gray-500 underline"
                    ></button>
                </p> --}}
                <p class="text-justify">
                    #FCBCB|26°FERIA INTERNACIONAL DEL LIBRO DE LA PAZ 2022
                    La Fundación Cultural del Banco Central de Bolivia, junto a sus repositorios nacionales y centros culturales presentes en la FIL, espacio donde ofrece a la población un abanico de material literario, cultural y de investigación para todos los amantes de la lectura.
                    <br>
                    <hr class="mb-2">
                    Ven y visítanos en nuestro stand en la planta baja del bloque Rojo del campo ferial Chuquiago Marka.
                    <br>
                    En los siguientes horarios:
                    <span class="font-semibold">
                    <br>
                    🕛Lunes a jueves de 14:00 a 22:00
                    <br>
                    🕛Viernes y sábado de 10:00 a 23:00
                    <br>
                    🕛Domingo de 10:00 a 22:00
                    </span>
                </p>

            {{-- <div class="flex">
                <h4 class="font-medium mx-4">Categoria:</h4>
              <button class="flex text-white bg-green-700 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">{{ $book->category->nombre_categoria }}</button>
            </div> --}}
          </div>
          {{-- seccion de datos  de pago y envio del libro --}}
          <div class="lg:w-1/3 w-full lg:pl-2 lg:py-6 mt-6 lg:mt-0 lg:border-l border-gray-900 ">
            <p class="text-gray-900 text-base title-font font-medium mb-1">Precio:</p>
            <h1 class="text-gray-900 text-3xl pl-10 title-font font-bold mb-1">{{ $book->precio }}bs</h1>
                {{-- añadir al carro de compras --}}
                @can('nav.users')
                   @livewire('add-cart-item',['book'=>$book])
                @endcan
                {{-- informacion de envio  --}}
                <div class="p-2 text-left w-60"  role="alert">


                    <div class="flex flex-wrap">
                        {{-- <div class="flex my-2">
                            <i class="fa-solid fa-truck-moving fa-2xl mt-3 text-green-700"></i>
                            <p class="font-bold px-2 text-sm ">¡Recibe tu pedido en 2 dias!</p>
                        </div> --}}
                        <div class="flex mt-2">
                            <i class="fa-solid fa-shop fa-2xl mt-5 text-green-700"></i>
                            <p class="font-bold px-2 mb-5 text-base ">¡Puedes comprarlo y recogerlo en nuestro Stand en la 26°FERIA INTERNACIONAL DEL LIBRO DE LA PAZ 2022!</p>
                        </div>
                        <h4 class="text-red-600 text-center font-bold  text-lg mb-2 border-2 border-rose-500 p-3 rounded-lg">Bloque Rojo - Sala 1 <h4>
                        <div class="flex">
                            <button class="bg-blue-600 text-white font-bold uppercase text-sm px-3 py-3 rounded-lg shadow mr-1 mb-1 " type="button" onclick="toggleModal('modal-id-lp')">
                                <i class="fa-solid fa-location-dot px-1"></i>
                                Ubicación de la Feria del Libro
                            </button>
                        </div>
                    </div>

                </div>
          </div>
        </div>
      </div>
       {{-- fin de seccion de descrpcion de libro --}}
      <hr>
      {{-- seccion ficha tecnica de libro --}}
      <section class="py-1 bg-blueGray-50">

        <div class="w-full xl:w-8/12 mb-24 xl:mb-0 px-4 mx-auto mt-10">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <h3 class="font-semibold text-lg text-blueGray-700">Ficha técnica de {{ $book->titulo }}</h3>
            </div>

            <div class="block w-full overflow-x-auto">
              <table class="items-center bg-transparent w-full border-collapse ">
                <tbody>
                  <tr>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left  ">
                      Titulo :
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 ">
                      {{ $book->titulo }}
                    </td>
                    <th class="border-t-0 px-6 align-center border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                      Autor :
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                       {{ $book->author->nombre_autor }}
                    </td>
                  </tr>
                  <tr>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left ">
                      Nro. de páginas  :
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                      {{ $book->numero_paginas }}
                    </td>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                      Editorial :
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                     {{ $book->editorial->nombre_editorial }}
                    </td>
                  </tr>
                  <tr>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left ">
                      Fecha Publicación :
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 ">
                      {{ $book->fecha_publicacion }}
                    </td>

                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                        Idioma :
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                          {{ $book->idioma }}
                    </td>

                  </tr>
                  <tr>

                    @if($book->ancho != '')
                     <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left ">
                        Ancho :
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                          {{ $book->ancho }} cm
                      </td>
                    @endif

                    @if($book->grueso != '')
                      <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                        Grueso :
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                          {{ $book->grueso }} cm
                      </td>
                    @endif
                  </tr>
                  <tr>

                    @if($book->peso != '')
                      <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                        Peso :
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                          {{ $book->peso}} gr
                      </td>
                    @endif


                    @if($book->alto != '')
                      <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                        Alto :
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
                        {{ $book->alto}} cm
                      </td>

                    @endif

                  </tr>
                </tbody>

              </table>
            </div>
          </div>
        </div>
    </section>
    {{-- fin seccion ficha tecnica --}}

    {{-- Codigo Modal de ubicacion del libro--}}
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center " id="modal-id-lp">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
          <!--content modal-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header modal-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
              <h3 class="text-xl font-bold text-center text-sky-800">
                Estamos Presentes enl 26° FERIA INTERNACIONAL DEL LIBRO
                <br>
                del 3 al 14 de agosto de 2022
                <br>
                <span class=" font-semibold text-gray-600">
                Bloque Rojo -
                Sala 1
                te esperamos</span>
              </h3>
              <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id-lp')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>
            <!--body modal-->
            <div class="flex flex-col p-2">
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <p class="font-medium text-black text-base leading-relaxed mx-1 ">
                            Correo: fundacion@fundacionculturalbcb.gob.bo

                    </p>
                </div>
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <p class="font-medium text-black text-base leading-relaxed mx-1 ">
                        Celulares/Telefonos: 2 2424148
                    </p>
                </div>
                {{-- <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="font-medium text-black text-base leading-relaxed mx-1 ">
                        Encargado: {{ $book->repository->nombre_encargado}}
                    </p>
                </div> --}}
                <div class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="font-medium text-black text-base leading-relaxed mx-1 ">
                        Ubicación:
                    </p>
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.787803049121!2d-68.09850548513538!3d-16.536806988593547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f20d8a4e3066b%3A0x946516766136bf15!2sCampo%20Ferial%20Chuquiago%20Marka!5e0!3m2!1ses-419!2sbo!4v1659648457642!5m2!1ses-419!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


            <!--footer del modal-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
              <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id-lp')">
                Cerrar
              </button>
            </div>
          </div>
        </div>
     </div>
     <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-lp-backdrop"></div>
     {{-- fin modal --}}


      <script type="text/javascript">
        function toggleModal(modalID){
          document.getElementById(modalID).classList.toggle("hidden");
          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID).classList.toggle("flex");
          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
      </script>
</main>

    {{-- Seccion para el footer --}}
    @livewire('footer')
@endsection
