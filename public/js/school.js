//JS class

  function update(id,name,student)
  {
    $(document).find('.id_class').val(id);
    $(document).find('.name_class').val(name);
    $(document).find('.total_student').val(student);
  }

  function destroy(id,name)
  {
    $(document).find('#id_class').val(id);
    $(document).find('#name_class').text(name);
  }
