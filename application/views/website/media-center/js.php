<!--  call event function -->
<script type="text/javascript">
    $(document).ready(function(){
        load(); // load tb
        // click simpan 
        $("#btn_cari").click(function(){  
            var nama_media_center=$('#filter_nama_media_center').val();
            var deskripsi=$('#filter_deskripsi').val();
            var id_tipe_media=$('#filter_id_tipe_media').val();
            load(nama_media_center, deskripsi, id_tipe_media); 
        });
        // click simpan 
        $("#btn_reset").click(function(){  
            load();
        });
        // click simpan 
        $("#btn_simpan").click(function(){      
            simpan();
        });
        // click hapus 
        $("#btn_hapus").click(function(){      
            hapus();
        });

    });
</script>
<!-- Function detail :  -->
<script type="text/javascript">
    // load data table
    function load(nama_media_center='', deskripsi='', id_tipe_media='') {
        closeModal();
        var t_table = $('#tb_data').DataTable();
        t_table.destroy();
        t_table = $('#tb_data').DataTable( {
            "ajax": {
                "url": "<?php echo base_url('website/media_center/load_json') ?>",
                "type": "POST",
                "data": {"nama_media_center": nama_media_center, "deskripsi": deskripsi, "id_tipe_media": id_tipe_media},
            },
            "language": {
              "emptyTable": "No data available in table",
              "zeroRecords": "No records to display"
            },
            searching: false,
        } );
       // t_table.destroy();
    } 

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#attachment").change(function(){
        readURL(this);
    });

    function form_add(){
        $("#form").val('add_process'); // set untuk form add
        clearContent();
        openModal();
    }

    function form_edit(data_id=""){
        $("#form").val('edit_process'); // set untuk form edit
        $('#dataForm').removeClass('error');
        //alert(data_id);
        $.ajax({// menggunakan ajax form
            url: "<?php echo base_url('website/media_center/get_detail_data'); ?>",
            type: "POST",
            data: {"data_id": data_id},
            beforeSend: function () {
                // non removable loading
                // $('#loading_modal').modal({
                //     backdrop: 'static', keyboard: false
                // });
            },
            success: function (output) {
                var output = $.parseJSON(output);
                //alert(JSON.stringify(output));
                $("#id_media_center").val(output.data.id_media_center);
                $("#nama_media_center").val(output.data.nama_media_center);
                $("#deskripsi").val(output.data.deskripsi);
                $("#id_tipe_media").val(output.data.id_tipe_media);
                $("#gambar_edit").val(output.data.gambar);
                document.getElementById("image-preview").src = "../assets/img/upload/" + output.data.gambar;
                openModal();
            },
        });
    }

    // proses tambah data
    function simpan() {        
         var form=$('#form').val(); // cek form edit / form add
        var dataForm=$('form#dataForm')[0];
        var data = new FormData(dataForm);   
        
        $.ajax({
            url: "<?php echo base_url('website/media_center/'); ?>" + form,
            type: "POST",
            data:data,
            processData: false,
            contentType: false,
            beforeSubmit: function() {
                //loading
            },
            success: function(msg) {
                var msg=$.parseJSON(msg);
                $('#msg_validation').html('');
                // jika form tidak valid
                if(msg.type=='success'){
                    swal(msg.title, msg.pesan, msg.type);
                    load();
                }
                else if(msg.type=='invalid'){
                    var str ="";
                    $('#dataForm').addClass('error');
                    $.each( msg.data, function( i, val ) {
                        str = "<li>" + val + "</li>";
                        $("#msg_validation").append(str);
                    });
                }else{
                    swal(msg.title, msg.pesan, msg.type);
                }
            },
        }); 
    }


    function form_hapus(data_id=""){
        swal({
              title: 'Hapus Data',
              text: "Apakah Anda ingin menghapus data ini? #" + data_id,
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#999',
              confirmButtonText: 'Hapus',
              cancelButtonText: 'Batal'
          }).then(value => {
             $.ajax({// menggunakan ajax form
                url: "<?php echo base_url('website/media_center/delete_process'); ?>",
                type: "POST",
                data: {
                    "id_hapus":data_id
                },
                beforeSend: function () {
                    // non removable loading
                    // $('#loading_modal').modal({
                    //     backdrop: 'static', keyboard: false
                    // });
                },
                success: function (msg) {
                    var msg=$.parseJSON(msg);
                    load();
                    swal(
                      'Deleted!',
                      msg.pesan,
                      'success'
                      );
                },
            });
        }).catch(swal.noop)
    }

    // untuk membersihkan form tambah / edit
    function clearContent(){
        $('#msg_validation').html('');
        $('#dataForm')[0].reset();
        $('#dataForm').removeClass('error');
    }
</script>