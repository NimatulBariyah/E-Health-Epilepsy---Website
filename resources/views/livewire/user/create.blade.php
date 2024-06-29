<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModalCenter">
    Tambah
</button>
<div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ !empty($user_id) ? 'Edit' : 'Buat' }} Akun</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($updateMode) <input type="hidden" name="user_id" wire:model="user_id"> @endif
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input wire:model="name" type="text" class="form-control" id="nama-input" placeholder="Ex: Budi">
            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input wire:model="email" type="email" class="form-control" id="email-input" placeholder="Ex: budi@gmail.com">
            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input wire:model="password" type="password" name="password" class="form-control" id="password-input" placeholder="Password">
            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="level">Tetapkan User sebagai</label>
            <select wire:model="level" class="custom-select form-control-border" id="exampleSelectBorder">
                <option value="0">-- Pilih peran --</option>
                @foreach($levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('level') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
      </div>
      <div class="modal-footer">
        <button wire:click.prevent="store()" type="button" class="btn btn-primary">{{ !empty($user_id) ? 'Update' : 'Buat' }}</button>
      </div>
    </div>
  </div>
</div>