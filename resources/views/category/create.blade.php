@extends('ui.nav')

@section('contenido-admin')

<div class="max-w-5xl">
    <h2 class="bg-custom-100 text-white uppercase text-lg rounded-lg p-4 text-center font-bold ">Categoría</h2>

    {{-- menu de navegacion para crear y editar categorias --}}
    <div class="md:grid grid-cols-2 gap-1  sm:flex-grow">
        @can('admin.categories.index')
        <div class="my-2 p-2 ">
            <button class="w-full p-2 uppercase bg-sky-600 text-white font-bold hover:bg-sky-700 border border-gray-900  rounded-lg" onclick="location.href = '{{ route('category.index') }}'">
                <i class="fa-solid fa-angle-down"></i><span class="px-2">Listar Categorías</span>
            </button>
        </div>
        @endcan
        @can('admin.categories.create')
        <div class="my-2 p-2 ">
            <button class="w-full p-2 uppercase bg-sky-600 text-white font-bold hover:bg-sky-700 border border-gray-900  rounded-lg" onclick="location.href = '{{ route('category.create') }}'">
                <i class="fa-solid fa-plus"></i><span class="px-2">Agregar Categoría</span>
            </button>
        </div>
        @endcan
    </div>


    {{-- formulario para agregar categoria --}}

    <form action="{{ route('category.store') }}" method="POST" novalidate>

        @csrf
        <div class="mb-5">
            <label for="nombre_categoria" class="mb-2 block uppercase text-gray-500 font-bold">
                Nombre de Categoría
            </label>

            <input id="nombre_categoria" type="text" name="nombre_categoria" placeholder="Ingrese el nombre de la categoria" class="border p-3 w-full rounded-lg @error('nombre_categoria') border-red-500 @enderror"  value="{{old('nombre_categoria')}}" />
            @error('nombre_categoria')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror

            <input type="submit" value="Añadir Categoría" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3 mt-5" />

    </form>
</div>



@endsection
