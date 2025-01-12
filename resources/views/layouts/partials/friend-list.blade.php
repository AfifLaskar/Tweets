<div class="rounded p-3" style="background-color: #E7F1F2;">
    <h3 class="text-left">
        Following
    </h3>

    @forelse(auth()->user()->follows as $user)
        <li class="list-group-item mb-2">
            <div class="d-flex align-items-center">
                <a href="{{ route('profile.show', $user->name) }}" class="text-decoration-none text-dark">
                    <img 
                        src="{{ $user->avatar }}" 
                        alt="user-avatar" 
                        class="rounded-circle me-3" 
                        width="40" 
                        height="40">
                </a>
                <a href="{{ route('profile.show', $user->name) }}" class="text-decoration-none text-dark">
                    {{ $user->name }}
                </a>
            </div>
        </li>
    @empty
        <p>No friends yet!</p>
    @endforelse
</div>