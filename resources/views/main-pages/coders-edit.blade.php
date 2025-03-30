<x-layout>
    <div class="coder-form-container">
        <h2>Edit Coder</h2>
        <p>Update the details of the {{ $coder->name }}.</p>

        <form action="{{ route('coders.update', $coder->id) }}" method="POST" class="coder-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $coder->name) }}" class="@error('name') is-invalid @enderror" required>
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" min="10" max="100" value="{{ old('age', $coder->age) }}" class="@error('age') is-invalid @enderror" required>
                @error('age') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" class="@error('sex') is-invalid @enderror" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('sex', $coder->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('sex', $coder->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('sex') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="programming_skills">Programming Skills:</label>
                <select id="programming_skills" name="programming_skills[]" class="@error('programming_skills') is-invalid @enderror" multiple required>
                    @foreach (["PHP", "Python", "JavaScript", "Ruby", "C#", "Go", "Java"] as $skill)
                        <option value="{{ $skill }}" {{ in_array($skill, old('programming_skills', $coder->programming_skills ?? [])) ? 'selected' : '' }}>{{ $skill }}</option>
                    @endforeach
                </select>
                @error('programming_skills') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="main_language">Main Programming Language:</label>
                <input type="text" id="main_language" name="main_programming_language" value="{{ old('main_programming_language', $coder->main_programming_language) }}" class="@error('main_programming_language') is-invalid @enderror" required>
                @error('main_programming_language') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="framework">Framework:</label>
                <input type="text" id="framework" name="framework" value="{{ old('framework', $coder->framework) }}" class="@error('framework') is-invalid @enderror" required>
                @error('framework') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="database">Database:</label>
                <input type="text" id="database" name="database" value="{{ old('database', $coder->database) }}" class="@error('database') is-invalid @enderror" required>
                @error('database') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="years_of_experience" min="0" max="50" value="{{ old('years_of_experience', $coder->years_of_experience) }}" class="@error('years_of_experience') is-invalid @enderror" required>
                @error('years_of_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select id="company_id" name="company_id" required>
                    <option value="" disabled>Select a company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id', $coder->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn-submit">Update Programmer</button>
        </form>
    </div>


</x-layout>
