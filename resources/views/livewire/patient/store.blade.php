<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Tambah Data Pasien</h3>
                </div>
            </div>  
        </div>
    </header>
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                        {{session('message')}}
                        </div>
                    @endif
                    @if($message = Session::get('error'))
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                    @endif
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="nama">ID Pasien</label>
                            <input wire:model="pasien_id" type="text" class="form-control" id="pasien_id" placeholder="Ex: 00000053">
                            @error('pasien_id') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Jenis Kelamin</label>
                            <select wire:model="gender" id="gender" class="form-control">
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Umur (tahun)</label>
                            <input wire:model="age" type="number" class="form-control" id="age" placeholder="Ex: 23">
                            @error('age') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Sesi</label>
                            <input wire:model="sesi" type="text" class="form-control" id="sesi" placeholder="Ex: 001">
                            @error('sesi') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="nama">Tanggal</label>
                                    <input wire:model="start_date" type="date" class="form-control" id="start_date" placeholder="mm/dd/yyyy">
                                    @error('start_date') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="nama">Jam</label>
                                    <input wire:model="start_time" type="time" class="form-control" id="start_time" placeholder="jj:mm AM/PM ">
                                    @error('start_time') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Obat</label>
                            <input wire:model="drug" type="text" class="form-control" id="drug" placeholder="Ex: Ativan, Propfol">
                            @error('drug') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Riwayat Penyakit</label>
                            <input wire:model="disease_history" type="text" class="form-control" id="disease_history" placeholder="Ex: Pusing">
                            @error('disease_history') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Detak Jantung (bpm)</label>
                            <input wire:model="heart_rate" type="text" class="form-control" id="heart_rate" placeholder="Ex:70 ">
                            @error('heart_rate') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Waktu Record</label>
                            <input wire:model="record_time" type="text" class="form-control" id="record_time" placeholder=" ">
                            @error('record_time') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                        <br>
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('patient') }}" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</section>