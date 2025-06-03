<x-layouts.app :title="__('Edit Menu')">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold mb-4">Edit Menu</h1>

        <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="menu_text">Menu Text</label>
                <input type="text" name="menu_text" id="menu_text" class="form-input w-full" value="{{ old('menu_text', $menu->menu_text) }}">
            </div>

            <div>
                <label for="menu_icon">Menu Icon</label>
                <input type="text" name="menu_icon" id="menu_icon" class="form-input w-full" value="{{ old('menu_icon', $menu->menu_icon) }}">
            </div>

            <div>
                <label for="menu_url">Menu URL</label>
                <input type="text" name="menu_url" id="menu_url" class="form-input w-full" value="{{ old('menu_url', $menu->menu_url) }}">
            </div>

            <div>
                <label for="menu_order">Menu Order</label>
                <input type="number" name="menu_order" id="menu_order" class="form-input w-full" value="{{ old('menu_order', $menu->menu_order) }}">
            </div>

            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select w-full">
                    <option value="1" {{ old('status', $menu->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $menu->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-layouts.app>
