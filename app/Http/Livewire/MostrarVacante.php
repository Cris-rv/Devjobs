<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;
    public $empresa;
    public $categoria_id;
    public $salario_id;
    public $descripcion;

    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
