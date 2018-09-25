@extends('template.apps')
  @section('JS')
    <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
  @endsection
  @section('content')
    <section class="content-header">
      <h1>
        Mata Pelajaran
        <small>Daftar Mata Pelajran</small>
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
             <h3 class="box-title">Data Table Mata Pelajaran</h3>
             <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
            @if(session('save'))
             <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                pelajaran <strong>{{session('save')}}</strong> Berhasil ditambahkan
              </div>
            @elseif(session('update'))
              <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                pelajaran <strong>{{session('update')}}</strong> Berhasil diupdate
              </div>
            @elseif(session('delete'))
              <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                pelajaran <strong>{{session('delete')}}</strong> Berhasil didelete
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
                 <th>Kode Pelajaran</th>
                 <th>Kelas</th>
                 <th>Guru</th>
                 <th>Mata Pelajaran</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>

                 @foreach ($study as $no => $key)
                   <tr>
                     <td>{{$no+1}}</td>
                     <td>{{$key->kode_pelajaran}}</td>
                     <td>{{$key->kelas->nama}}</td>
                     <td>{{$key->nama_guru}}</td>
                     <td>{{$key->nama_pelajaran}}</td>
                     <td>
                       {{-- <a href="#" class="btn btn-info" title="Detail data"><i class="fa fa-info"></i></a> --}}
                        <a onclick="update_pelajaran('{{$key->kode_pelajaran}}','{{$key->kelas->nama}}','{{$key->nama_guru}}','{{$key->nama_pelajaran}}')" class="btn btn-warning" title="Edit data" data-toggle="modal" data-target="#update_data"><i class="fa fa-pencil"></i></a>
                       <a onclick="destroy('{{$key->kode_pelajaran}}','{{$key->nama_pelajaran}}')" class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#delete_data"><i class="fa fa-trash-o"></i></a>
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
            <h4 class="modal-title">Add Pelajaran</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'mata_pelajaran.add']) !!}
                @method('POST')
                @csrf
               {!! Form::label('', 'Kode Pelajaran') !!}
               {!! Form::text('kode_pelajaran', '',['class' => 'form-control' ,'placeholder' => 'kode Pelajaran','required']) !!}
               {!! Form::label('', 'Kelas') !!}
               {!! Form::select('class',$class ,null,['class' => 'form-control', 'placeholder' => 'Pilih Kelas','required']) !!}
               {!! Form::label('', 'Guru') !!}
               {!! Form::text('nama_guru', '',['class' => 'form-control' ,'placeholder' => 'Nama Guru','required']) !!}
               {!! Form::label('Pelajaran', 'Pelajaran') !!}
               {!! Form::text('pelajaran', '',['class' => 'form-control' ,'placeholder' => 'Mata Pelajaran','required']) !!}

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
            <h4 class="modal-title">Update Pelajaran</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'mata_pelajaran.update']) !!}
                @method('POST')
                @csrf
               {!! Form::hidden('kode_pelajaran', '',['class' => 'form-control kode' ,'placeholder' => 'kode Pelajaran']) !!}
               {!! Form::label('', 'Kelas') !!}
                  <select class="form-control kelas" name="class">
                    @foreach($kelas as $kelas)
                    <option value="{{$kelas->kode_kls}}">{{$kelas->nama}}</option>
                    @endforeach
                  </select>
               {!! Form::label('', 'Guru') !!}
               {!! Form::text('nama_guru', '',['class' => 'form-control guru' ,'placeholder' => 'Nama Guru','required']) !!}
               {!! Form::label('Pelajaran', 'Pelajaran') !!}
               {!! Form::text('pelajaran', '',['class' => 'form-control pelajaran' ,'placeholder' => 'Mata Pelajaran','required']) !!}
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
            <h4 class="modal-title">Delete Pelajaran </h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'mata_pelajaran.delete']) !!}
                @method('DELETE')
                @csrf
                {!! Form::hidden('kode_pelajaran', '', ['class' => 'form-control', 'id' => 'kode_pelajaran']) !!}
                {!! Form::hidden('nama_pelajaran', '', ['class' => 'form-control nama_palajaran']) !!}
                <span>Anda yakin mau menghapus Pelajaran</span> (<span id="nama_palajaran"></span>) ?
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
