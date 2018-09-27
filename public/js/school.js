//set time out penampilan notifikasi
  setTimeout(function(){
    $(document).find('.alert').fadeOut('slow');
  },3000);
  //pemanggilan DataTable di id
  $(document).find('#example1').DataTable();

  //JS kelas
  function update_class(id,name,wali_kelas,student)
  {
    $(document).find('.id_class').val(id);
    $(document).find('.name_class').val(name);
    $(document).find('.wali_kelas').val(wali_kelas);
    $(document).find('.total_student').val(student);
  }

  function delete_class(id,name_class)
  {
    $(document).find('#id_class').val(id);
    $(document).find('#name_class').val(name_class);
    $(document).find('.name_class').text(name_class);
  }

  //JS pelajaran
  //update pelajaran
  function update_lessons(code,code_kls,kls,guru,nama)
  {
      var option ="";
      var option_value ="";

    $(document).find('.kode').val(code);

    //penggunaan ajax untuk menampilakan data kelas
    $.ajax({
            dataType    : "json",
            data        : "GET",
            url         : location.origin+"/school/mata_pelajaran/callajax"
        }).done(function (data) {

            option_value+="<option value='"+code_kls+"'>"+kls+"</option><option value=''>Pilih Kelas</option>"
            
            //foreach data kelas
            $.each(data, function(index,result){
              option+="<option value='"+result.kode_kls+"'>"+result.nama+"</option>";
            });

            //penambahan option pada select sesuai find class
          $(document).find('.kelas').html(option_value+option);
        //pemberihatuan jika reques gagal
        }).fail(function (data) {
          console.log(data);
          console.log("error");
        });

    $(document).find('.guru').val(guru);
    $(document).find('.pelajaran').val(nama);
  }
  //hapus pelajaran
  function delete_lessons(kode,nama_palajaran)
  {
    $(document).find('#kode_pelajaran').val(kode);
    $(document).find('.nama_palajaran').val(nama_palajaran);
    $(document).find('#nama_palajaran').text(nama_palajaran);
  }

  //JS Absen
  //update absensi
  function update_absent(kode,siswa,absen,keterangan)
  {
    var option="";
    $(document).find('#kode_absen').val(kode);
    $(document).find('#name_siswa').val(siswa);

    //menampilakan value dari option
      option +="<option value='"+absen+"'>"+absen+"</option>"+
        "<option value='belum ada inputkan'>Pilih Absensi</option>"+
        "<option value='hadir'>Hadir</option>"+
        "<option value='izin'>Izin</option>"+
        "<option value='sakit'>Sakit</option>"+
        "<option value='alpa'>Alpa</option>";

    $(document).find('#absen').html(option);
    $(document).find('.keterangan').val(keterangan);
  }
  //delete absensi
  function delete_absent(kode,siswa)
  {
    $(document).find('#kode_absensi').val(kode);
    $(document).find('#siswa').text(siswa);
    $(document).find('.siswa').val(siswa);

  }

  //JS Siswa
  // update siswa
  function update_siswa( id,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,agama){

    $(document).find('#id_siswa').val(id);
    $(document).find('#nama_siswa').val(nama);
    $(document).find('#tempat_l').val(tempat_lahir);
    $(document).find('#tgl_lahir').val(tanggal_lahir);
    $(document).find('#JK').val(jenis_kelamin);
    $(document).find('#home_town').val(alamat);
    $(document).find('#religion').val(agama);
  }
  // delete siswa
  function destroy_siswa(nis,nama){

    $(document).find('#NIS').val(nis);
    $(document).find('#nama').text(nama);
  }
  function update_piket(Id,name,day,class_piket){
    $(document).find('#id_piket').val(Id);
    $(document).find('#name_student').val(name);
    $(document).find('#day_picket').val(day);
    $(document).find('#class_picket').val(class_piket);
  }
  function update_piket(day,hari){
    $(document).find('#day_picket_delete').val(day);
    $(document).find('#hari').val(hari);


  }
