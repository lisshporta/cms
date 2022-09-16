<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;

it('can render the registration page', function () {
    if (! Features::enabled(Features::registration())) {
        return $this->markTestSkipped('Registration support is not enabled.');
    }

    $response = $this->get('/register');

    $response->assertStatus(200);
})->group('auth');

it('cannot render the registration page if support is disabled', function () {
    if (Features::enabled(Features::registration())) {
        return $this->markTestSkipped('Registration support is enabled.');
    }

    $response = $this->get('/register');

    $response->assertStatus(404);
})->group('auth');

it('can register new users', function () {
    if (! Features::enabled(Features::registration())) {
        return $this->markTestSkipped('Registration support is not enabled.');
    }

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'domain' => 'test_user',
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
})->group('auth');
