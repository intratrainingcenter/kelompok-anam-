//JS class
  setTimeout(function(){
    $(document).find('.alert').fadeOut('slow');
  },3000);
  function update(id,name,student)
  {
    $(document).find('.id_class').val(id);
    $(document).find('.name_class').val(name);
    $(document).find('.total_student').val(student);
  }

  function destroy(id,name)
  {
    $(document).find('#id_class').val(id);
    $(document).find('#name_class').val(name);
    $(document).find('.name_class').text(name);
  }

  //pelajaran

  function update_pelajaran(kode,kls,guru,nama)
  {
    $(document).find('.kode').val(kode);
    $(document).find('.kelas').val(kls);
    $(document).find('.guru').val(guru);
    $(document).find('.pelajaran').val(nama);
  }
  function destroy(kode,nama_palajaran)
  {
    // alert(kode+nama);
    $(document).find('#kode_pelajaran').val(kode);
    $(document).find('.nama_palajaran').val(nama_palajaran);
    $(document).find('#nama_palajaran').text(nama_palajaran);
  }
