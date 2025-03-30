<x-layout>

        <div class="coder-form-container">
            <h2>forgot password</h2>
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            @endif

            <form action="{{ route('password.email') }}" method="POST"  class="coder-form">
                @csrf
                 <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email" required>
                 </div>
                
                <button type="submit" class="btn btn-primary">Send Reset Link</button>
            </form>
            <p>Remembered your password?</p>
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

        </div>


</x-layout>