<?php

namespace Database\Seeders;

use App\Models\Airport;
use App\Models\CommunityUpdate;
use App\Models\Guide;
use App\Models\PrayerRoom;
use App\Models\TravelerTip;
use App\Models\WuduFacility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SalahPortSeeder extends Seeder
{
    public function run(): void
    {
        $airports = [
            [
                'name' => 'Dubai International',
                'code' => 'DXB',
                'slug' => 'dubai-international',
                'city' => 'Dubai',
                'country' => 'UAE',
                'description' => 'Dubai International Airport is one of the world\'s busiest airports and offers excellent Muslim traveler facilities including multiple prayer rooms and wudu areas across all terminals.',
                'image' => null,
                'rating' => 4.8,
                'reviews_count' => 128,
                'terminals_count' => 3,
                'latitude' => 25.2532,
                'longitude' => 55.3657,
                'qibla_degrees' => 245,
                'is_featured' => true,
                'prayer_times' => [
                    ['name' => 'Fajr', 'time' => '5:12 AM'],
                    ['name' => 'Dhuhr', 'time' => '12:35 PM'],
                    ['name' => 'Asr', 'time' => '3:48 PM'],
                    ['name' => 'Maghrib', 'time' => '6:22 PM'],
                    ['name' => 'Isha', 'time' => '7:52 PM'],
                ],
            ],
            [
                'name' => 'Istanbul Airport',
                'code' => 'IST',
                'slug' => 'istanbul-airport',
                'city' => 'Istanbul',
                'country' => 'Turkey',
                'description' => 'Istanbul Airport features modern prayer facilities designed for the millions of Muslim travelers passing through each year.',
                'image' => null,
                'rating' => 4.7,
                'reviews_count' => 96,
                'terminals_count' => 1,
                'latitude' => 41.2753,
                'longitude' => 28.7519,
                'qibla_degrees' => 152,
                'is_featured' => true,
                'prayer_times' => [
                    ['name' => 'Fajr', 'time' => '4:45 AM'],
                    ['name' => 'Dhuhr', 'time' => '1:15 PM'],
                    ['name' => 'Asr', 'time' => '4:52 PM'],
                    ['name' => 'Maghrib', 'time' => '7:38 PM'],
                    ['name' => 'Isha', 'time' => '9:05 PM'],
                ],
            ],
            [
                'name' => 'Hamad International',
                'code' => 'DOH',
                'slug' => 'hamad-international',
                'city' => 'Doha',
                'country' => 'Qatar',
                'description' => 'Hamad International Airport offers world-class prayer rooms and wudu facilities with excellent signage throughout the terminal.',
                'image' => null,
                'rating' => 4.9,
                'reviews_count' => 112,
                'terminals_count' => 1,
                'latitude' => 25.2731,
                'longitude' => 51.6080,
                'qibla_degrees' => 248,
                'is_featured' => true,
                'prayer_times' => [
                    ['name' => 'Fajr', 'time' => '4:58 AM'],
                    ['name' => 'Dhuhr', 'time' => '12:18 PM'],
                    ['name' => 'Asr', 'time' => '3:35 PM'],
                    ['name' => 'Maghrib', 'time' => '6:08 PM'],
                    ['name' => 'Isha', 'time' => '7:38 PM'],
                ],
            ],
            [
                'name' => 'London Heathrow',
                'code' => 'LHR',
                'slug' => 'london-heathrow',
                'city' => 'London',
                'country' => 'UK',
                'description' => 'London Heathrow provides multi-faith prayer rooms across its terminals, with dedicated Muslim prayer facilities and wudu areas.',
                'image' => null,
                'rating' => 4.5,
                'reviews_count' => 87,
                'terminals_count' => 4,
                'latitude' => 51.4700,
                'longitude' => -0.4543,
                'qibla_degrees' => 118,
                'is_featured' => true,
                'prayer_times' => [
                    ['name' => 'Fajr', 'time' => '3:42 AM'],
                    ['name' => 'Dhuhr', 'time' => '1:05 PM'],
                    ['name' => 'Asr', 'time' => '5:18 PM'],
                    ['name' => 'Maghrib', 'time' => '8:45 PM'],
                    ['name' => 'Isha', 'time' => '10:22 PM'],
                ],
            ],
        ];

        foreach ($airports as $data) {
            Airport::query()->create($data);
        }

        $dxb = Airport::query()->where('code', 'DXB')->firstOrFail();

        $prayerRooms = [
            ['terminal' => 'Terminal 1', 'location' => 'Near Gate D6', 'description' => 'Spacious prayer room with separate sections for men and women. Wudu facilities available nearby.', 'photos' => ['room-1-a', 'room-1-b', 'room-1-c', 'room-1-d']],
            ['terminal' => 'Terminal 3', 'location' => 'Concourse A, Level 2', 'description' => 'Modern prayer facility with Qibla direction marked. Clean and well-maintained.', 'photos' => ['room-2-a', 'room-2-b', 'room-2-c', 'room-2-d']],
            ['terminal' => 'Terminal 2', 'location' => 'Near Food Court', 'description' => 'Conveniently located prayer room with ablution area. Signage in Arabic and English.', 'photos' => ['room-3-a', 'room-3-b', 'room-3-c', 'room-3-d']],
        ];

        foreach ($prayerRooms as $i => $room) {
            PrayerRoom::query()->create([
                'airport_id' => $dxb->id,
                'terminal' => $room['terminal'],
                'location' => $room['location'],
                'status' => 'Open 24/7',
                'gender_access' => 'Men & Women',
                'description' => $room['description'],
                'photos' => $room['photos'],
                'sort_order' => $i,
            ]);
        }

        $wuduFacilities = [
            ['terminal' => 'Terminal 1', 'location' => 'Adjacent to Prayer Room, Gate D6', 'description' => 'Modern wudu stations with hot and cold water. Separate facilities for men and women.'],
            ['terminal' => 'Terminal 3', 'location' => 'Concourse A, Level 2', 'description' => 'Recently renovated wudu area with foot-washing basins and private cubicles.'],
            ['terminal' => 'Terminal 2', 'location' => 'Near Food Court Prayer Room', 'description' => 'Standard wudu facilities with clear directional signage in Arabic and English.'],
        ];

        foreach ($wuduFacilities as $i => $facility) {
            WuduFacility::query()->create([
                'airport_id' => $dxb->id,
                ...$facility,
                'status' => 'Available 24/7',
                'sort_order' => $i,
            ]);
        }

        $tips = [
            ['title' => 'Halal Food', 'description' => 'Halal restaurants available in all terminals. Terminal 3 has the widest selection.'],
            ['title' => 'Wudu Facilities', 'description' => 'Wudu areas located adjacent to every prayer room. Bring a travel prayer mat for comfort.'],
            ['title' => 'Best Time to Pray', 'description' => 'Prayer rooms are least crowded between flight banks. Allow 15 minutes before boarding.'],
            ['title' => 'Family Friendly', 'description' => 'Family rooms available in Terminal 3 with space for children and stroller storage.'],
        ];

        foreach ($tips as $i => $tip) {
            TravelerTip::query()->create([
                'airport_id' => $dxb->id,
                ...$tip,
                'sort_order' => $i,
            ]);
        }

        $updates = [
            ['author_name' => 'Ahmed K.', 'body' => 'Terminal 3 prayer room is very clean. New wudu area added near Gate A12.', 'is_verified' => true, 'created_at' => now()->subHours(2)],
            ['author_name' => 'Fatima S.', 'body' => 'Great facility at DXB Terminal 1. Separate entrance for women. Highly recommended!', 'is_verified' => true, 'created_at' => now()->subHours(5)],
            ['author_name' => 'Omar R.', 'body' => 'Updated: Prayer room near Gate D6 now open 24/7. Signage improved.', 'is_verified' => true, 'created_at' => now()->subDay()],
        ];

        foreach ($updates as $update) {
            CommunityUpdate::query()->create([
                'airport_id' => $dxb->id,
                ...$update,
            ]);
        }

        $guides = [
            ['title' => 'How to Find Prayer Rooms in Any Airport', 'read_time' => '10 min read', 'image' => null, 'excerpt' => 'A complete guide to locating prayer facilities at airports worldwide.'],
            ['title' => 'Wudu Facilities Guide for Travelers', 'read_time' => '8 min read', 'image' => null, 'excerpt' => 'Everything you need to know about wudu facilities while traveling.'],
            ['title' => 'Best Airports for Muslim Travelers', 'read_time' => '12 min read', 'image' => null, 'excerpt' => 'Our top picks for airports with the best Muslim traveler amenities.'],
            ['title' => 'Prayer Times While Flying', 'read_time' => '6 min read', 'image' => null, 'excerpt' => 'How to calculate and observe prayer times during long-haul flights.'],
            ['title' => 'Halal Food at Major Airports', 'read_time' => '9 min read', 'image' => null, 'excerpt' => 'Where to find halal food options at the world\'s busiest airports.'],
        ];

        foreach ($guides as $guide) {
            Guide::query()->create([
                'title' => $guide['title'],
                'slug' => Str::slug($guide['title']),
                'excerpt' => $guide['excerpt'],
                'body' => '<p>'.$guide['excerpt'].'</p><p>This guide provides practical tips and step-by-step advice for Muslim travelers navigating airports worldwide. Whether you are transiting through a major hub or visiting a smaller regional airport, SalahPort helps you plan your journey with confidence.</p><p>Key topics covered include locating prayer rooms, finding wudu facilities, understanding airport layouts, and connecting with the Muslim traveler community for real-time updates.</p>',
                'image' => $guide['image'],
                'read_time' => $guide['read_time'],
                'published_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
