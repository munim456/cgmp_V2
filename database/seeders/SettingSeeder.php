<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'clinic_name' => 'Cringila General Medical Practice',
            'tagline' => 'Healthcare for Every Generation',
            'address_line1' => '[Street address — verify with practice]',
            'address_suburb' => 'Cringila NSW 2502',
            'phone' => '(02) 0000 0000',
            'contact_email' => 'reception@cgmp.com.au',
            'fax' => '',
            'opening_hours' => "Monday - Friday: 8:30am - 5:30pm\nSaturday: Closed\nSunday & public holidays: Closed",
            'emergency_note' => 'In a medical emergency, call 000 immediately.',
            'healthengine_url' => '',
            'facebook_url' => '',
            'instagram_url' => '',
            'google_map_embed' => '',
            'footer_text' => 'Cringila General Medical Practice provides comprehensive primary care to individuals and families in Cringila and the surrounding Illawarra communities.',
            'copyright_text' => '',
            'analytics_code' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
