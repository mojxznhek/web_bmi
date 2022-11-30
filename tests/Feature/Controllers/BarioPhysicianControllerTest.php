<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BarioPhysician;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarioPhysicianControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_bario_physicians()
    {
        $barioPhysicians = BarioPhysician::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('bario-physicians.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.bario_physicians.index')
            ->assertViewHas('barioPhysicians');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_bario_physician()
    {
        $response = $this->get(route('bario-physicians.create'));

        $response->assertOk()->assertViewIs('app.bario_physicians.create');
    }

    /**
     * @test
     */
    public function it_stores_the_bario_physician()
    {
        $data = BarioPhysician::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('bario-physicians.store'), $data);

        $this->assertDatabaseHas('bario_physicians', $data);

        $barioPhysician = BarioPhysician::latest('id')->first();

        $response->assertRedirect(
            route('bario-physicians.edit', $barioPhysician)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_bario_physician()
    {
        $barioPhysician = BarioPhysician::factory()->create();

        $response = $this->get(route('bario-physicians.show', $barioPhysician));

        $response
            ->assertOk()
            ->assertViewIs('app.bario_physicians.show')
            ->assertViewHas('barioPhysician');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_bario_physician()
    {
        $barioPhysician = BarioPhysician::factory()->create();

        $response = $this->get(route('bario-physicians.edit', $barioPhysician));

        $response
            ->assertOk()
            ->assertViewIs('app.bario_physicians.edit')
            ->assertViewHas('barioPhysician');
    }

    /**
     * @test
     */
    public function it_updates_the_bario_physician()
    {
        $barioPhysician = BarioPhysician::factory()->create();

        $data = [
            'completename' => $this->faker->text(255),
            'profession' => $this->faker->text(255),
            'license_no' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('bario-physicians.update', $barioPhysician),
            $data
        );

        $data['id'] = $barioPhysician->id;

        $this->assertDatabaseHas('bario_physicians', $data);

        $response->assertRedirect(
            route('bario-physicians.edit', $barioPhysician)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_bario_physician()
    {
        $barioPhysician = BarioPhysician::factory()->create();

        $response = $this->delete(
            route('bario-physicians.destroy', $barioPhysician)
        );

        $response->assertRedirect(route('bario-physicians.index'));

        $this->assertDeleted($barioPhysician);
    }
}
