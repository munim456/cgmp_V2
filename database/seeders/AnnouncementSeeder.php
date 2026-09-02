<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'message' => 'If you have respiratory symptoms such as cough, cold or flu, please wear a face mask while in the practice. Masks are available at reception.',
                'type' => 'info',
            ],
            [
                'message' => 'Diabetes affects around 1.3 million Australians. Ask your GP about a diabetes risk check at your next visit.',
                'type' => 'info',
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::query()->updateOrCreate(
                ['message' => $announcement['message']],
                $announcement + ['is_active' => true]
            );
        }
    }
}
