<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CarControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testCarCreation()
    {
        $user = User::factory()->create([
            'email' => 'test@abv.bg',
            'password' => bcrypt('test1'),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('admin.car.store'), [
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
        ]);

        $response->assertStatus(302);
    }

    public function testCarUpdate()
    {
        $user = User::factory()->create([
            'email' => 'test2@abv.com',
            'password' => bcrypt('test2'),
        ]);

        $this->actingAs($user);

        $car = new Car([
            'make' => 'Audi',
            'model' => 'A4',
            'year' => 2015,
        ]);

        $car->user()->associate($user);
        $car->save();

        $response = $this->post(route('admin.car.update', ['id' => $car->id]), [
            'make' => 'BMW',
            'model' => '320',
            'year' => 2020,
        ]);

        $response->assertStatus(302);
    }

    public function testCarEdit()
    {
        $user = User::factory()->create([
            'email' => 'test3@abv.com',
            'password' => bcrypt('test3'),
        ]);

        $car = new Car([
            'make' => 'Mercedes',
            'model' => 'CLS',
            'year' => 2004,
        ]);

        $car->user()->associate($user);
        $car->save();

        $this->actingAs($user);

        $response = $this->get(route('admin.car.edit', ['id' => $car->id]));

        $response->assertStatus(200);
    }

    public function testCarDeletion()
    {
        $user = User::factory()->create([
            'email' => 'test4@abv.com',
            'password' => bcrypt('test4'),
        ]);

        $car = new Car([
            'make' => 'Tesla',
            'model' => 'Model X',
            'year' => 2021,
        ]);

        $car->user()->associate($user);
        $car->save();

        $this->actingAs($user);

        $response = $this->get(route('admin.car.destroy', ['id' => $car->id]));

        $response->assertStatus(302);
    }
}
