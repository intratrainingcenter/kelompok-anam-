@extends('template.apps')
  @section('JS')
    <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
  @endsection
  @section('content')
    <section class="content-header">
      <h1>
        Absensi Siswa
        <small>Daftar Absen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
           <div class="box-header">
             <h3 class="box-title">Data Table Absensi Siswa</h3>
             <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
            @if(session('save'))
             <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Absensi <strong>{{session('save')}}</strong> Berhasil ditambahkan
              </div>
            @elseif(session('update'))
              <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Absensi <strong>{{session('update')}}</strong> Berhasil diupdate
              </div>
            @elseif(session('delete'))
              <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Absensi <strong>{{session('delete')}}</strong> Berhasil didelete
              </div>
            @elseif(session('warning'))
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Save Gagal kode pelajaran <strong>{{session('warning')}}</strong> sudah ada
              </div>
            @endif
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>No</th>
                 <th>Nama Siswa</th>
                 <th>Tanggal</th>
                 <th>Absensi</th>
                 <th>Keterangan</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>

                 @foreach ($absen as $no => $key)
                   <tr>
                     <td>{{$no+1}}</td>
                     <td>{{$key->siswa->nama}}</td>
                     <td>{{$key->tanggal}}</td>
                     <td>{{$key->absen}}</td>
                     <td>{{$key->keterangan}}</td>
                     <td>
                       {{-- <a href="#" class="btn btn-info" title="Detail data"><i class="fa fa-info"></i></a> --}}
                       <a onclick="update_absent('{{$key->kode_absensi}}','{{$key->siswa->nama}}','{{$key->absen}}','{{$key->keterangan}}')" class="btn btn-warning" title="Edit data" data-toggle="modal" data-target="#update_data"><i class="fa fa-pencil"></i></a>
                       <a onclick="delete_absent('{{$key->kode_absensi}}','{{$key->siswa->nama}}')" class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#delete_data"><i class="fa fa-trash-o"></i></a>
                     </td>
                   </tr>
                 @endforeach

               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
    </section>

   <div class="modal fade" id="add_data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Add</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'absen.add']) !!}
                @method('POST')
                @csrf
               {!! Form::label('', 'Siswa') !!}
               {!! Form::select('siswa',$siswa ,null,['class' => 'form-control siswa', 'placeholder' => 'Pilih Siswa']) !!}
               {!! Form::label('', 'Tanggal') !!}
               {!! Form::date('date', \Carbon\Carbon::now(),['class' => 'form-control tanggal']) !!}
               {!! Form::label('', 'Absensi') !!}
               {!! Form::select('absensi', ['Hadir' => 'Hadir', 'Izin' => 'Izin', 'Sakit' => 'Sakit', 'Alpa' => 'Alpa'], null, ['class' => 'form-control absen','placeholder' => 'Pilih absensi','required']) !!}
               {!! Form::label('', 'Keterangan') !!}
               {!! Form::textarea('keterangan', '',['class' => 'form-control ' ,'placeholder' => 'Keterangan Kehadiran','required']) !!}

          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

     <div class="modal fade" id="update_data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Update</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'absen.update']) !!}
                @method('POST')
                @csrf
                {!! Form::hidden('kode_absen','',['class' => 'form-control','id' =>  'kode_absen']) !!}
                {!! Form::label('', 'Siswa') !!}
                {!! Form::text('siswa','',['class' => 'form-control','id' =>  'name_siswa','disabled']) !!}
                {!! Form::label('', 'Absensi') !!}
                {!! Form::select('absensi', [], null, ['class' => 'form-control','id'=>'absen']) !!}
                {!! Form::label('', 'Keterangan') !!}
                {!! Form::textarea('keterangan', '',['class' => 'form-control keterangan' ,'placeholder' => 'Keterangan Kehadiran']) !!}
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  <div class="modal fade" id="delete_data">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Delete </h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'absen.delete']) !!}
                @method('DELETE')
                @csrf
                {!! Form::hidden('kode_absen', '', ['class' => 'form-control', 'id' => 'kode_absensi']) !!}
                {!! Form::hidden('nama_siswa', '', ['class' => 'form-control siswa']) !!}
                <span>Anda yakin mau menghapus Absensi</span> (<span id="siswa"></span>) ?
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  @endsection
