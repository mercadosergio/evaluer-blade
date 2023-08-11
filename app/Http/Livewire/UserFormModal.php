<?php

namespace App\Http\Livewire;

use App\Models\Program;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class UserFormModal extends Component
{
    public $showModal = false;
    public $profile;
    public $programs;

    public function rules()
    {
        return [
            'dni' => 'required|size:10',
            'name' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'program' => 'required',
            'email' => 'required|email|unique:users',
        ];
    }

    public function mount($profile)
    {
        $this->profile = $profile;
        $this->programs = Program::all();
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function submitForm()
    {
        $response = Http::post(route('update.user'), [
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($response->successful()) {
            $this->reset([
                'dni',
                'name',
                'first_lastname',
                'second_lastname',
                'program',
                'email',
            ]);
            $this->emit('userCreated'); // Emitir evento Livewire
            $this->dispatchBrowserEvent('closeModal'); // Cerrar el modal
        } else {
            // La solicitud falló, puedes manejar el error aquí
        }
    }

    public function render()
    {
        return view('livewire.user-form-modal');
    }
}
