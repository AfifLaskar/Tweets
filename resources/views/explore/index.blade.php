@extends('layouts.app')

@section('content')
        <h4>
            Explore Users
        </h4><hr>
            
        @foreach($users as $user)
            <div class="d-flex align-items-center pb-4">
                <a href="{{ route('profile.show', $user->name) }}" class="text-decoration-none text-dark">
                    <img 
                        src="{{ $user->avatar }}" 
                        alt="user-avatar" 
                        class="me-2 rounded-circle" 
                        width="40" 
                        height="40">
                </a>
                <a href="{{ route('profile.show', $user->name) }}" class="text-decoration-none text-dark">
                    <h5 class="mb-0">
                        {{ '@' . $user->name }}
                    </h5>
                </a>
            </div>
        @endforeach

        {{ $users->links() }}
@endsection