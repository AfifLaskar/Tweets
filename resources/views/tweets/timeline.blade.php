@if($tweets->count() > 0)
    @foreach($tweets as $tweet)
        <div class="border border-gray p-2 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                        <a href="{{ route('profile.show', $tweet->user->name) }}">
                            <img 
                                src="{{ $tweet->user->avatar }}" 
                                alt="user-avatar"
                                class="rounded-circle me-2" 
                                width="40" 
                                height="40">
                        </a>
                    <h4 class="mb-0">
                        <a href="{{ route('profile.show', $tweet->user->name) }}" class="text-decoration-none text-dark">
                            {{ $tweet->user->name }}
                        </a>  
                    </h4>
                </div>
                <small>
                    {{ $tweet->created_at->diffForHumans() }}
                </small>
            </div>

            <p class="my-2">
                {{ $tweet->body }}
            </p>

            <div class="d-flex">
                <form action="{{ route('tweets.like.store', $tweet) }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="fa fa-thumbs-up"></i> {{ $tweet->likes ? : 0 }}
                    </button>
                </form>
                
                <form action="{{ route('tweets.like.destroy', $tweet) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-secondary me-2">
                        <i class="fa fa-thumbs-down"></i> {{ $tweet->dislikes ? : 0 }}
                    </button>
                </form>
                
                @can('delete', $tweet)
                    <form action="{{ route('tweets.destroy', $tweet) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
@else
    <p>No tweets atm!</p>
@endif

{{ $tweets->links() }}