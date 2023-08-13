<?php

namespace App\Livewire\Web;

use App\Models\User;
use Livewire\Component;

/**
 * @property-read User $user
 */
class BlessingIndex extends Component
{
    public function render()
    {
        return view('livewire.web.blessing-index');
    }
}
