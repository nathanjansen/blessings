<?php

use Livewire\Livewire;

test('renders succesfuly', function () {
    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->assertStatus(200);
});

test('can add blessing', function() {
    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->set('description', 'My first blessing')
        ->call('addBlessing')
        ->assertSee('My first blessing');
});

test('can remove blessing', function() {

    \App\Models\Blessing::truncate();

    $blessing = app(\App\Actions\CreateBlessing::class)(
        'My first blessing',
        now()->format('Y-m-d')
    );

    $this->assertCount(1, \App\Models\Blessing::all());

    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->call('remove', $blessing)
        ->assertDontSee('My first blessing');
});

test('can go to next day', function() {

    \App\Models\Blessing::truncate();

    $blessing = app(\App\Actions\CreateBlessing::class)(
        'My first blessing',
        now()->format('Y-m-d')
    );

    $this->assertCount(1, \App\Models\Blessing::all());

    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->call('remove', $blessing)
        ->assertDontSee('My first blessing');
});


test('cannot go to next day when the current day is today', function() {

    \Carbon\Carbon::setTestNow('2023-01-01');

    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->set('date', now()->format('Y-m-d'))
        ->call('nextDay')
        ->assertSet('date', '2023-01-01');
});

test('can go to next day when the next day is before today', function() {

    \Carbon\Carbon::setTestNow('2023-01-01');

    Livewire::test(\App\Livewire\BlessingIndex::class)
        ->set('date', now()->subDays(2)->format('Y-m-d'))
        ->call('nextDay')
        ->assertSet('date', '2022-12-31');
});
