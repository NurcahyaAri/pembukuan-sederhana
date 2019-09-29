
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
            </div>
            <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3" id="tablePengembalian">
                            <thead>
                                <tr>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Nama Peminjam</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

<!-- Modal -->
<div class="modal fade col" id="kembaliSebagian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:90% !important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Barang yang akan kembali</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="peminjamanForm" method="post">
      <div class="modal-body">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <div class="row">
                <div class="col-md-12">
                    <div id="moreItems"></div>
                </div>
            </div>
            <!-- </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <a href="" id="printNota"><button type="button" class="btn btn-secondary">Print Nota</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="simpanData">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#tablePengembalian").DataTable({
            dom: "l<'toolbar'>frtip", //buat custom toolbar
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?php echo base_url()?>pengembalian/json", 
                "type": "POST"
            },
            columns: [
                {
                    "data": "tanggal_sewa",
                    "orderable": true,
                    "searchable" : false,
                    "render" : function(data, row ,index){
                        console.log(data);
                        return moment.unix(data/1000).format("DD MMM YYYY")
                    }
                },
                {
                    "data": "tanggal_kadaluarsa",
                    "searchable" : false,
                    "render" : function(data, row ,index){
                        console.log(data);
                        return moment.unix(data/1000).format("DD MMM YYYY")
                    }
                },
                {"data": "nama"},
                {
                    "data": "id_nota",
                    "orderable": false,
                    "searchable": false,
                    "className": "text-center",
                    "render": function(data, type, row) {
                        var sebagian = '<button class="btn btn-xs btn-warning btn-edit" onClick="sebagian('+ data +')" id="btn-edit_'+data+'" data-id="'+data+'" data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Reading">Sebagian</button>';
                        var full = '<button class="btn btn-xs btn-success btn-hapus" onCLick="kembaliFull('+ data +')" id="btn-hapus_'+data+'" data-id="'+data+'" data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Removing">Kembali</button>';
                        return sebagian + ' '+ full ;
                    }
                }
            ]
        });
    })
</script>

<script>
    function kembaliFull(id){
        $.ajax({
            method : 'POST',
            url : "<?php echo base_url()?>pengembalian/pengembalianFull",
            data : {
                id : id
            },
            success : function(res){
                $("#tablePengembalian").DataTable().ajax.reload();
                console.log(res);
            },
            error : function(err){
                console.log(err);
            }
        })
    }
    
    function sebagian(id){
        $.ajax({
            method : 'POST',
            url : "<?php echo base_url()?>pengembalian/lihatStatusDataBarang",
            data : {
                id : id
            },
            dataType: 'JSON',
            success : function(res){
                console.log(res);
                let html = "" ;
                for(var i = 0; i < res.length; i++){
                    html += `
                    <div class="form-group">
                        <input type="hidden" value="${res[i].id_barang}" name="id_barang"/>
                        <input type="hidden" value="${res[i].id_customer}" name="id_customers"/>
                        <input type="hidden" value="${res[i].id_nota}" name="id_nota"/>
                        <label for="namaBarang">
                            <h4 id="namaBarang">${res[i].nama_barang}</h4>
                        </label>
                    `
                    for(var j = 0; j < res[i].kelengkapan.kelengkapan.length; j++){
                        html += `<div class="input-group mb-2">
                                    <input class="form-check-input" type="checkbox" value="${res[i].kelengkapan.id[j]}" name="kelengkapan" id="item${i}">${res[i].kelengkapan.kelengkapan[j]}
                                </div>`
                    }
                    html += '</div>';
                }
                $("#moreItems").html(`
                    <div class="col-md-6">${html}</div>   
                `);
                $("#kembaliSebagian").modal('show');

            },
            error : function(err){
            }
        })
    }

    $("#simpanData").click(function(e){
        e.preventDefault()
        console.log($("#peminjamanForm").serializeObject());
        $.ajax({
            method : 'POST',
            url : "<?php echo base_url()?>pengembalian/simpanSebagian",
            data : $("#peminjamanForm").serializeObject(),
            dataType : 'JSON',
            success : function(res){
                console.log(res);
                window.location.reload();
                $("#tablePengembalian").DataTable().ajax.reload();
            }
        })
    })
</script>
