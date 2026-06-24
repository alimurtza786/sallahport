<?php

namespace Tests\Feature;

use App\Models\Airport;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\SalahPortSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([SalahPortSeeder::class, AdminUserSeeder::class]);
    }

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $this->post(route('admin.login.store'), [
            'email' => 'admin@salahport.com',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get(route('admin.dashboard'))->assertOk()->assertSee('Dashboard');
    }

    public function test_admin_can_create_prayer_room(): void
    {
        $admin = User::query()->where('email', 'admin@salahport.com')->firstOrFail();
        $airport = Airport::query()->firstOrFail();

        $this->actingAs($admin)
            ->post(route('admin.prayer-rooms.store'), [
                'airport_id' => $airport->id,
                'terminal' => 'Terminal 4',
                'location' => 'Near Gate Z1',
                'status' => 'Open 24/7',
                'gender_access' => 'Men & Women',
                'description' => 'New prayer room.',
                'sort_order' => 5,
            ])
            ->assertRedirect(route('admin.prayer-rooms.index'));

        $this->assertDatabaseHas('prayer_rooms', [
            'airport_id' => $airport->id,
            'terminal' => 'Terminal 4',
            'location' => 'Near Gate Z1',
        ]);
    }
}
