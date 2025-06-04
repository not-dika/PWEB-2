<x-layouts.app :title="__('Add New Theme')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Theme</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Themes</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('themes.store') }}" method="post">
        @csrf

        <flux:input label="Name" name="name" class="mb-3" />
        @error('name')
            <flux:badge color="red" class="mb-3 w-full">{{ $message }}</flux:badge>
        @enderror

        <flux:textarea label="Description" name="description" class="mb-3" />
        @error('description')
            <flux:badge color="red" class="mb-3 w-full">{{ $message }}</flux:badge>
        @enderror

        <flux:input label="Folder" name="folder" class="mb-3" />
        @error('folder')
            <flux:badge color="red" class="mb-3 w-full">{{ $message }}</flux:badge>
        @enderror

        <flux:select label="Status" name="status" class="mb-3">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </flux:select>
        @error('status')
            <flux:badge color="red" class="mb-3 w-full">{{ $message }}</flux:badge>
        @enderror

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Save</flux:button>
            <flux:link href="{{ route('themes.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>
