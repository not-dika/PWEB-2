<x-layouts.app :title="__('Create Menu')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Create New Menu</flux:heading>
        <flux:subheading size="lg" class="mb-6">Add a new menu to the system</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session()->has('success'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @elseif(session()->has('error'))
        <flux:badge color="red" class="mb-3 w-full">{{ session('error') }}</flux:badge>
    @endif

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf

        <flux:input label="Menu Text" name="menu_text" value="{{ old('menu_text') }}" class="mb-3" required />

        <flux:input label="Menu Icon" name="menu_icon" value="{{ old('menu_icon') }}" class="mb-3"
            helper="Optional. Use icon classes from FontAwesome or other libraries" />

        <flux:input label="Menu URL" name="menu_url" value="{{ old('menu_url') }}" class="mb-3" required />

        <flux:input type="number" label="Menu Order" name="menu_order" value="{{ old('menu_order', 0) }}"
            class="mb-3" min="0" />

        <flux:select label="Status" name="status" class="mb-3">
            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </flux:select>

        <flux:separator class="my-4" />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Create Menu</flux:button>
            <flux:link href="{{ route('menu.index') }}" variant="ghost" class="ml-3">Cancel</flux:link>
        </div>
    </form>
</x-layouts.app>
