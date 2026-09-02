<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Deliberately seeds no testimonials. Real patient testimonials must come from
     * the client — AHPRA's National Law advertising guidelines restrict testimonials
     * about clinical care for regulated health services, and fabricating quotes
     * attributed to patients would misrepresent them regardless of disclaimers.
     * The public testimonials section on the homepage hides itself when empty.
     */
    public function run(): void
    {
        //
    }
}
