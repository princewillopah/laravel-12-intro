@props([
    'title' => 'Unknown Coder',  // Default value if title is not passed
    'coderage' => false,         // Boolean: True if age < 25
    'main_lang' => 'Unknown',   // Gender
    'framework' => 'Unknown',   // Framework
    'experience' => 0,          // Years of Experience
    'id' => 0                    // Coder ID
])




<div class="profile-card">

  <div class="profile-image">
      <img src="https://i.pravatar.cc/150?img={{ $id }}"  alt="{{ $title }}">
  </div>
 
 

{{ $slot }}
 

            <div class="profile-actions">
                          <div class="profile-review">
                              <p><strong>{{ $title }} </strong>is a <strong><i>{{ $experience < 5 ? "Up-comming": ($experience >=5 && $experience <= 9 ? "Intermediate": "Experienced") }}</i></strong> <strong>  {{ $main_lang }}</strong>  {{ $main_lang == 'JavaScript' && $framework == 'React'? ' Frontend ': 'backend' }} developer with  focus on  <strong>{{ $framework }}</strong> skills!</p>
                          </div>
                          <div class="btn-xx">
                                    <a href="{{ $attributes->get('href') }}" class="view-btn btn-x" >View</a>
                                    @if(Auth::user() && Auth::user()->isAdmin())
                                        <a href="{{ route('coders.edit', $id) }} " class="edit-btn btn-x">Edit</a>
                                        <form action="{{ route('coders.destroy', $id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn btn-x">Delete</button>
                                            <!-- <input type="submit" class="delete-btn" value="Delete"> -->
                                        </form>
                                    @endif
                          </div>
 
            </div>


</div>

