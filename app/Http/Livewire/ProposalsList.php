<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProposalsList extends Component
{
    public $activity;

    public function mount($activity)
    {
        $this->activity = $activity;
    }

    public function render()
    {
        return view('livewire.proposals-list');
    }
}
