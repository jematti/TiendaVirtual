@extends('ui.nav')

@section('contenido-admin')

<div class="max-w-7xl mx-auto ">
    <h2 class=" my-5  bg-custom-100 text-white uppercase text-lg rounded-lg p-4 text-center font-bold ">Reporte de Ventas Realizadas</h2>
    {{-- mensaje de alerta --}}
    {{-- @if (session('info'))
    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-base font-medium text-red-700 dark:text-red-800">
            {{ session('info') }}
        </div>
      </div>
    @endif --}}
    <form  action="{{ route('sale.pdf') }}" method="POST" novalidate >
        @csrf
        <div class="md:grid md:grid-cols-2 gap-5">
            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Fecha de Inicio *</label>
                <input class="appearance-none block w-full  text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_inicio') border-red-500 @enderror" id="fecha_inicio" name="fecha_inicio" type="date" placeholder="fecha de publicación del Libro" value="1/10/2022" />

                @error('fecha_inicio')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Fecha de Fin *</label>
                <input class="appearance-none block w-full  text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_fin') border-red-500 @enderror" id="fecha_fin" name="fecha_fin" type="date" placeholder="fecha de publicación del Libro" value="31/10/2022" />

                @error('fecha_fin')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Productos</label>
                <select class="border-gray-300 p-2 w-full" id="product_id" name="product_id">
                    <option value="" >--Seleccione Productos--</option>

                    @foreach ($products as $product )
                    <option value="{{ $product->id }}">{{ $product->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Categoría</label>
                <select class="border-gray-300 p-2 w-full" id="categor_id" name="category_id">
                    <option value="">--Seleccione Categoria--</option>

                    @foreach ($categories as $category )
                    <option value="{{ $category->nombre_categoria }}">{{ $category->nombre_categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Repositorios</label>
                <select class="border-gray-300 p-2 w-full" id="repository_id" name="repository_id">
                    <option value="">-- Seleccione Repositorio--</option>
                    @foreach ($repositories as $repository)
                    <option value="{{ $repository->nombre_repositorio }}">{{$repository->nombre_repositorio}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Autores</label>
                <select class="border-gray-300 p-2 w-full" id="author_id" name="author_id">
                    <option value="">-- Seleccione Autores--</option>

                    @foreach ($authors as $author)
                    <option value="{{ $author->nombre_autor }}">{{$author->nombre_autor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-end">
            <input type="submit" class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-1/2" value="Generar Reporte PDF" />
        </div>
    </form>


</div>
@endsection
