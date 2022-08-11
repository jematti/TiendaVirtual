@extends('layouts.app')


@section('contenido')
<div class="bg-white">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white flex items-center rounded-lg shadow-lg px-6 py-6 mb-6">

            {{-- Estado del pedido --}}
            <div class="relative">
                <div class="{{ $order->estado >= 2 && $order->estado != 5 ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12  flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div class="{{ $order->estado >= 3 && $order->estado != 5 ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ $order->estado >= 3 && $order->estado != 5 ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div class="{{ $order->estado >= 4 && $order->estado != 5 ? 'bg-blue-400' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ $order->estado >= 4 && $order->estado != 5 ? 'bg-blue-400' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>


        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase">
                <span class="font-semibold">Numero de Orden:</span>
                {{ $order->id }}
            </p>
            {{-- boton enlace para ir a pagar --}}
            @if ($order->estado == 1)
            <button
                onclick="location.href = '{{ route('orders.payment',$order) }}'"
                class="ml-auto px-16 bg-red-500 hover:bg-red-400 text-white font-bold py-2 rounded-lg ">
                Adjuntar Pago
            </button>
            @endif

        </div>

        {{-- datos de contacto --}}
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($order->tipo_envio == 2)
                    <p class="text-sm">Los Libros deben ser recogidos en tienda</p>
                    {{-- direccion de la tiendas donde se ubican los libros --}}
                    <p class="text-sm">Calle falsa 123</p>
                    @else
                    <p class="text-sm">Los Libros seran envíados a:</p>
                    <p class="text-sm">{{ $order->direccion }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de Contacto</p>
                    <p class="text-sm">Persona que recibira el libro: {{ $order->nombre_contacto }}</p>
                    <p class="text-sm">Correo: {{ $order->correo_contacto }}</p>
                    <p class="text-sm">Telefono: {{ $order->telefono_contacto }}</p>
                    <hr>
                    <p class="text-lg font-semibold uppercase">Datos para la Factura: </p>
                    <p class="text-base font-semibold">Nombre/Razon Social: {{ $order->nombre_factura}}</p>
                    <p class="text-base font-semibold">NIT : {{ $order->nit_factura}}</p>


                </div>
            </div>
        </div>

        {{-- detalles de la orden --}}
        <div class="bg-white rounded-lg shadow-lg p-6 ">
            <p class="text-xl font-semibold">Resumen</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <div>
                                <img class="h-32 object-cover mr-4" src="{{ asset('uploads').'/'.$item->options->imagen}}" alt="imagen de portada de libro">

                                <article>
                                    <h1 class="font-bold">{{ $item->name }}</h1>
                                </article>
                            </div>
                        </td>
                        <td class="text-center">{{ $item->price }}Bs</td>
                        <td class="text-center">{{ $item->qty }}</td>
                        <td class="text-center">{{ $item->price * $item->qty }} Bs</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
