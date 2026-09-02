<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $clinicUpdates = Category::query()->updateOrCreate(['slug' => 'clinic-updates'], ['name' => 'Clinic Updates']);
        $healthAdvice = Category::query()->updateOrCreate(['slug' => 'health-advice'], ['name' => 'Health Advice']);

        $author = User::query()->first();

        $posts = [
            [
                'category_id' => $clinicUpdates->id,
                'title' => 'Respiratory Symptoms? Please Wear a Mask When Visiting',
                'slug' => 'respiratory-symptoms-mask-notice',
                'excerpt' => 'To keep vulnerable patients safe, we kindly ask anyone with cough, cold or flu symptoms to wear a face mask while in the practice.',
                'body' => '<p>If you are experiencing acute respiratory symptoms such as a cough, cold or flu, please wear a face mask while in the practice. Masks are available at reception.</p><p>This helps protect our vulnerable patients, including young children, elderly patients, and those with chronic health conditions.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(9),
            ],
            [
                'category_id' => $healthAdvice->id,
                'title' => 'Diabetes Awareness: Know Your Risk',
                'slug' => 'diabetes-awareness-know-your-risk',
                'excerpt' => 'Around 1.3 million Australians live with diabetes and many more don\'t know they\'re at risk. Here\'s what to watch for and when to get checked.',
                'body' => '<p>Diabetes is one of the most common chronic conditions in Australia. Early diagnosis and management can significantly reduce the risk of complications.</p><p>Speak to your GP about a diabetes risk assessment, especially if you have a family history, are overweight, or are over 40.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(18),
            ],
            [
                'category_id' => $clinicUpdates->id,
                'title' => 'Same-Day Appointments & Walk-Ins: How Our Clinic Works',
                'slug' => 'same-day-appointments-and-walk-ins',
                'excerpt' => 'Open five days a week with same-day appointments and walk-ins welcome — here\'s how to be seen quickly at CGMP.',
                'body' => '<p>Cringila General Medical Practice is open five days a week. We offer same-day appointments subject to availability, and walk-ins are always welcome.</p><p>For the fastest service, we recommend booking online via HealthEngine or calling ahead.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(27),
            ],
        ];

        foreach ($posts as $post) {
            Post::query()->updateOrCreate(
                ['slug' => $post['slug']],
                $post + ['author_id' => $author?->id]
            );
        }
    }
}
