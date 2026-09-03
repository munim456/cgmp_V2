<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Support\ImageUploader;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function edit(): View
    {
        return view('admin.sections.edit', [
            'hero' => section_data('hero'),
            'about' => section_data('about'),
            'bookingStrip' => section_data('booking_strip'),
        ]);
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'heading' => ['required', 'string', 'max:255'],
            'subheading' => ['nullable', 'string', 'max:500'],
            'badge_text' => ['nullable', 'string', 'max:255'],
            'primary_button_text' => ['nullable', 'string', 'max:100'],
            'primary_button_link' => ['nullable', 'string', 'max:255'],
            'secondary_button_text' => ['nullable', 'string', 'max:100'],
            'secondary_button_link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:6144'],
        ]);

        $current = section_data('hero');
        unset($data['image']);

        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::store($request->file('image'), 'sections', 2000);
        } else {
            $data['image'] = $current['image'] ?? null;
        }

        Section::store('hero', $data);

        return redirect()->route('admin.sections.edit')->with('status', 'Hero section updated.');
    }

    public function updateAbout(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'heading' => ['required', 'string', 'max:255'],
            'subheading' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'points' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:6144'],
        ]);

        $current = section_data('about');
        $points = collect(explode("\n", (string) ($data['points'] ?? '')))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();

        $payload = [
            'heading' => $data['heading'],
            'subheading' => $data['subheading'] ?? ($current['subheading'] ?? ''),
            'body' => $data['body'] ?? '',
            'points' => $points,
            'stats' => $current['stats'] ?? [],
            'image' => $current['image'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $payload['image'] = ImageUploader::store($request->file('image'), 'sections', 2000);
        }

        Section::store('about', $payload);

        return redirect()->route('admin.sections.edit')->with('status', 'About section updated.');
    }

    public function updateBookingStrip(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'heading' => ['required', 'string', 'max:255'],
            'text' => ['nullable', 'string', 'max:500'],
            'button_text' => ['nullable', 'string', 'max:100'],
        ]);

        Section::store('booking_strip', $data);

        return redirect()->route('admin.sections.edit')->with('status', 'Booking strip updated.');
    }
}
