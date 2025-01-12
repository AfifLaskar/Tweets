<div>
    <div class="border border-primary p-2 mb-4 rounded">
        <form wire:submit.prevent="store">
            <textarea 
                id="textarea"
                class="w-100 form-control mb-1" 
                placeholder="What's up?" 
                rows="4"
                wire:model="body"
                wire:keyup="charactersRemaining" 
            ></textarea>
                
            <span id="characters">{{ $characters }}</span> Character(s) Remaining <br>

            <div class="d-flex justify-content-between mt-1">
                <img 
                    src="{{ auth()->user()->avatar }}" 
                    alt="user-avatar"
                    class="rounded-circle mr-2" 
                    width="40" 
                    height="40">

                <button type="submit" class="btn btn-primary btn-sm">
                    Tweet Me
                </button>
            </div>

            @error('body')
                <div class="text-danger mt-2">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </form>
    </div>
</div>
