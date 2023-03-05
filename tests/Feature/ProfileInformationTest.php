<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;

it('can show the current profile information', function () {
    $this->actingAs($user = User::factory()->create());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    $this->assertEquals($user->name, $component->state['name']);
    $this->assertEquals($user->email, $component->state['email']);
})->group('profile');

it('can update the profile name and email', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com', 'description' => 'testing description'])
        ->call('updateProfileInformation');

    $this->assertEquals('Test Name', $user->fresh()->name);
    $this->assertEquals('test@example.com', $user->fresh()->email);
})->group('profile');
