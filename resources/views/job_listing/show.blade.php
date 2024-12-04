<x-layout>
    @if(isset($joblistings) && $joblistings->isNotEmpty())
        <ul>
            @foreach($joblistings as $joblisting)
                <li>
                    <h3>{{ $joblisting->name }}</h3>
                </li>
            @endforeach
        </ul>
    @else
        <p>No jobs found for the selected criteria.</p>
    @endif
</x-layout>
