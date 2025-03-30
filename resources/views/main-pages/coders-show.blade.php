<x-layout>
        

        <div class="profile-container">
                <!-- Dark Mode Toggle -->
                <button class="toggle-mode" onclick="toggleDarkMode()">🌙 Toggle Dark Mode</button>
                <!-- Profile Header -->
                <div class="profile-header">
                        <img src="https://i.pravatar.cc/300" alt="Profile Image" class="profile-image">
                        <!-- <img src="data:image/png;base64,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" alt="Profile Image" class="profile-image"> -->
                        <h1>{{ $coder->name }}</h1>
                        <p class="age-sex">{{ $coder->age }} years old • {{ $coder->sex }}</p>
                </div>

                <!-- coder Info Section -->
                <div class="profile-section">
                        <h2>Professional Details</h2>
                        <p><strong>Main Programming Language:</strong> {{ $coder->main_programming_language }}</p>
                        <p><strong>Framework:</strong> {{ $coder->framework }}</p>
                        <p><strong>Database:</strong> {{ $coder->database }}</p>
                        <p><strong>Years of Experience:</strong> {{ $coder->years_of_experience }} years</p>
                </div>

                <div class="profile-section">
                        <h2>Programming Skills</h2>
                        <ul class="skills-list">
                        @foreach($coder->programming_skills as $skill)
                                <li  class="{{ $skill == $coder->main_programming_language ? "skill-item x":"skill-item"}}">{{ $skill }}</li>
                        @endforeach
                        </ul>
                </div>

                <div class="profile-section company-section">
                        <h2>Company Information</h2>
                        <p><strong>Company Name:</strong> {{ $coder->company->name }} </p>
                        <p><strong>Location:</strong> {{  $coder->company->location }}.</p>
                        <p class="company-description">{{  $coder->company->description }}</p>
                </div>

                <!-- Final Review Section -->
                <div class="profile-section final-review">
                        <h2>Final Thoughts</h2>
                        <!-- <p>{{ $coder->summary }}</p> -->
                        <p>{{ $coder->name }} is a {{ $coder->years_of_experience < 5 ? "Up-comming": ($coder->years_of_experience >=5 && $coder->years_of_experience <= 9 ? "Intermediate": "Experienced") }} developer</p>
                </div>




        </div>


</x-layout>