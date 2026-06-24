<?php

namespace Tests\Feature;

use App\Models\Airport;
use App\Models\Guide;
use Database\Seeders\SalahPortSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalahPortPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SalahPortSeeder::class);
    }

    public function test_homepage_loads_successfully(): void
    {
        $this->get(route('home'))->assertOk()->assertSee('Never Miss a Salah');
    }

    public function test_airports_index_loads(): void
    {
        $this->get(route('airports.index'))->assertOk()->assertSee('Airports');
    }

    public function test_airport_show_page_loads(): void
    {
        $airport = Airport::query()->where('code', 'DXB')->firstOrFail();

        $this->get(route('airports.show', $airport))
            ->assertOk()
            ->assertSee('Dubai International')
            ->assertSee('Prayer Rooms');
    }

    public function test_airport_search_filters_results(): void
    {
        $this->get(route('airports.index', ['q' => 'Dubai']))
            ->assertOk()
            ->assertSee('DXB');
    }

    public function test_guides_index_and_show_load(): void
    {
        $guide = Guide::query()->firstOrFail();

        $this->get(route('guides.index'))->assertOk()->assertSee('Helpful Guides');
        $this->get(route('guides.show', $guide))->assertOk()->assertSee($guide->title);
    }

    public function test_community_page_loads_and_accepts_updates(): void
    {
        $airport = Airport::query()->firstOrFail();

        $this->get(route('community.index'))->assertOk()->assertSee('Community Updates');

        $this->post(route('community.store'), [
            'airport_id' => $airport->id,
            'author_name' => 'Test User',
            'body' => 'Great prayer room near Gate A.',
        ])->assertRedirect()->assertSessionHas('success');
    }

    public function test_static_pages_load(): void
    {
        $this->get(route('about'))->assertOk();
        $this->get(route('contact'))->assertOk();
        $this->get(route('privacy'))->assertOk();
        $this->get(route('tips'))->assertOk();
        $this->get(route('app'))->assertOk();
        $this->get(route('airports.map'))->assertOk();
    }

    public function test_newsletter_subscription(): void
    {
        $this->post(route('newsletter.store'), [
            'email' => 'traveler@example.com',
        ])->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'traveler@example.com',
        ]);
    }

    public function test_sitemap_returns_xml(): void
    {
        $this->get(route('sitemap'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');
    }
}
