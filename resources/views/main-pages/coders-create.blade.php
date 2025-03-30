<x-layout>

                <div class="coder-form-container">
                        <h2>Create a New Coder</h2>
                        <p>Fill in the details below to add a programmer.</p>

                        <form action="{{ route('coders.store') }}" method="POST" class="coder-form">
                                @csrf

                                <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" placeholder="Enter full name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" >
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="age">Age:</label>
                                        <input type="number" id="age" name="age" min="10" max="100" placeholder="Enter age" value="{{ old('age') }}" class="@error('age') is-invalid @enderror" required>
                                        @error('age') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="sex">Sex:</label>
                                        <select id="sex" name="sex" class="@error('sex') is-invalid @enderror" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="programming_skills">Programming Skills:</label>
                                        <select id="programming_skills" name="programming_skills[]" class="@error('programming_skills') is-invalid @enderror" multiple required>
                                                <option value="PHP" {{ in_array('PHP', old('programming_skills', [])) ? 'selected' : '' }}>PHP</option>
                                                <option value="Python" {{ in_array('Python', old('programming_skills', [])) ? 'selected' : '' }}>Python</option>
                                                <option value="JavaScript" {{ in_array('JavaScript', old('programming_skills', [])) ? 'selected' : '' }}>JavaScript</option>
                                                <option value="Ruby" {{ in_array('Ruby', old('programming_skills', [])) ? 'selected' : '' }}>Ruby</option>
                                                <option value="C#" {{ in_array('C#', old('programming_skills', [])) ? 'selected' : '' }}>C#</option>
                                                <option value="Go" {{ in_array('Go', old('programming_skills', [])) ? 'selected' : '' }}>Go</option>
                                                <option value="Java" {{ in_array('Java', old('programming_skills', [])) ? 'selected' : '' }}>Java</option>
                                        </select>
                                        @error('programming_skills') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="main_language">Main Programming Language:</label>
                                        <input type="text" id="main_language" name="main_programming_language" placeholder="e.g. PHP, Python" value="{{ old('main_programming_language') }}" class="@error('main_programming_language') is-invalid @enderror" required>
                                        @error('main_programming_language') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="framework">Framework:</label>
                                        <input type="text" id="framework" name="framework" placeholder="e.g. Laravel, Django, React" value="{{ old('framework') }}" class="@error('framework') is-invalid @enderror" required>
                                        @error('framework') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="database">Database:</label>
                                        <input type="text" id="database" name="database" placeholder="e.g. MySQL, PostgreSQL, MongoDB" value="{{ old('database') }}" class="@error('database') is-invalid @enderror"required>
                                        @error('database') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                        <label for="experience">Years of Experience:</label>
                                        <input type="number" id="experience" name="years_of_experience" min="0" max="50" placeholder="Enter years of experience" value="{{ old('years_of_experience') }}" class="@error('years_of_experience') is-invalid @enderror" required>
                                        @error('years_of_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- <div class="form-group">
                                <label for="biography">Biography:</label>
                                <textarea id="biography" name="biography" placeholder="Write something about the coder"></textarea>
                                </div> -->

                                <div class="form-group">
                                        <label for="company_id">Company:</label>
                                        <select id="company_id" name="company_id" required>
                                                <option value="" disabled selected>Select a company</option>
                                                @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                                @endforeach
                        
                                        </select>
                                        @error('company_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn-submit">Create Programmer</button>
                        </form>
                 </div>

</x-layout>