@extends('template.apps')
@section('JS')
  <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endsection
@section('content')
  <section class="content-header">
    <h1>
      kelas
      <small>Daftar Kelas</small>
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
          <h3 class="box-title">Data Table Kelas</h3>
          <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
           @if(session('save'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               Data Kelas <strong>{{session('save')}}</strong> Berhasil ditambahkan
             </div>
           @elseif(session('update'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               Data Kelas <strong>{{session('update')}}</strong> Berhasil diupdate
             </div>
           @elseif(session('delete'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               Data Kelas <strong>{{session('delete')}}</strong> Berhasil diHapus
             </div>
           @elseif(session('warning'))
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
              Save Gagal Data Kelas <strong>{{session('warning')}}</strong> Sudah Ada
             </div>
           @endif
          <table id="example1" class="table table-bordered table-striped" >
            <thead>
            <tr>
              <th>No</th>
              <th>No Kelas</th>
              <th>Nama Kelas</th>
              <th>Wali Kelas</th>
              <th>Total Siswa</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($show as $no => $key)
                <tr>
                  <td>{{$no+1}}</td>
                  <td>{{$key->kode_kls}}</td>
                  <td>{{$key->wali_kelas}}</td>
                  <td>{{$key->nama}}</td>
                  <td>{{$key->total_siswa}}</td>
                  <td>
                    {{-- <a href="#" class="btn btn-info" title="Detail data"><i class="fa fa-info"></i></a> --}}
                    <a onclick="update_class('{{$key->kode_kls}}','{{$key->nama}}','{{$key->wali_kelas}}','{{$key->total_siswa}}')" class="btn btn-warning" title="Edit data" data-toggle="modal" data-target="#update_data"><i class="fa fa-pencil"></i></a>
                    <a onclick="delete_class('{{$key->kode_kls}}','{{$key->nama}}')" class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#delete_data"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
              @endforeach

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
          {!! Form::open(['route' => 'kelas.add']) !!}
              @method('POST')
              @csrf
            {!! Form::label('', 'Nama Kelas') !!}
            {!! Form::text('name_class', '', ['class' => 'form-control', 'placeholder' => 'Nama Kelas','required']) !!}
             {!! Form::label('email', 'Wali Kelas') !!}
             {!! Form::text('wali_kelas', '', ['class' => 'form-control', 'placeholder' => 'Nama Wali Kelas','required']) !!}
             {!! Form::label('', 'Total Siswa') !!}
             {!! Form::number('total_student', '',['class' => 'form-control' ,'placeholder' => 'Banyak Siswa','required']) !!}
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
          {!! Form::open(['route' => 'kelas.update']) !!}
              @method('POST')
              @csrf
             {!! Form::hidden('id_class', '', ['class' => 'form-control id_class']) !!}
             {!! Form::label('email', 'Nama Kelas') !!}
             {!! Form::text('name_class', '', ['class' => 'form-control name_class','required']) !!}
             {!! Form::label('email', 'Wali Kelas') !!}
             {!! Form::text('wali_kelas', '', ['class' => 'form-control wali_kelas', 'placeholder' => 'Nama Wali Kelas','required']) !!}
             {!! Form::label('', 'Total Siswa') !!}
             {!! Form::number('total_student', '',['class' => 'form-control total_student','required']) !!}
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
          <h4 class="modal-title">Form Delete</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => 'kelas.delete']) !!}
              @method('DELETE')
              @csrf
              {!! Form::hidden('id_class', '', ['class' => 'form-control', 'id' => 'id_class']) !!}
              {!! Form::hidden('name_class', '', ['class' => 'form-control', 'id' => 'name_class']) !!}
              <span>Anda yakin mau menghapus kelas</span> (<span class="name_class"></span>) ?
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
