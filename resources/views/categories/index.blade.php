<x-layout>
    <style>
        .back-button img{
            left: -3.8rem;
        }
    </style>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="{{ route('index') }}" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Sectoren</h1>
        </div>
        <p class="intro-text">Kies een sector waarvan u vacatures wilt zien</p>

        <div class="category-blocks">
            @foreach($categories as $category)
                <a href="{{ url('joblistingcategories/' . $category->id) }}" class="job-block">
                    <div class="category-div">
                        <div class="job-image">
                            <img src="{{ asset('images/logos/' . $category->image . '.png') }}" alt="job image">
                        </div>
                        <div class="job-content">
                            <h3>{{ $category->name }}</h3>
                            <p>{{ $category->information }}</p>
                        </div>
                    </div>
                    <div class="job-action">
                        <button>Bekijk sector</button>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
