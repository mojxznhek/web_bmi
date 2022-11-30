<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Child;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChildControllerTest extends TestCase
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
    public function it_displays_index_view_with_children()
    {
        $children = Child::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('children.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.children.index')
            ->assertViewHas('children');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_child()
    {
        $response = $this->get(route('children.create'));

        $response->assertOk()->assertViewIs('app.children.create');
    }

    /**
     * @test
     */
    public function it_stores_the_child()
    {
        $data = Child::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('children.store'), $data);

        $this->assertDatabaseHas('children', $data);

        $child = Child::latest('id')->first();

        $response->assertRedirect(route('children.edit', $child));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_child()
    {
        $child = Child::factory()->create();

        $response = $this->get(route('children.show', $child));

        $response
            ->assertOk()
            ->assertViewIs('app.children.show')
            ->assertViewHas('child');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_child()
    {
        $child = Child::factory()->create();

        $response = $this->get(route('children.edit', $child));

        $response
            ->assertOk()
            ->assertViewIs('app.children.edit')
            ->assertViewHas('child');
    }

    /**
     * @test
     */
    public function it_updates_the_child()
    {
        $child = Child::factory()->create();

        $data = [
            'completename' => $this->faker->text(50),
            'dob' => $this->faker->date,
            'gender' => \Arr::random(['male', 'female']),
            'mothersName' => $this->faker->text(255),
            'address' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber,
        ];

        $response = $this->put(route('children.update', $child), $data);

        $data['id'] = $child->id;

        $this->assertDatabaseHas('children', $data);

        $response->assertRedirect(route('children.edit', $child));
    }

    /**
     * @test
     */
    public function it_deletes_the_child()
    {
        $child = Child::factory()->create();

        $response = $this->delete(route('children.destroy', $child));

        $response->assertRedirect(route('children.index'));

        $this->assertDeleted($child);
    }
}
