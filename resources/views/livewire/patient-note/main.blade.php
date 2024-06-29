<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EEG Information System - Daftar Catatan Pasien</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" />
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-boxed">
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')

        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{session('message')}}
            </div>
          @endif
          @if( isset($id) )
            @livewire($component, ['patient_note_id' => $id])
          @else
            @livewire($component)
          @endif
        </div>

        @include('layout.footer')
    </div>
    @livewireScripts
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
      $('table').dataTable()
    </script>
</body>
</html>