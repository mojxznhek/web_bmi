<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ChildMedicalData;

use App\Models\Child;
use App\Models\RhuBhw;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChildMedicalDataControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_child_medical_data()
    {
        $allChildMedicalData = ChildMedicalData::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-child-medical-data.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_child_medical_data.index')
            ->assertViewHas('allChildMedicalData');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_child_medical_data()
    {
        $response = $this->get(route('all-child-medical-data.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_child_medical_data.create');
    }

    /**
     * @test
     */
    public function it_stores_the_child_medical_data()
    {
        $data = ChildMedicalData::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-child-medical-data.store'), $data);

        $this->assertDatabaseHas('child_medical_data', $data);

        $childMedicalData = ChildMedicalData::latest('id')->first();

        $response->assertRedirect(
            route('all-child-medical-data.edit', $childMedicalData)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_child_medical_data()
    {
        $childMedicalData = ChildMedicalData::factory()->create();

        $response = $this->get(
            route('all-child-medical-data.show', $childMedicalData)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_child_medical_data.show')
            ->assertViewHas('childMedicalData');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_child_medical_data()
    {
        $childMedicalData = ChildMedicalData::factory()->create();

        $response = $this->get(
            route('all-child-medical-data.edit', $childMedicalData)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_child_medical_data.edit')
            ->assertViewHas('childMedicalData');
    }

    /**
     * @test
     */
    public function it_updates_the_child_medical_data()
    {
        $childMedicalData = ChildMedicalData::factory()->create();

        $child = Child::factory()->create();
        $rhuBhw = RhuBhw::factory()->create();

        $data = [
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'remarks' => $this->faker->text(255),
            'checkup_followup' => $this->faker->date,
            'bmi' => $this->faker->randomNumber(1),
            'diagnosis' => $this->faker->text,
            'child_id' => $child->id,
            'rhuBhw_id' => $rhuBhw->id,
        ];

        $response = $this->put(
            route('all-child-medical-data.update', $childMedicalData),
            $data
        );

        $data['id'] = $childMedicalData->id;

        $this->assertDatabaseHas('child_medical_data', $data);

        $response->assertRedirect(
            route('all-child-medical-data.edit', $childMedicalData)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_child_medical_data()
    {
        $childMedicalData = ChildMedicalData::factory()->create();

        $response = $this->delete(
            route('all-child-medical-data.destroy', $childMedicalData)
        );

        $response->assertRedirect(route('all-child-medical-data.index'));

        $this->assertDeleted($childMedicalData);
    }
}
