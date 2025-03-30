<x-layout>

<div class="coder-form-container">
    <h2>Register</h2>
    <form action="{{ route('register.store') }}" method="POST" class="coder-form">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" required>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group password-container">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <i id="togglePassword" class="fa fa-eye toggle-password">
            </i>
        </div>
        <div class="form-group password-container">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <i id="togglePassword2" class="fa fa-eye toggle-password"></i>
        </div>
        <button type="submit" class="btn btn-primary">Register</button> 
        <p>Already have an account?</p>
        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    </form>

    
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            let passwordField = document.getElementById("password");
            let type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            // Toggle icon (if using FontAwesome)
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        document.getElementById("togglePassword2").addEventListener("click", function () {
            let passwordField = document.getElementById("password_confirmation");
            let type = passwordField.type === "password_confirmation" ? "text" : "password_confirmation";
            passwordField.type = type;

            // Toggle icon (if using FontAwesome)
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

    </script>

</x-layout>



