<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProposalModal extends Component
{

    public $proposal;
    public $isOpen = false;
    protected $listeners = ['openModal'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    // public function mount($proposal)
    // {
    //     $this->proposal = $proposal;
    // }

    public function render()
    {
        return view('livewire.proposal-modal');
    }
}
