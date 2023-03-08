@props([
    'count' => 0,
    'cols' => [],
])

@if ($count and $cols and $count > 0 and !empty($cols))
    <table class="w-full text-xs table-auto">
        <thead>
            <tr class="border-b-2 border-neutral-100">
                @foreach ($cols as $col)
                    <th class="px-2 py-2 {{ $col['align'] ?? 'text-left' }} {{ $col['width'] ?? '' }}">{{ $col['name'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            {{ $slot }}
        </tbody>
    </table>
@else
    <div class="w-full p-10 space-y-2 bg-neutral-100 rounded-xl flex_col_center">
        <x-icon.sparkles stroke="stroke-1" class="text-orange-400"/>
        <p class="text-xs font-light">No data</p>
    </div>
@endif
