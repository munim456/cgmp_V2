@props(['question', 'answer', 'open' => false])

<details @if($open) open @endif class="group rounded-2xl border border-[#E5E7EB] bg-white open:border-[#A8CFF0] transition-colors" data-reveal>
    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 text-[17px] font-bold text-[#1A2B49]">
        {{ $question }}
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F1F2F4] text-[#6B7280] transition-all duration-300 group-open:rotate-180 group-open:bg-[#1A2B49] group-open:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </span>
    </summary>
    <p class="border-t border-[#E5E7EB] px-6 pb-6 pt-5 leading-7 text-[#6B7280]">{{ $answer }}</p>
</details>
