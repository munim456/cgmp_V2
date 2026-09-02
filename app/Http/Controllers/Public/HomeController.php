<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.home', [
            'hero' => section_data('hero'),
            'about' => section_data('about'),
            'bookingStrip' => section_data('booking_strip'),
            'latestPosts' => Post::query()->published()->with('category')->latest('published_at')->take(4)->get(),
            'services' => Service::active()->take(3)->get(),
            'doctors' => Doctor::active()->take(1)->get(),
            'faqs' => Faq::active()->take(6)->get(),
            'testimonials' => Testimonial::active()->get(),
        ]);
    }
}
