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

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" 
                    class="@error('password') is-invalid @enderror" required>
                @error('password') 
                    <div class="alert alert-danger">{{ $message }}</div> 
                @enderror

                    <!-- <span id="togglePassword" 
                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                        cursor: pointer; width: 20px; height: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" 
                            viewBox="0 0 24 24">
                            <path d="M12 4.5c-4.8 0-9.2 3.1-10.8 7.5 1.6 4.4 6 7.5 10.8 7.5s9.2-3.1 10.8-7.5c-1.6-4.4-6-7.5-10.8-7.5zm0 13c-2.9 0-5.3-2.4-5.3-5.3S9.1 7 12 7s5.3 2.4 5.3 5.3S14.9 17.5 12 17.5zm0-8.8c-2 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z"/>
                        </svg>
                    </span> -->
                    
                    <i id="togglePassword" class="fa fa-eye" 
                    style="position: absolute; right: 380px; top: 47%; transform: translateY(-50%); 
                    cursor: pointer; font-size: 18px; color: black;">
                    </i>
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
