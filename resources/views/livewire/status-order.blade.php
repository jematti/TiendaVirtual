<div>
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

            {{-- cambiar el estado de la orden --}}
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 border-2 border-blue-500">
                <p class="text-gray-700 uppercase font-bold">
                    <span class="font-semibold">Numero de Orden:</span>
                    {{ $order->id }}
                </p>
                <form wire:submit.prevent="actualizar">
                    <div class="flex space-x-3 mt-2">
                        <label for="estado">
                            <input wire:model="estado" type="radio" name="estado" value="2" class="mr-2">
                            RECIBIDO
                        </label>

                        <label for="estado">
                            <input wire:model="estado" type="radio" name="estado" value="3" class="mr-2">
                            ENVIADO
                        </label>

                        <label for="estado">
                            <input wire:model="estado" type="radio" name="estado" value="4" class="mr-2">
                            ENTREGADO
                        </label>

                        <label for="estado">
                            <input wire:model="estado" type="radio" name="estado" value="5" class="mr-2">
                            ANULADO
                        </label>
                    </div>
                    @if ($estado == 5)

                    <div class="mt-3">
                        <div class="w-full ">
                            <label class="mb-2 block uppercase text-red-500 font-semibold" for="observacion">
                                Observación
                            </label>
                            <textarea class="
                                          form-control
                                          block
                                          w-full
                                          px-3
                                          py-1.5
                                          text-base
                                          font-normal
                                          text-gray-700
                                          bg-white bg-clip-padding
                                          border border-solid border-gray-300
                                          rounded
                                          transition
                                          ease-in-out
                                          m-0
                                          focus:text-neutral-700 focus:bg-white focus:border-gray-600 focus:outline-none
                                      "
                                      id="observacion"
                                      wire:model="observacion"
                                      name="observacion"
                                      placeholder="Motivo de la Observacion/Anulación de la Orden"
                                      @error('observacion')
                                      border-red-500
                                      @enderror
                                      value="{{ $order->observacion }}"
                                      rows="3">

                            {{ $order->id}}
                            </textarea>

                            @error('observacion')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="flex mt-2 ">
                        <button class="ml-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                            Actualizar orden
                        </button>
                    </div>
                </form>


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

                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 border-2 ">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos para la Factura: </p>
                        <p class="text-base font-semibold">Nombre/Razon Social: {{ $order->nombre_factura}}</p>
                        <p class="text-base font-semibold">NIT : {{ $order->nit_factura}}</p>
                        {{-- proceso de facturacion --}}
                        <form wire:submit.prevent="facturacion">
                            <div class="mb-2">
                                <label class="mb-1 text-base " for="nro_factura">
                                    Nro de Factura
                                </label>

                                <input type="text" wire:model.defer="nro_factura" class="rounded-lg block shadow-sm w-full text-sm p-2.5 border border-gray-500" placeholder="Ingrese el nombre completo" id="nro_factura" name="nro_factura" @error('nro_factura') border-red-500 @enderror value="{{old('nro_factura')}}" />

                                @error('nro_factura')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex mt-2 ">
                                <button class="ml-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                                    Facturar
                                </button>
                            </div>
                        </form>
                        {{-- fin de proceso de facturacion --}}
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-700 uppercase font-bold">
                            Comprobande de Pago
                        </p>
                        <a class=" bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 my-2 rounded-lg" href="{{ asset('depositos').'/'.$order->imagen_deposito}}" target="_blank" rel="noopener noreferrer">
                            Ver deposito
                        </a>

                        <a class=" bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 my-2 rounded-lg" href="{{ route('orders.download',$order->imagen_deposito)}}" target="_blank" rel="noopener noreferrer">
                            Descargar deposito
                        </a>
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
</div>
