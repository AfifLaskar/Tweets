@extends('layouts.app')

@section('content')
    <div class="col-md-12 px-3">
        <h4>
            Edit Profile
        </h4><hr>

        <form action="{{ route('profile.update', $user->name) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mb-2">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                        @error('email')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>

                    @error('password')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">
                </div>
            </div> 
            
            <div class="mb-2">
                <label for="overview">Overview</label>
                <textarea 
                    id="textarea"
                    name="overview" 
                    class="form-control col-6 mb-3 @error('overview') is-invalid @enderror"
                    rows="4">{{ $user->overview }}</textarea>

                @error('overview')
                    <div class="text-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="avatar">Avatar</label><br>
                <input class="mb-2 @error('avatar') is-invalid @enderror" type="file" name="avatar"><br>
                <img 
                    src="{{ $user->avatar }}" 
                    alt="user-avatar" 
                    class="rounded-circle ms-2 mb-2" 
                    width="40" 
                    height="40">

                @error('avatar')
                    <div class="text-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary me-2">
                Confirm
            </button>

            <a href="{{ route('profile.show', $user->name) }}" class="btn btn-success">
                Cancel
            </a>
        </form>
    </div>
@endsection