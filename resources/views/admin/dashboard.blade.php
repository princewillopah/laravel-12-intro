<x-layout>
        <div class="header-container">
            <h2>DASHBOARD</h2>
            <a class="btn btn-primary"  href="{{ route('coders.create') }}">Add a Programmer</a>
        </div>

           @foreach ($coders_names as $coder)

                <x-card href="{{ route('coders.show',$coder->id ) }}" :title="$coder['name']" :main_lang="$coder->main_programming_language" :coderage="$coder['age'] < 25" :experience="$coder->years_of_experience" :framework="$coder['framework']" :id="$coder['id']">

                        <!-- Image Placeholder -->
                        <!-- <div class="profile-image">
                            <img src="https://i.pravatar.cc/150?img={{ $coder->id }}"  alt="{{ $coder->title }}">
                        </div> -->
                        <div class="profile-info">

                            <h2>{{ $coder['name'] }}</h2>
                            <p><strong>Age:</strong> {{ $coder['age'] }}  | <strong>Sex:</strong> {{ $coder['sex'] }}</p>
                            <p><strong>Main Language:</strong> {{  $coder->main_programming_language }}</p>
                            <p><strong>Framework:</strong> {{  $coder->framework }}</p>
                            <p><strong>Database:</strong> {{  $coder->database }}</p>
                            <p><strong>Experience:</strong> {{  $coder->years_of_experience }} years</p>
                            <p><strong>Company Name:</strong> {{  $coder->company->name }}</p>
                            <div class="skills">
                                @foreach ($coder['programming_skills'] as $skill)
                                    <span >{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>

                </x-card>
            @endforeach 

      <!-- </div> -->
      {{ $coders_names->links() }}

</x-layout>