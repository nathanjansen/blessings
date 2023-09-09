<?php

namespace App\Livewire;

use App\Actions\CreateBlessing;
use App\Models\Blessing;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

/**
 * @property Carbon $carbonDate
 * @property User $user
 */
class Home extends Component
{
    #[Url(history: true, keep: true)]
    public string $date;
    public string $description = '';

    public function mount()
    {
        $this->date ??= now()->format('Y-m-d');
    }

    #[Computed]
    public function carbonDate(): Carbon
    {
        return now()->parse($this->date);
    }

    #[Computed]
    public function user(): User
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return auth()->user();
    }

    function nextDay()
    {
        if (!$this->hasNextDay()) return;

        $this->date = $this->carbonDate->addDay()->format('Y-m-d');
    }

    function hasNextDay()
    {
        return $this->carbonDate < now()->subDay();
    }

    function previousDay()
    {
        $this->date = $this->carbonDate->subDay()->format('Y-m-d');
    }

    function addBlessing(CreateBlessing $creator)
    {
        $creator(user: $this->user, description: $this->description, date: $this->date);

        $this->description = '';
    }

    function remove(Blessing $blessing)
    {
        $blessing->delete();
    }

    public function render()
    {
        return view('livewire.index', [
            'carbonDate' => $this->carbonDate,
            'blessingCount' => Blessing::count(),
            'blessings' => Blessing::getDate($this->date),
        ]);
    }
}
