@extends('template.apps')
@section('JS')
  <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endsection
@section('content')
  <section class="content-header">
    <h1>
      Siswa
      <small>Daftar Siswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
      <div class="box">
         <div class="box-header">
           <h3 class="box-title">Data Table Siswa</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>
           <table id="example1" class="table table-bordered table-striped">
             <thead>
             <tr>
               <th>No</th>
               <th>NIS</th>
               <th>Nama</th>
               <th>Tempat Lahir</th>
               <th>Tanggal Lahir</th>
               <th>Jenis Kelamin</th>
               <th>Alamat</th>
               <th>Agama</th>
               <th>Action</th>
             </tr>
             </thead>
             <tbody>

               @foreach ($show as $no => $key)
                 <tr>
                   <td>{{$no+1}}</td>
                   <td>{{$key->NIS}}</td>
                   <td>{{$key->nama}}</td>
                   <td>{{$key->tempat_lahir}}</td>
                   <td>{{$key->tanggal_lahir}}</td>
                   <td>{{$key->jenis_kelamin}}</td>
                   <td>{{$key->alamat}}</td>
                   <td>{{$key->agama}}</td>
                   <td>
                     {{-- <a href="#" class="btn btn-info" title="Detail data"><i class="fa fa-info"></i></a> --}}
                     <a onclick="update_student('{{$key->NIS}}','{{$key->nama}}','{{$key->tempat_lahir}}','{{$key->tanggal_lahir}}','{{$key->jenis_kelamin}}','{{$key->alamat}}','{{$key->agama}}')" class="btn btn-warning" title="Edit data" data-toggle="modal" data-target="#update_data"><i class="fa fa-pencil"></i></a>
                     <a onclick="destroy_student('{{$key->NIS}}','{{$key->nama}}')" class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#delete_data"><i class="fa fa-trash-o"></i></a>
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
          {!! Form::open(['route' => 'siswa.add']) !!}
              @method('POST')
              @csrf
          {!! Form::hidden('NIS', null, array('class' => 'form-control')) !!}
          {!! Form::label('nama', 'Nama Siswa') !!}
          {!! Form::text('nama_siswa', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
          {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
          {!! Form::text('tempat_lahir', null, array('placeholder' => 'Tempat Lahir','class' => 'form-control')) !!}
          {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
          {!! Form::date('tanggal_lahir', null, array('placeholder' => 'Tanggal Lahir','class' => 'form-control')) !!}
          {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
          {!! Form::select('jenis_kelamin', ['laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'],'S',array('class' => 'form-control')) !!}
          {!! Form::label('alamat', 'Alamat') !!}
          {!! Form::text('alamat', null, array('placeholder' => 'alamat','class' => 'form-control')) !!}
          {!! Form::label('agama', 'Agama') !!}
          {!! Form::text('agama', null, array('placeholder' => 'agama','class' => 'form-control')) !!}

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
          {!! Form::open(['route' => 'siswa.update']) !!}
              @method('POST')
              @csrf
              <input type="hidden" name="id_siswa" id="id_siswa">
          {!! Form::label('nama', 'Nama Siswa') !!}
          {!! Form::text('nama_siswa', null, array('class' => 'form-control','id' => 'nama_siswa')) !!}
          {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
          {!! Form::text('tempat_lahir', null, array('class' => 'form-control','id' => 'tempat_l')) !!}
          {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
          {!! Form::date('tanggal_lahir', null, array('class' => 'form-control','id' => 'tgl_lahir')) !!}
          {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
          {!! Form::select('jenis_kelamin', ['laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'],'S',array('class' => 'form-control','id' => 'JK')) !!}
          {!! Form::label('alamat', 'Alamat') !!}
          {!! Form::text('alamat', null, array('class' => 'form-control','id' => 'home_town')) !!}
          {!! Form::label('agama', 'Agama') !!}
          {!! Form::text('agama', null, array('class' => 'form-control','id' => 'religion')) !!}
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
          {!! Form::open(['route' => 'siswa.delete']) !!}
              @method('DELETE')
              @csrf
              <input type="hidden" name="NIS" id="NIS">
              <span>Anda yakin mau menghapus siswa</span> (<span id="nama"></span>) ?
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
