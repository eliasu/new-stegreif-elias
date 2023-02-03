<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class Counter extends Component
{
    public $count = 5;
    public $showDropdown = false;
    
    public function increment()
    {
        Debugbar::debug("cllick");
        $this->count++;
    }

 
    public function archive()
    {
        // ...
        $this->showDropdown = false;
    }
 
    public function delete()
    {
        // ...
        $this->showDropdown = false;
    }
    
    
    public function render()
    {
        Debugbar::debug("render");
        return view('livewire.counter');
    }
}
