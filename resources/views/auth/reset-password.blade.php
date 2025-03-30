<x-layout>

        <div class="coder-form-container">
            <h2>forgot password</h2>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
                @endforeach
            @endif

            <form action="{{ route('password.update') }}" method="POST" class="coder-form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="token" value="{{ $token }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit"  class="btn btn-primary">Reset Password</button>
            </form>
                <p>Remembered your password?</p>
                 <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

        </div>


</x-layout>