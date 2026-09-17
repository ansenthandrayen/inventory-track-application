<?php

namespace Tests\Feature;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EquipmentTest extends TestCase
{
    use RefreshDatabase;

    // Crée un utilisateur connecté avant chaque test
    private function authenticatedUser()
    {
        $user = User::factory()->create();
        return $this->actingAs($user);
    }

    // ✅ Test 1 — La liste est accessible
    public function test_equipment_list_is_accessible(): void
    {
        $this->authenticatedUser()
             ->get(route('equipments.index'))
             ->assertStatus(200);
    }

    // ✅ Test 2 — Un visiteur non connecté est redirigé vers login
    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('equipments.index'))
             ->assertRedirect(route('login'));
    }

    // ✅ Test 3 — On peut créer un équipement
    public function test_equipment_can_be_created(): void
    {
        $this->authenticatedUser()
             ->post(route('equipments.store'), [
                 'name'          => 'MacBook Pro',
                 'category'      => 'Ordinateur portable',
                 'serial_number' => 'MBP-TEST-001',
                 'location'      => 'Bureau 1A',
                 'status'        => 'disponible',
                 'notes'         => 'Test',
             ])
             ->assertRedirect(route('equipments.index'));

        $this->assertDatabaseHas('equipments', [
            'name'          => 'MacBook Pro',
            'serial_number' => 'MBP-TEST-001',
        ]);
    }

    // ✅ Test 4 — La validation bloque un formulaire vide
    public function test_equipment_creation_requires_name(): void
    {
        $this->authenticatedUser()
             ->post(route('equipments.store'), [
                 'name' => '',
             ])
             ->assertSessionHasErrors('name');
    }

    // ✅ Test 5 — On peut voir le détail d'un équipement
    public function test_equipment_can_be_shown(): void
    {
        $equipment = Equipment::factory()->create();

        $this->authenticatedUser()
             ->get(route('equipments.show', $equipment))
             ->assertStatus(200)
             ->assertSee($equipment->name);
    }

    // ✅ Test 6 — On peut modifier un équipement
    public function test_equipment_can_be_updated(): void
    {
        $equipment = Equipment::factory()->create();

        $this->authenticatedUser()
             ->put(route('equipments.update', $equipment), [
                 'name'          => 'Nouveau Nom',
                 'category'      => $equipment->category,
                 'serial_number' => $equipment->serial_number,
                 'location'      => $equipment->location,
                 'status'        => $equipment->status,
                 'notes'         => $equipment->notes,
             ])
             ->assertRedirect(route('equipments.index'));

        $this->assertDatabaseHas('equipments', [
            'id'   => $equipment->id,
            'name' => 'Nouveau Nom',
        ]);
    }

    // ✅ Test 7 — On peut supprimer un équipement
    public function test_equipment_can_be_deleted(): void
    {
        $equipment = Equipment::factory()->create();

        $this->authenticatedUser()
             ->delete(route('equipments.destroy', $equipment))
             ->assertRedirect(route('equipments.index'));

        $this->assertDatabaseMissing('equipments', [
            'id' => $equipment->id,
        ]);
    }

    // ✅ Test 8 — L'API retourne du JSON
    public function test_api_returns_equipments_as_json(): void
    {
        Equipment::factory()->count(3)->create();

        $this->getJson('/api/equipments')
             ->assertStatus(200)
             ->assertJsonStructure([
                 'success',
                 'count',
                 'data',
             ]);
    }
}