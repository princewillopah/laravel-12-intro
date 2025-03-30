@props([
    'title' => 'Unknown Coder',  // Default value if title is not passed
    'coderage' => false,         // Boolean: True if age < 25
    'codergender' => 'Unknown',   // Gender
    'id' => 0                    // Coder ID
])




<div class="profile-card">

    <!-- Image Placeholder -->
    <!-- <div class="profile-image">
      <img src="https://i.pravatar.cc/150?img={{ $id }}"  alt="{{ $title }}">
  </div> -->
 

        {{ $slot }}
   <!-- Dynamic Card Content -->
    <!-- <div class="card-body">
       
          <div class="card-footer text-body-secondary">
          {{ $title }} | {{ $codergender }} | {{ $coderage ? 'Young Coder' : 'Experienced Coder' }} 
        </div>
    </div> -->

            <div class="profile-actions">
                            <a href="{{ $attributes->get('href') }}" class="view-btn" >View</a>
                            <button class="edit-btn">Edit</button>
                            <form action="{{ route('coders.destroy', $id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit" class="delete-btn">Delete</button> --> 
                                <!-- <input type="submit" class="delete-btn" value="Delete"> -->
                            </form>
                            
            </div>


</div>

<!-- onsubmit="return confirm('Are you sure you want to delete this coder?');" -->