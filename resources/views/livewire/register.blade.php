
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <form wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" wire:model="form.name" class="form-control">
                        @error('form.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" wire:model="form.email" class="form-control">
                        @error('form.email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" wire:model="form.password" class="form-control">
                        @error('form.password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" wire:model="form.password_confirmation" class="form-control">
                    </div>
                    <button class="btn btn-outline-secondary" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
