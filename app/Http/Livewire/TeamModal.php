<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TeamModal extends Component
{
    public $showModal = false;
    public $course;

    public function mount($course)
    {
        $this->course = $course;
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.team-modal');
    }
}
