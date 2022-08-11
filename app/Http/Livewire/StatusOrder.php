<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class StatusOrder extends Component
{

    public $order, $estado;

    public $observacion;

    public $nro_factura;

    public $rules = [
        'nro_factura' => 'required',
    ];

    public function facturacion()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $this->order->nro_factura = $this->nro_factura;
        $this->order->estado_facturacion = Order::FACTURADO;
        $this->order->save();

    }

    public function mount()
    {
        $this->estado = $this->order->estado;
    }

    public function actualizar(){
        $this->order->estado = $this->estado;
        $this->order->observacion = $this->observacion;
        $this->order->save();
    }
    public function render()
    {
        //recuperamos la información que contiene la orden
        $items = json_decode($this->order->content);

        return view('livewire.status-order', compact('items'));
    }
}
