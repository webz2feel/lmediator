<script>
    $(function() {
       $('#create-modal').on('click', function(e) {
           e.preventDefault();
            $('.modal-title').text('Add Category');
            $('#action').val('add');
            $('#options_modal').modal('show');
       }) ;
       $('#category-form').on('submit', function(e) {
          e.preventDefault();
          let action = $('#action').val();
          if(action === 'add'){
              $.ajax({
                  url: "{{ route('admin.category.store') }}",
                  method: 'POST',
                  data: new FormData(this),
                  contentType: false,
                  cache: false,
                  processData: false,
                  dataType: 'json',
                  success: function(data){
                      let html = '';
                      if(data.errors) {
                          html += '<div class="alert alert-danger alert-styled-left alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button>\n' +
                              '        <h5><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Error</h5>';
                          for (let count = 0; count < data.errors.length; count++) {
                              html += '<p>' + data.errors[count] + '</p>';
                          }
                          html += '</div>';
                          $('#form_result').html(html);
                      }else {
                          $('#category-form')[0].reset();
                          $('#options_modal').modal('hide');
                          swal.fire({
                              title: 'Good job!',
                              text: data.success,
                              type: 'success',
                              confirmButtonClass: 'btn btn-primary',
                          });
                          $('#data-table').DataTable().ajax.reload();
                      }
                  }
              })
          }
       });
    });
</script>
