<?php

namespace App\Livewire;

use App\Actions\SaveBlessing;
use App\Models\Blessing;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
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
    public ?int $editing = null;

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

    function addBlessing(SaveBlessing $saver)
    {
        if (empty($this->description)) {
            return;
        }

        $blessing = $this->editing ? Blessing::find($this->editing) : new Blessing();
        $blessing->description = $this->description;
        $blessing->date = $this->date;

        $saver(user: $this->user, blessing: $blessing);

        $this->description = '';
        $this->editing = null;

        $this->dispatch('blessing-created');
    }

    function remove(?Blessing $blessing = null)
    {
        if (! $blessing) return;

        $blessing->delete();
    }

    function edit(?Blessing $blessing = null)
    {
        if (! $blessing) return;

        $this->description = $blessing->description;
        $this->editing = $blessing->id;
    }

    #[Layout('components.layouts.page')]
    public function render()
    {
        return view('livewire.home', [
            'carbonDate' => $this->carbonDate,
            'blessingCount' => Blessing::count(),
            'blessings' => Blessing::getDate($this->date),
        ]);
    }
}
