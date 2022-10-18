<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="text-sm leading-5 text-gray-900">{{ $donate->title }}</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
        <a href="{{ route('admin.donates.edit', $donate->id) }}" class="text-gray-600 hover:text-gray-900">Edit</a>
        <form action="{{ route('admin.donates.destroy', $donate->id) }}" , method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-red-600 hover:text-red-900">Delete
            </button>
        </form>
    </td>
</tr>
