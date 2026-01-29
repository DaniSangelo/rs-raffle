<?php

use App\Livewire\Raffle\Create;
use App\Models\Raffle;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;

it('should create a new raffle', function () {
    Livewire::test(Create::class)
        ->set('name', 'Raflle One')
        ->call('handle')
        ->assertDispatched('raffle::refresh')
        ->assertSet('name', '');

    assertDatabaseHas('raffles', [
        'name' => 'Raflle One',
    ]);
});

describe('validations', function() {
    it('should validate name as required param', function() {
        Livewire::test(Create::class)
            ->set('name', '')
            ->call('handle')
            ->assertHasErrors(['name' => 'required']);
    });

    it('should validate name as min 3 chars param', function() {
        Livewire::test(Create::class)
            ->set('name', 'ab')
            ->call('handle')
            ->assertHasErrors(['name' => 'min']);
    });

    it('should validate name as max 255 chars param', function() {
        Livewire::test(Create::class)
            ->set('name', str_repeat('a', 256))
            ->call('handle')
            ->assertHasErrors(['name' => 'max']);
    });

    it('should validate name as unique param', function() {
        $raffle = Raffle::factory()->create();
        Livewire::test(Create::class)
            ->set('name', $raffle->name)
            ->call('handle')
            ->assertHasErrors(['name' => 'unique']);
    });

});