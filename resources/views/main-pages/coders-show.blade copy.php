<x-layout>
        
<!-- @extends('layouts.app') -->

<!-- @section('content') -->
        <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
                <!-- <img src="{{ asset('storage/profile_images/' . $coder->image) }}" alt="Profile Image" class="profile-image"> -->
                <img src="https://i.pravatar.cc/150?img={{ $id }}" alt="Profile Image" class="profile-image">
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
                        <li  class="skills-list">{{ $skill }}</li>
                @endforeach
                </ul>
        </div>

        <!-- Company Details Section -->
        <!-- <div class="profile-section company-section">
                <h2>Company Information</h2>
                <p><strong>Company Name:</strong> {{ $coder->company_name }}</p>
                <p><strong>Location:</strong> {{ $coder->company_location }}</p>
                <p class="company-description">{{ $coder->company_description }}</p>
        </div> -->
        <div class="profile-section company-section">
                <h2>Company Information</h2>
                <p><strong>Company Name:</strong> Lorem ipsum . </p>
                <p><strong>Location:</strong> Lorem, ipsum dolor.</p>
                <p class="company-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe nemo libero impedit porro, corrupti numquam, amet consequuntur molestiae unde dolor sed non maiores excepturi quos odit. Perspiciatis quis voluptas excepturi?</p>
        </div>

        <!-- Final Review Section -->
        <div class="profile-section final-review">
                <h2>Final Thoughts</h2>
                <!-- <p>{{ $coder->summary }}</p> -->
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
        </div>
        </div>
        <!-- @endsection -->




</x-layout>