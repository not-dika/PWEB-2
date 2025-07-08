<x-layout>
    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif
    <div class="row">
        <h3>Categories</h3>
        @foreach ($categories as $category)
            <div class="col-2">
                <div class="card">
                    <img src="{{ $category['image'] ?? 'https://placehold.co/300x300?text=' . urlencode(str_replace(' ', '+', $category['name'])) }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category['name'] }}</h5>
                        <p class="card-text">
                            {{ $category['description'] }}
                        </p>
                        <a href="/category/{{ $category['slug'] }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
