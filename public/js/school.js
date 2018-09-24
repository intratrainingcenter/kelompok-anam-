//JS class
  setTimeout(function(){
    $(document).find('.alert').fadeOut('slow');
  },3000);

  // $(document).find('#example1').DataTable();
  function update(id,name,student)
  {
    $(document).find('.id_class').val(id);
    $(document).find('.name_class').val(name);
    $(document).find('.total_student').val(student);
  }

  function delete_kelas(id,name_class)
  {
    $(document).find('#id_class').val(id);
    $(document).find('#name_class').val(name_class);
    $(document).find('.name_class').text(name_class);
  }

  //JS pelajaran

  function update_pelajaran(kode,kls,guru,nama)
  {
    $(document).find('.kode').val(kode);
    $(document).find('.kelas').val(kls);
    $(document).find('.guru').val(guru);
    $(document).find('.pelajaran').val(nama);
  }
  function destroy(kode,nama_palajaran)
  {
    $(document).find('#kode_pelajaran').val(kode);
    $(document).find('.nama_palajaran').val(nama_palajaran);
    $(document).find('#nama_palajaran').text(nama_palajaran);
  }

  //JS Absen
  function update_absensi(kode,siswa,tanggal,absen,keterangan)
  {
    $(document).find('.siswa').val(kode);
    $(document).find('.tanggal').val(tanggal);
    $(document).find('.absen').val(absen);
    $(document).find('.keterangan').val(keterangan);
  }
  function destroy_absensi(kode,siswa)
  {
    $(document).find('#kode_absen').val(kode);
    $(document).find('#siswa').text(siswa);
    $(document).find('.siswa').val(siswa);

  }
