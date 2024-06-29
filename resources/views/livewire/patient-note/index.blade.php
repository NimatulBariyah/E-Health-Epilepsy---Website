
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Daftar Catatan Pasien</h3>
                </div>
            </div>  
        </div>
    </header>

    <section class="content">
        <div class="container" >
            <div class="row mb-4">
            <section class="col-sm-12" style="overflow: auto;">
                @if($hasPermission)
                <a href="{{ route('add-patient-note') }}" class="btn btn-primary mb-4">Tambah Catatan</a>
                @endif
                <table class="table table-bordered table-striped w-full" style="overflow: auto">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PASIEN</th>
                            <th>HASIL DIAGNOSA</th>
                            <th>LANGKAH SELANJUTNYA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient_notes as $i => $note)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$note->pasien_id}}</td>
                            <td>{{$note->diagnostic_result}}</td>
                            <td>{{$note->next_step}}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-primary mb-2" href="{{ url('/patient-note/detail/' . $note->id) }}">Detail</a>
                                @if($hasPermission)
                                <a class="btn btn-sm btn-primary mb-2" href="{{ url('/patient-note/edit/' . $note->id) }}">Edit</a>
                                <button class="btn btn-sm btn-danger" wire:click.prevent="delete({{ $note->id }})">Hapus</button>
                                @endif
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