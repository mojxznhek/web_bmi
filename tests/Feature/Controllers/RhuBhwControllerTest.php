<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RhuBhw;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RhuBhwControllerTest extends TestCase
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
    public function it_displays_index_view_with_rhu_bhws()
    {
        $rhuBhws = RhuBhw::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('rhu-bhws.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.rhu_bhws.index')
            ->assertViewHas('rhuBhws');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rhu_bhw()
    {
        $response = $this->get(route('rhu-bhws.create'));

        $response->assertOk()->assertViewIs('app.rhu_bhws.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rhu_bhw()
    {
        $data = RhuBhw::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('rhu-bhws.store'), $data);

        $this->assertDatabaseHas('rhu_bhws', $data);

        $rhuBhw = RhuBhw::latest('id')->first();

        $response->assertRedirect(route('rhu-bhws.edit', $rhuBhw));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rhu_bhw()
    {
        $rhuBhw = RhuBhw::factory()->create();

        $response = $this->get(route('rhu-bhws.show', $rhuBhw));

        $response
            ->assertOk()
            ->assertViewIs('app.rhu_bhws.show')
            ->assertViewHas('rhuBhw');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rhu_bhw()
    {
        $rhuBhw = RhuBhw::factory()->create();

        $response = $this->get(route('rhu-bhws.edit', $rhuBhw));

        $response
            ->assertOk()
            ->assertViewIs('app.rhu_bhws.edit')
            ->assertViewHas('rhuBhw');
    }

    /**
     * @test
     */
    public function it_updates_the_rhu_bhw()
    {
        $rhuBhw = RhuBhw::factory()->create();

        $data = [
            'completename' => $this->faker->text(255),
            'profession' => $this->faker->text(255),
            'license_no' => $this->faker->text(255),
        ];

        $response = $this->put(route('rhu-bhws.update', $rhuBhw), $data);

        $data['id'] = $rhuBhw->id;

        $this->assertDatabaseHas('rhu_bhws', $data);

        $response->assertRedirect(route('rhu-bhws.edit', $rhuBhw));
    }

    /**
     * @test
     */
    public function it_deletes_the_rhu_bhw()
    {
        $rhuBhw = RhuBhw::factory()->create();

        $response = $this->delete(route('rhu-bhws.destroy', $rhuBhw));

        $response->assertRedirect(route('rhu-bhws.index'));

        $this->assertDeleted($rhuBhw);
    }
}
