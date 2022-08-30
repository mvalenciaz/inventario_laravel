<?php

namespace App\Http\Livewire;

use App\Models\movements;
use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{

    public Product $product;
    public bool $openModal = false;
    public $cantidad;
    public $precio_movimiento = 0;
    public $tipo_movimiento = "salida";
    public $msg = "";

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-card');
    }

    public function toggleMoviento()
    {
        if ($this->tipo_movimiento == "salida") {
            $this->tipo_movimiento = "entrada";
        } else {
            $this->tipo_movimiento = "salida";
        }
    }

    public function updatePrice()
    {

        $this->msg = "";

        if ($this->tipo_movimiento != "salida") {
            $this->msg = "";
            return;
        }

        if ($this->cantidad == "") {
            $this->precio_movimiento = 0;
        }

        if (
            $this->cantidad > $this->product->cantidad
        ) {
            $this->msg = "La cantidad ingresada supera el inventario";
            return;
        }

        if ($this->tipo_movimiento == "salida" && $this->cantidad > 0) {
            $this->precio_movimiento = $this->cantidad * $this->product->precio;
        }
    }

    public function save()
    {
        $cantidad_acutalizada = 0;



        if ($this->tipo_movimiento == "salida") {
            if ($this->cantidad > $this->product->cantidad) {
                $this->msg = "La cantidad ingresada supera el inventario";
                return;
            }

            $cantidad_acutalizada = $this->product->cantidad - $this->cantidad;
        } else {
            $cantidad_acutalizada = $this->product->cantidad + $this->cantidad;
        }

        $this->product->cantidad = $cantidad_acutalizada;

        $this->product->update();

        $this->msg = "";



        $movement = new movements();
        $movement->cantidad = $this->cantidad;
        $movement->tipo = $this->tipo_movimiento;
        $movement->product_id = $this->product->id;
        $movement->precio = $this->precio_movimiento;

        $movement->save();

        $this->cantidad = 0;
        $this->precio_movimiento = 0;

        session()->flash('flash.banner', "Moviemientod e inventario registrado");

        $this->openModal = !$this->openModal;
    }
}
