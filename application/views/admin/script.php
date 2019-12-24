<script>
  $(document).ready( function () {
    tampil_data();

    $('#example1').DataTable();

    function tampil_data(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>sirkulasi/transaksi',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                                '<td>'+data[i].id_pinjam+'</td>'+
                                '<td>'+data[i].tgl_pinjam+'</td>'+
                                '<td>'+data[i].tgl_kembali+'</td>'+
                            '</tr>';
                }
                $('#data_pinjam').html(html);
            }

        });
    }

    // reset FORM TAMBAH
    $(document).on('click', '#btn_tambah', function(event) {
      event.preventDefault();
      $('#form')[0].reset(); // reset form on modals
    });

    //GET UPDATE
    $('#data_barang').on('click','.item_edit',function(){
        var id=$(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('index.php/barang/edit')?>/" + id,
            dataType : "JSON",
            success: function(data){
              $('#modal_edit').modal('show');
              $('[name="id"]').val(data.id);
              $('[name="nama"]').val(data.nama);
              $('[name="berat"]').val(data.berat);
            }
        });
        return false;
    });

    //Simpan Barang
    $('#btn_simpan').on('click',function(){
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/create')?>",
            dataType : "JSON",
            data: $('#form').serialize(),
            success: function(data){
                $('#modal_add').modal('hide');
                tampil_data();
            }
        });
        return false;
    });


    //GET HAPUS
    $('#data_barang').on('click','.item_hapus',function(){
      if (confirm('Apa anda yakin ingin menghapus data ini')) {
        var id=$(this).attr('data');
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url('index.php/barang/delete')?>/" + id,
          dataType : "JSON",
          success: function(data){
            tampil_data();
          }
        });
        return false;          
      }
    });

  } );    
</script>