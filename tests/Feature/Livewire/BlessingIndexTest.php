<?php

use App\Actions\SaveBlessing;
use App\Livewire\BlessingIndex;
use App\Models\Blessing;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

it('renders succesfuly', function () {
    $user = User::factory()->create();

    actingAs($user);

    Livewire::test(BlessingIndex::class)
        ->assertStatus(200);
});

it('can add blessing', function () {
    $user = User::factory()->create();

    actingAs($user);

    Livewire::test(BlessingIndex::class)
        ->set('description', 'My first blessing')
        ->call('addBlessing')
        ->assertSee('My first blessing');
});

it('can remove blessing', function () {

    Blessing::truncate();

    $user = User::factory()->create();

    actingAs($user);

    $blessing = app(SaveBlessing::class)(
        $user,
        'My first blessing',
        now()->format('Y-m-d')
    );

    $this->assertCount(1, Blessing::all());

    Livewire::test(BlessingIndex::class)
        ->call('remove', $blessing)
        ->assertDontSee('My first blessing');
});

it('can go to next day', function () {

    Blessing::truncate();

    $user = User::factory()->create();

    actingAs($user);

    $blessing = app(SaveBlessing::class)(
        $user,
        'My first blessing',
        now()->format('Y-m-d')
    );

    $this->assertCount(1, Blessing::all());

    Livewire::test(BlessingIndex::class)
        ->call('remove', $blessing)
        ->assertDontSee('My first blessing');
});


it('cannot go to next day when the current day is today', function () {

    Carbon::setTestNow('2023-01-01');

    $user = User::factory()->create();

    actingAs($user);

    Livewire::test(BlessingIndex::class)
        ->set('date', now()->format('Y-m-d'))
        ->call('nextDay')
        ->assertSet('date', '2023-01-01');
});

it('can go to next day when the next day is before today', function () {

    Carbon::setTestNow('2023-01-01');

    $user = User::factory()->create();

    actingAs($user);

    Livewire::test(BlessingIndex::class)
        ->set('date', now()->subDays(2)->format('Y-m-d'))
        ->call('nextDay')
        ->assertSet('date', '2022-12-31');
});
