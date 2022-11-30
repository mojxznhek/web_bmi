<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\HealthTips;

use App\Models\HealthCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HealthTipsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_health_tips()
    {
        $allHealthTips = HealthTips::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-health-tips.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_health_tips.index')
            ->assertViewHas('allHealthTips');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_health_tips()
    {
        $response = $this->get(route('all-health-tips.create'));

        $response->assertOk()->assertViewIs('app.all_health_tips.create');
    }

    /**
     * @test
     */
    public function it_stores_the_health_tips()
    {
        $data = HealthTips::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-health-tips.store'), $data);

        $this->assertDatabaseHas('health_tips', $data);

        $healthTips = HealthTips::latest('id')->first();

        $response->assertRedirect(route('all-health-tips.edit', $healthTips));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_health_tips()
    {
        $healthTips = HealthTips::factory()->create();

        $response = $this->get(route('all-health-tips.show', $healthTips));

        $response
            ->assertOk()
            ->assertViewIs('app.all_health_tips.show')
            ->assertViewHas('healthTips');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_health_tips()
    {
        $healthTips = HealthTips::factory()->create();

        $response = $this->get(route('all-health-tips.edit', $healthTips));

        $response
            ->assertOk()
            ->assertViewIs('app.all_health_tips.edit')
            ->assertViewHas('healthTips');
    }

    /**
     * @test
     */
    public function it_updates_the_health_tips()
    {
        $healthTips = HealthTips::factory()->create();

        $healthCategory = HealthCategory::factory()->create();

        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text,
            'source' => $this->faker->text,
            'health_category_id' => $healthCategory->id,
        ];

        $response = $this->put(
            route('all-health-tips.update', $healthTips),
            $data
        );

        $data['id'] = $healthTips->id;

        $this->assertDatabaseHas('health_tips', $data);

        $response->assertRedirect(route('all-health-tips.edit', $healthTips));
    }

    /**
     * @test
     */
    public function it_deletes_the_health_tips()
    {
        $healthTips = HealthTips::factory()->create();

        $response = $this->delete(
            route('all-health-tips.destroy', $healthTips)
        );

        $response->assertRedirect(route('all-health-tips.index'));

        $this->assertDeleted($healthTips);
    }
}
