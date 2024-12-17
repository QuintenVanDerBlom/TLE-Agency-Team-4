<x-layout>
        <style>

            .vacancies {
                max-width: 90vw;
                margin: 0 auto;
            }

            .vacancy-card {
                border: 0.1rem solid #dcdcdc;
                border-radius: 1rem;
                margin-bottom: 2vh;
                overflow: hidden;
                background-color: #fff;
                box-shadow: 0 0.2rem 0.4rem rgba(0, 0, 0, 0.1);
            }

            .toggle-card {
                width: 100%;
                background: none;
                border: none;
                padding: 1rem;
                font-size: 1rem;
                font-weight: bold;
                text-align: left;
                display: flex;
                justify-content: space-between;
                cursor: pointer;
                outline: none;
                color: #333;
                transition: background-color 0.3s ease;
            }

            .toggle-card:hover {
                background-color: #f5f5f5;
            }

            .arrow {
                font-size: 0.8rem;
                transform: rotate(0deg);
                transition: transform 0.3s ease;
            }

            .vacancy-details {
                display: none; /* Verberg standaard de details */
                padding: 1rem;
                background-color: #f9f9f9;
                border-top: 0.1rem solid #dcdcdc;
            }

            .vacancy-details p {
                margin: 1vh 0;
                font-size: 1rem;
                color: #555;
            }

            .remove-btn {
                background-color: red;
                color: white;
                border: none;
                border-radius: 0.5rem;
                padding: 0.6rem 0.6rem;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button[type="submit"] {
                background-color: red;

            }


        </style>

    <div class="cat-container">
        <div id="stap2" class="header-container">
            <h1 class="centered-text">Mijn inschrijvingen</h1>
        </div>

        <div class="vacancies">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($jobListings as $job)
                <div class="vacancy-card">
                    <button class="toggle-card">
                        {{ $job->company->name }} {{ $job->name }} - Wachtlijstplek:
                        @foreach($job->users as $index => $user)
                            @if($user->id == Auth::id())
                                {{ $index + 1 }} <!-- Positie op de wachtlijst -->
                            @endif
                        @endforeach
                        <span class="arrow">▼</span>
                    </button>
                    <div class="vacancy-details">
                        <p><strong>Baan:</strong> {{ $job->name }}</p>
                        <p><strong>Locatie:</strong> {{ $job->company->place }}</p>
                        <p><strong>Salaris:</strong> €{{ number_format($job->salary, 2) }},- p.m.</p>
                        <p><strong>Plek op de wachtlijst:</strong>
                            @foreach($job->users as $index => $user)
                                @if($user->id == Auth::id())
                                    {{ $index + 1 }} <!-- Positie op de wachtlijst -->
                                @endif
                            @endforeach
                        </p>
                        <form action="{{ route('jobapplication.destroy', $job->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn">Verwijder</button>
                        </form>
                    </div>

                </div>
            @empty
                <p>Je hebt nog geen inschrijvingen</p>
            @endforelse
        </div>
    </div>


</x-layout>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleButtons = document.querySelectorAll(".toggle-card");

        toggleButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const details = button.nextElementSibling;
                const arrow = button.querySelector(".arrow");

                if (details.style.display === "block") {
                    details.style.display = "none";
                    arrow.style.transform = "rotate(0deg)";
                } else {
                    details.style.display = "block";
                    arrow.style.transform = "rotate(180deg)";
                }
            });
        });
    });

</script>
