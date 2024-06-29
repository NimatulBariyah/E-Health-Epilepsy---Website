
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Daftar User</h3>
                </div>
            </div>  
        </div>
    </header>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
            <section class="col-sm-12">
                @include('livewire.user.create')
                <table class="table table-bordered table-striped w-full">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $i => $user)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role && $user->role->level)
                                <span>
                                    {{ $user->role->level->name }}
                                </span>
                                @else
                                <strong class="text-danger">Role kosong</strong>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" wire:click.prevent="edit({{ $user->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            </div>
        </div>
    </section>
</section>