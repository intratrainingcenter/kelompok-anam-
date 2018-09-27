@extends('template.apps')
@section('JS')
  <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endsection
@section('content')
  <section class="content-header">
    <h1>
      piket
      <small>Daftar piket</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
      <div class="box">
         <div class="box-header">
           <h3 class="box-title">Data Table piket</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>
           <table id="example1" class="table table-bordered table-striped">
             <thead>
             <tr>
               <th>No</th>
               <th>Hari</th>
               <th>action</th>
             </tr>
             </thead>
             <tbody>

               @foreach ($piket as $no => $key)
                 <tr>
                   <td>{{$no+1}}</td>
                   <td>{{$key->hari}}</td>
                   <td>
                     <a href="{{Route('piket.detail')}}" class="btn btn-info" title="Detail data"><i class="fa fa-info"></i></a>
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
          {!! Form::open(['route' => 'piket.add']) !!}
              @method('POST')
          {!! Form::label('', 'Siswa') !!}
          <select class="form-control" name="siswa">
          @foreach ($piket2 as $ruan)
            <option value="{{$ruan->NIS}}">{{$ruan->nama}}</option>
            @endforeach
          </select>
          {!! Form::label('hari', 'Hari') !!}
          {!! Form::date('hari', null, array('placeholder' => 'hari','class' => 'form-control')) !!}
          {!! Form::label('', 'kelas') !!}
          <select class="form-control" name="kelas" id="">
          @foreach ($piket3 as $ruans)
            <option value="{{$ruans->kode_kls}}">{{$ruans->nama}}</option>
            @endforeach
          </select>
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


@endsection
