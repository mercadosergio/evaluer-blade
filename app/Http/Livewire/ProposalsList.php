<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProposalsList extends Component
{
    public $activity;
    public $openModal = false;

    public function mount($activity)
    {
        $this->activity = $activity;
    }


    public function showModal()
    {
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.proposals-list');
    }
}
