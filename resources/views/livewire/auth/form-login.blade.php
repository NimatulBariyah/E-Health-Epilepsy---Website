<form wire:submit.prevent="login">
    @if($message = Session::get('error'))
    <strong class="text-danger">
        {{ $message }}
    </strong>
    @endif
    <div class="input-group mb-3">
        <input type="email" 
            wire:model.lazy="email" 
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Email"
        />
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input 
            wire:model.lazy="password"
            type="password" 
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
        />
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>