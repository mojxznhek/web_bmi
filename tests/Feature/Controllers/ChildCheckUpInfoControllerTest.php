<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ChildCheckUpInfo;

use App\Models\Child;
use App\Models\BarioPhysician;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChildCheckUpInfoControllerTest extends TestCase
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
    public function it_displays_index_view_with_child_check_up_infos()
    {
        $childCheckUpInfos = ChildCheckUpInfo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('child-check-up-infos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.child_check_up_infos.index')
            ->assertViewHas('childCheckUpInfos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_child_check_up_info()
    {
        $response = $this->get(route('child-check-up-infos.create'));

        $response->assertOk()->assertViewIs('app.child_check_up_infos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_child_check_up_info()
    {
        $data = ChildCheckUpInfo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('child-check-up-infos.store'), $data);

        $this->assertDatabaseHas('child_check_up_infos', $data);

        $childCheckUpInfo = ChildCheckUpInfo::latest('id')->first();

        $response->assertRedirect(
            route('child-check-up-infos.edit', $childCheckUpInfo)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_child_check_up_info()
    {
        $childCheckUpInfo = ChildCheckUpInfo::factory()->create();

        $response = $this->get(
            route('child-check-up-infos.show', $childCheckUpInfo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.child_check_up_infos.show')
            ->assertViewHas('childCheckUpInfo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_child_check_up_info()
    {
        $childCheckUpInfo = ChildCheckUpInfo::factory()->create();

        $response = $this->get(
            route('child-check-up-infos.edit', $childCheckUpInfo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.child_check_up_infos.edit')
            ->assertViewHas('childCheckUpInfo');
    }

    /**
     * @test
     */
    public function it_updates_the_child_check_up_info()
    {
        $childCheckUpInfo = ChildCheckUpInfo::factory()->create();

        $child = Child::factory()->create();
        $barioPhysician = BarioPhysician::factory()->create();

        $data = [
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'remarks' => $this->faker->text(255),
            'checkup_followup' => $this->faker->date,
            'bmi' => $this->faker->randomNumber(1),
            'diagnosis' => $this->faker->text,
            'child_id' => $child->id,
            'bario_physician_id' => $barioPhysician->id,
        ];

        $response = $this->put(
            route('child-check-up-infos.update', $childCheckUpInfo),
            $data
        );

        $data['id'] = $childCheckUpInfo->id;

        $this->assertDatabaseHas('child_check_up_infos', $data);

        $response->assertRedirect(
            route('child-check-up-infos.edit', $childCheckUpInfo)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_child_check_up_info()
    {
        $childCheckUpInfo = ChildCheckUpInfo::factory()->create();

        $response = $this->delete(
            route('child-check-up-infos.destroy', $childCheckUpInfo)
        );

        $response->assertRedirect(route('child-check-up-infos.index'));

        $this->assertDeleted($childCheckUpInfo);
    }
}
