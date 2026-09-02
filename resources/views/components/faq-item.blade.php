@props(['question', 'answer', 'open' => false])

<details @if($open) open @endif class="group rounded-2xl border border-[#E5E7EB] bg-white open:border-[#A8CFF0] transition-colors">
    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 text-[17px] font-bold text-[#1A2B49]">
        {{ $question }}
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F1F2F4] text-lg font-bold leading-none text-[#6B7280] group-open:hidden">+</span>
        <span class="hidden h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#1A2B49] text-lg font-bold leading-none text-white group-open:flex">&minus;</span>
    </summary>
    <p class="border-t border-[#E5E7EB] px-6 pb-6 pt-5 leading-7 text-[#6B7280]">{{ $answer }}</p>
</details>
