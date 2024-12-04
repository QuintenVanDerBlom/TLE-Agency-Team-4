<x-layout>
    <p id="labels">Categorieen</p>

    <section id="cat-main">
        @foreach($categories as $category)
            <div id="cat-item">
                <img id="cat-logo" src="{{ asset('images/logos/' . $category->image . '.png') }}" alt="category logo">
                <div id="cat-item-sub">
                    <p id="cat-title">{{ $category->name }}</p>
                    <p id="cat-summary">{{ $category->information }}</p>
                </div>
                <a href="{{ url('joblistingcategories/' . $category->id) }}">Bekijk Category</a>
            </div>
        @endforeach
    </section>

</x-layout>
