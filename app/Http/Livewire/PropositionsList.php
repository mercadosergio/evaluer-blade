<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PropositionsList extends Component
{
    public $activity;

    public function mount($activity)
    {
        $this->activity = $activity;
    }

    public function render()
    {
        return view('livewire.propositions-list');
    }
}
