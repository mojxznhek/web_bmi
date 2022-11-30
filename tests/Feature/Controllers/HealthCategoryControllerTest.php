<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\HealthCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HealthCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_health_categories()
    {
        $healthCategories = HealthCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('health-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.health_categories.index')
            ->assertViewHas('healthCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_health_category()
    {
        $response = $this->get(route('health-categories.create'));

        $response->assertOk()->assertViewIs('app.health_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_health_category()
    {
        $data = HealthCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('health-categories.store'), $data);

        $this->assertDatabaseHas('health_categories', $data);

        $healthCategory = HealthCategory::latest('id')->first();

        $response->assertRedirect(
            route('health-categories.edit', $healthCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_health_category()
    {
        $healthCategory = HealthCategory::factory()->create();

        $response = $this->get(
            route('health-categories.show', $healthCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.health_categories.show')
            ->assertViewHas('healthCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_health_category()
    {
        $healthCategory = HealthCategory::factory()->create();

        $response = $this->get(
            route('health-categories.edit', $healthCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.health_categories.edit')
            ->assertViewHas('healthCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_health_category()
    {
        $healthCategory = HealthCategory::factory()->create();

        $data = [
            'cat_name' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('health-categories.update', $healthCategory),
            $data
        );

        $data['id'] = $healthCategory->id;

        $this->assertDatabaseHas('health_categories', $data);

        $response->assertRedirect(
            route('health-categories.edit', $healthCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_health_category()
    {
        $healthCategory = HealthCategory::factory()->create();

        $response = $this->delete(
            route('health-categories.destroy', $healthCategory)
        );

        $response->assertRedirect(route('health-categories.index'));

        $this->assertDeleted($healthCategory);
    }
}
