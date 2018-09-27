@extends('template.apps')

@section('JS')
  <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endsection

@section('content')
<div class="row btnPrint">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
            <a href="{{Route('piket.index')}}"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancle</button></a>
			<button class="btn btn-default 	pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
		</div>
	</div>
</div>
        <section class="content invoice">
            <div class="row">
                <div class="col-xs-12 invoice-header">
                    <small class="pull-right">Date: {{ date('d,M Y') }} </small>
                    <br>
                    <div class="box-body">
           <button type="button" name="button" class="btn btn-primary pull-right" title="Tambah Data" data-toggle="modal" data-target="#add_data"><i class="fa fa-plus"></i> Add Data</button>
           <table id="example1" class="table table-bordered table-striped">
             <thead>
             <tr>
               <th>No</th>
               <th>Hari</th>
               <th>Nama Siswa</th>
               <th>Nama Kelas</th>
               <th>action</th>
             </tr>
             </thead>
             <tbody>
            @php
            $no = 1;
            @endphp
               @foreach ($piket as $key)
                 <tr>
                   <td>{{$no++}}</td>
                   <td>{{$key->hari}}</td>
                   <td>{{$key->siswa['nama']}}</td>
                   @forelse($piket3 as $ruang)
                   <td>{{$ruang->nama}}</td>
                   @empty
                   <p>belum ada kelas</p>
                   @endforelse
                   <td>
                   <a onclick="update_piket('{{$key->hari}}','{{$key->siswa['nama']}}','{{$ruang->nama}}')" class="btn btn-warning" title="Edit data" data-toggle="modal" data-target="#update_data"><i class="fa fa-pencil"></i></a>
                <a onclick="destroy_piket('{{$key->hari}}')" class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#delete_data"><i class="fa fa-trash-o"></i></a>
                   </td>
                 </tr>
               @endforeach
                
             </tfoot>
           </table>
         </div>
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
          {!! Form::open(['route' => 'piket.update']) !!}
              @method('POST')
              @csrf
              <input type="hidden" name="id_piket" id="id_piket">
          {!! Form::label('', 'Siswa') !!}
          <select class="form-control" name="siswa" id="name_student">
          @foreach ($piket2 as $ruan)
            <option value="{{$ruan->NIS}}">{{$ruan->nama}}</option>
            @endforeach
          </select>
          {!! Form::label('hari', 'Hari') !!}
          {!! Form::date('hari', null, array('placeholder' => 'hari','class' => 'form-control','id' => 'day_picket')) !!}
          {!! Form::label('', 'kelas') !!}
          <select class="form-control" name="kelas" id="class_picket">
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


  <div class="modal fade" id="delete_data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Delete</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => 'piket.delete']) !!}
              @method('DELETE')
              @csrf
              <input type="hidden" name="hari" id="day_picket_delete">
              <span>Anda yakin mau menghapus data piket</span> (<span id="hari"></span>) ?
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
