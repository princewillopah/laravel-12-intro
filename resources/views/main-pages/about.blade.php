<x-layout>
        <p>Learn more about us on this page.</p>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </div>

        <h1>Testing Custom JavaScript with Vite</h1>

        <!-- A button to test JavaScript -->
        <button id="testButton">Click Me</button>

        <script>
            console.log("Inline JS is also working!");
        </script>
    </main>
</x-layout>