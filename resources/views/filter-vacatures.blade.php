@if(isset($jobs) && $jobs->isNotEmpty())
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job->title }}</li>
        @endforeach
    </ul>
@else
    <p>No jobs found for the selected criteria.</p>
@endif
