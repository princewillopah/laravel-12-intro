<x-layout>

    <div class="coder-form-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST" class="coder-form">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                    class="@error('email') is-invalid @enderror" required>
                @error('email') 
                    <div class="alert alert-danger">{{ $message }}</div> 
                @enderror
            </div>


            <div class="form-group password-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
                @error('password') <div class="alert alert-danger">{{ $message }}</div>  @enderror
                <i id="togglePassword" class="fa fa-eye toggle-password"></i>
            </div>
            



            <!-- Properly aligned Remember Me checkbox -->
            <div class="form-group checkbox-group xxx">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember"> Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <div class="form-links">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                <p><a href="{{ route('password.request') }}">Forgot Password?</a></p> 
            </div>
        </form>
    </div>


    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            let passwordField = document.getElementById("password");
            let type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            // Toggle icon (if using FontAwesome)
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>


</x-layout>
