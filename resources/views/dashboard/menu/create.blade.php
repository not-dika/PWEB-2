<x-layouts.app :title="__('Create Menu')">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold mb-4">Create Menu</h1>

        <form action="{{ route('menu.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="menu_text">Menu Text</label>
                <input type="text" name="menu_text" id="menu_text" class="form-input w-full" value="{{ old('menu_text') }}">
            </div>

            <div>
                <label for="menu_icon">Menu Icon</label>
                <input type="text" name="menu_icon" id="menu_icon" class="form-input w-full" value="{{ old('menu_icon') }}">
            </div>

            <div>
                <label for="menu_url">Menu URL</label>
                <input type="text" name="menu_url" id="menu_url" class="form-input w-full" value="{{ old('menu_url') }}">
            </div>

            <div>
                <label for="menu_order">Menu Order</label>
                <input type="number" name="menu_order" id="menu_order" class="form-input w-full" value="{{ old('menu_order') }}">
            </div>

            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select w-full">
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-layouts.app>
