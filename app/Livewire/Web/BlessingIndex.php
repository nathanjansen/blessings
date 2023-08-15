<?php

namespace App\Livewire\Web;

use App\Models\User;
use App\Notifications\WebpushSubscribed;
use Livewire\Component;
use Uteq\Convey\Concerns\HasWebpush;

/**
 * @property-read User $user
 */
class BlessingIndex extends Component
{
    use HasWebpush;

    public function mount()
    {
        $this->webpushNotifier(WebpushSubscribed::class);
    }

    public function render()
    {
        return view('livewire.web.blessing-index');
    }
}
