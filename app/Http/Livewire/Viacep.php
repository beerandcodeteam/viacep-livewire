<?php

namespace App\Http\Livewire;

use App\Services\ViacepService;
use Livewire\Component;

class Viacep extends Component
{
    public $inputCep;
    public $data;

    protected $rules = [
        'inputCep' => 'required',
    ];

    protected $messages = [
        'inputCep.required' => 'Amigão, preenche o cep ai vai tiu!',
    ];

    public function execute()
    {
        $this->validate();

        $service = new ViacepService($this->inputCep);
        $this->data = $service->getLocation();

        if (is_null($this->data)) {
            $this->addError('save', 'CEP não encontrado');
        }
    }

    public function render()
    {
        return view('livewire.viacep');
    }
}
