@extends('template.apps')

@section('JS')
  <script type="text/javascript" src="{{asset('js/school.js')}}"></script>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
      <h1>
      Edit
      <small>Daftar piket</small>
    </h1>
    <hr>
          {!! Form::open(['route' => 'piket.update']) !!}
              @method('POST')
              @csrf
            <input type="hidden" name="id_piket" id="id_piket" value="{{$picket->id}}">
          {!! Form::label('', 'Siswa') !!}
          <select class="form-control" name="siswa" id="name_student">
            <option value="{{$picket->NIS}}">{{$picket->siswa->nama}}</option>
            <option value="" disabled="true">-----pilih-----</option>
            @foreach ($picket_student as $ruan)
            <option value="{{$ruan->NIS}}">{{$ruan->nama}}</option>
            @endforeach
          </select>
          {!! Form::label('hari', 'Hari') !!}
          <select class="form-control" name="hari" id="day_picket">
          <option value="{{$picket->hari}}">{{$picket->hari}}</option>
          <option value="" disabled="true">-----pilih-----</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
          </select>
          {!! Form::label('', 'kelas') !!}
          <select class="form-control" name="kelas" id="class_picket">
            <option value="{{$picket->kode_kls}}">{{$picket->kelas->nama}}</option>
            <option value="" disabled="true">-----pilih-----</option>
            @foreach ($picket_class as $ruans)
            <option value="{{$ruans->kode_kls}}">{{$ruans->nama}}</option>
            @endforeach
          </select>
         
      </div>
      <a href="{{Route('piket.detail')}}" type="button" class="btn btn-danger pull-left" >Cancel</a>
    <button type="submit" class="btn btn-primary pull-right">Save</button>
    {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection