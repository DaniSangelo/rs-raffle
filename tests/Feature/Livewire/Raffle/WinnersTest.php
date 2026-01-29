<?php

use App\Livewire\Raffle\Winners;
use App\Models\Applicant;
use App\Models\Raffle;
use Livewire\Livewire;

it('should bring all winners from a raffle with show false', function () {
    $raffle = Raffle::factory()->create();
    $applicant = Applicant::factory()->create([
        'raffle_id' => $raffle->id,
        'email' => 'joe@doe.com'
    ]);

    $applicant = $raffle->applicants->first();
    $raffle->winners()->create(['applicant_id' => $applicant->id]);

    Livewire::test(Winners::class, ['raffle' => $raffle, 'show' => false])
        ->assertSet('winners', function ($winners) {
            expect($winners)->toHaveCount(1);
            expect($winners)->first()->toBe('jo*@doe.com');
            return true;
        });
});

it('should bring all winners from a raffle', function () {
    $raffle = Raffle::factory()->create();
    $applicant = Applicant::factory()->create([
        'raffle_id' => $raffle->id,
        'email' => 'joe@doe.com'
    ]);

    $applicant = $raffle->applicants->first();
    $raffle->winners()->create(['applicant_id' => $applicant->id]);

    Livewire::test(Winners::class, ['raffle' => $raffle])
        ->assertSet('winners', function ($winners) {
            expect($winners)->toHaveCount(1);
            expect($winners)->first()->toBe('joe@doe.com');
            return true;
        });
});