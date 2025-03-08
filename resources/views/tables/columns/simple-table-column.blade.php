<div class="overflow-x-auto">
    <table class="w-80 table-fixed border border-gray-300">
        <tbody>
        @foreach ($getState() as [$label, $value])
            <tr class="border-b border-gray-300">
                <td class="p-2 w-2/3 font-medium bg-gray-100 truncate">{{ $label }}</td>
                <td class="p-2 w-1/3 text-center">{{ $value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
