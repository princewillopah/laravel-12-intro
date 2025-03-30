<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('sex');
            $table->json('programming_skills'); // Store skills as JSON
            $table->string('main_programming_language');
            $table->string('framework');
            $table->string('database');
            $table->integer('years_of_experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coders');
    }
};


@foreach ($coders_names as $coder)
<x-card href="{{ route('coders.show',$coder->id ) }}" :title="$coder['name']" :coderage="$coder['age'] < 25" :codergender="$coder['sex']" :id="$coder['id']">

    <div class="card-body ">
        <h5 class="card-title">{{ $coder['name'] }}</h5>
        <p class="card-text mb-0"><strong>Age:</strong> {{ $coder['age'] }} </p>
        <p class="card-text mb-0"><strong>Sex:</strong> {{ $coder['sex'] }} </p>

        <!-- Programming Skills -->
        <p class="card-text mb-0">
            <strong>Skills:</strong> 
            @foreach ($coder['programming_skills'] as $skill)
               <span class="badge bg-primary">{{ $skill }}</span>
            @endforeach
        </p>
        <p class="card-text mb-0"><strong>Main Programming language:</strong> {{  $coder->main_programming_language }}</p>
        <p class="card-text mb-0"><strong>Framework:</strong> {{  $coder->framework }}</p>

        <p class="card-text mb-0"><strong>Database:</strong> {{  $coder->database }}</p>

        <p class="card-text mb-0"><strong>Years Of Experience:</strong> {{  $coder->years_of_experience }}</p>


    </div>          
</x-card>

@endforeach 


///////////////////////////////////

 <div class="table-container">
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Programming Language</th>
            <th>Experience Level</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coders as $coder)
            <tr>
                <td>{{ $coder->id }}</td>
                <td>{{ $coder->name }}</td>
                <td>{{ $coder->language }}</td>
                <td>{{ $coder->experience_level }}</td>
                <td>
                    <a href="{{ route('coders.edit', $coder->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('coders.destroy', $coder->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $coders->links() }} 


