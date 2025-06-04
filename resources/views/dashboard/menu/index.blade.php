<x-layouts.app :title="__('Menus')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Menu</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage Menu</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('menu.index') }}" method="get">
            <flux:input icon="magnifying-glass" name="q" value="{{ request('q') }}" placeholder="Search Menus" />
        </form>
        <flux:button icon="plus">
            <flux:link href="{{ route('menu.create') }}" variant="subtle">Add New Menu</flux:link>
        </flux:button>
    </div>

    @if (session('success'))
        <flux:badge color="lime" class="mb-4 w-full">{{ session('success') }}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white text-black border border-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-xs font-semibold uppercase">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Text</th>
                    <th class="px-4 py-2 border">Icon</th>
                    <th class="px-4 py-2 border">URL</th>
                    <th class="px-4 py-2 border">Order</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-black bg-white">
                @foreach ($menus as $index => $menu)
                    <tr class="border-t">
                        <td class="px-4 py-2 border text-center align-middle">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border text-center align-middle">{{ $menu->menu_text }}</td>
                        <td class="px-4 py-2 border text-center align-middle">{{ $menu->menu_icon ?? '-' }}</td>
                        <td class="px-4 py-2 border text-center align-middle">{{ $menu->menu_url }}</td>
                        <td class="px-4 py-2 border text-center align-middle">{{ $menu->menu_order }}</td>
                        <td class="px-4 py-2 border text-center align-middle">
                            <span
                                class="px-2 py-1 text-xs rounded inline-block {{ $menu->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $menu->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border text-center align-middle">
                            <div class="flex justify-center">
                                <flux:dropdown>
                                    <flux:button icon:trailing="chevron-down">Actions</flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="pencil" href="{{ route('menu.edit', $menu->id) }}">Edit
                                        </flux:menu.item>
                                        <flux:menu.item icon="trash" variant="danger"
                                            onclick="event.preventDefault(); if(confirm('Are you sure to delete this menu?')) document.getElementById('delete-menu-{{ $menu->id }}').submit();">
                                            Delete
                                        </flux:menu.item>
                                        <form id="delete-menu-{{ $menu->id }}"
                                            action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </flux:menu>
                                </flux:dropdown>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-layouts.app>
