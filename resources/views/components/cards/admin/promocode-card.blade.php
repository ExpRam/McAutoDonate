<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="text-sm leading-5 text-gray-900">{{ $promocode->promocode }}</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
        <a href="{{ route('admin.promocodes.edit', $promocode->id) }}"
           class="text-gray-600 hover:text-gray-900">Edit</a>
        <form action="{{ route('admin.promocodes.destroy', $promocode->id) }}" , method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-red-600 hover:text-red-900">Delete
            </button>
        </form>
    </td>
</tr>
