<x-layouts.app :title="__('Themes')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Themes</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Themes</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex justify-between items-center mb-4">
        <div>
            <form action="{{ route('themes.index') }}" method="get">
                @csrf
                <flux:input icon="magnifying-glass" name="q" value="{{ $q }}"
                    placeholder="Search Themes" />
            </form>
        </div>
        <div>
            <flux:button icon="plus">
                <flux:link href="{{ route('themes.create') }}" variant="subtle">Add New Themes</flux:link>
            </flux:button>
        </div>
    </div>

    @if (session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ID</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Name</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Folder</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Created At</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Updated At</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->id }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->description }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->folder }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->status }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->created_at }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            {{ $theme->updated_at }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                            <flux:dropdown>
                                <flux:button icon:trailing="chevron-down">Actions</flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" href="{{ route('themes.edit', $theme) }}">Edit
                                    </flux:menu.item>
                                    <flux:menu.item icon="trash" variant="danger"
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus?')) document.getElementById('delete-theme-{{ $theme->id }}').submit();">
                                        Delete</flux:menu.item>
                                    <form id="delete-theme-{{ $theme->id }}"
                                        action="{{ route('themes.destroy', $theme) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </flux:menu>
                            </flux:dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
