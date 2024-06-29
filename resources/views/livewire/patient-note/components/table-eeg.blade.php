<table class="table table-bordered table-striped w-full">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID PASIEN</th>
            <th>SESI</th>
            <th>DESKRIPSI</th>
            <th>JUMLAH FILE</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
    @if($eegs_info)
        @foreach($eegs_info as $i => $eeg)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$eeg->pasien_id}}</td>
            <td>
                @if(!is_null($eeg->sesi))
                <span>{{ $eeg->sesi->value }}</span>
                @else
                <i class="text-danger">Sesi tidak ditemukan</i>
                @endif
            </td>
            <td>{{$eeg->description}}</td>
            <td>{{count($eeg->attachments)}}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm" href="{{ url('eeg/detail/' . $eeg->id) }}">Detail</a>
                <a class="btn btn-sm btn-primary" href="{{ url('/eeg/download/' . $eeg->id) }}">Download File</a>
            </td>
        </tr>
        @endforeach
    @else
    <tr>
        <td colspan="8">
            <p class="text-center">Tidak ada data EEG.</p>
        </td>
    </tr>
    @endif
    </tbody>
</table>