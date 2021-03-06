
<style>
    .addItems:hover{
        cursor:pointer;
        /* background-color : #007bff; */
    }

    .removeItems:hover{
        cursor:pointer;
        /* background-color : #007bff; */
    }

    .namaBarangGroup {
        height : 40px;
    }
    .kelengkapanBarang{
        height : 80px;
    }
</style>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40 col-md-12">
                        <table class="table table-borderless table-data3" id="peminjaman">
                            <thead>
                                <tr>
                                    <th>Tanggal Sewa</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Nama Peminjam</th>
                                    <th>Terbayar</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            
            </div>
            
        </div>
    </div>
</div>


<!-- modal -->

<!-- Modal -->
<div class="modal fade col" id="addPeminjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:90% !important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Peminjam</h5>
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
                    <div class="form-group">
                        <label for="namaBarang">Barang</label>
                        <div class="input-group mb-2">
                            <div class="form-row">
                                <input type="hidden" name="id" id="id">
                                <div class="col-md-5 input-group namaBarangGroup">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text btn btn-success addItems" id="addItems"><i class="fas fa-plus"></i></div>
                                    </div>
                                    <input type="text" class="form-control namaBarang" id="namaBarang" name="namaBarang[]" placeholder="Nama Barang">
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control kelengkapanBarang" value="" id="kelengkapanBarang" name="kelengkapanBarang[]" placeholder="kelengkapan barang" height="80px"></textarea>
                                    <!-- <input type="text" class="form-control kelengkapanBarang" value="" id="kelengkapanBarang" name="kelengkapanBarang" placeholder="kelengkapan barang" ></input> -->
                                </div>
                                <div class="col-md-2"><input type="number" class="form-control hargaBarang" onChange="changeValue(this)" onKeyUp="changeHargaTotalPinjaman(this)" value="0" id="hargaBarang" name="hargaBarang[]" placeholder="Harga Barang"></div>
                                <div class="col-md-1"><input type="number" class="form-control jumlahBarang" value="0" onKeyUp="changeHargaTotalPinjaman(this)"  id="jumlahBarang" name="jumlahBarang[]" placeholder="jumlah Barang"></div>
                            </div>
                        </div>
                    </div>
                    <div id="moreItems"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="namaPeminjam">Nama Peminjam</label>
                        <input type="text" class="form-control col-md-12 namaPeminjam" id="namaPeminjam" name="namaPeminjam" placeholder="Nama Peminjam">
                    </div>
                    <div class="form-group">
                        <label for="tanggalPinjam">Nomor Handphone</label>
                        <input type="text" class="form-control col-md-12 nomorHP" id="nomorHP" name="noHP" placeholder="Nomor Handphone">
                    </div>
                    <div class="form-group">
                        <label for="tanggalPinjam">Harga Pinjaman</label>
                        <input type="text" class="form-control col-md-12 hargaPinjaman" id="hargaPinjaman" name="hargaPinjaman" value="0" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Ambil</label>
                        <div class="input-group date" id="datePickerTglAmbil">
                            <input type="text" class="form-control date-picker" id="tglAmbil" name="data_start" value="<?= date('m/d/Y')?>">
                            <div class="input-group-addon">
                                <i class="far fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Kembali</label>
                        <div class="input-group date" id="datePickerTglKembali">
                            <input type="text" class="form-control date-picker" id="tglKembali" name="data_end" value="<?= date('m/d/Y', strtotime(date('m/d/Y') . ' +3 day'))?>">
                            <div class="input-group-addon">
                                <i class="far fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <!-- <div class="form-group">
                        <label for="tanggalPinjam">Catatan</label>
                        <textarea id="summernote" name="editordata"></textarea>
                    </div> -->
                    <div class="form-group">
                        <input type="checkbox" name="isDp" id="isDp">
                        <label for="tanggalPinjam">Apakah DP?</label>
                    </div>
                    <!-- <div class="form-group" id="sudahKembali">
                        <input type="checkbox" name="sudahKembali">
                        <label for="tanggalPinjam">Sudah Kembali?</label>
                    </div> -->
                    <div id="ifDp">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Jumlah DP" name="dpTerbayar" id="dpTerbayar">
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <a href="" target='_blank' id="printNota"><button type="button" class="btn btn-secondary">Print Nota</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="simpanData">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end modal -->

<script>

$(document).ready(function(){
    $("#sudahKembali").hide();
    $("#ifDp").hide();
    $("#peminjaman").DataTable({
        dom: "l<'toolbar'>frtip", //buat custom toolbar
        processing: true,
        serverSide: true,
        ajax: {
            "url": "<?php echo base_url()?>peminjaman/json", 
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
            {"data": "terbayar"},
            {"data": "status"},
            {
                "data": "id_nota",
                "orderable": false,
                "searchable": false,
                "className": "text-center",
                "render": function(data, type, row) {
                    var dt_edit = '<button class="btn btn-xs btn-warning btn-edit" onClick="editData('+ data +')" id="btn-edit_'+data+'" data-id="'+data+'" data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Reading"><i class="fa fa-edit"></i></button>';
                    var dt_hapus = '<button class="btn btn-xs btn-danger btn-hapus" onClick="deleteData('+ data +')" id="btn-hapus_'+data+'" data-id="'+data+'" data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Removing"><i class="fa fa-trash"></i></button>';
                    var dt_kembali = ''
                    if(row.status === "belum_lunas"){
                         dt_kembali =  '<button class="btn btn-xs btn-success btn-lunas" onClick="changeStatus('+ data +')" data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i> Removing">Lunas</button>';
                    }
                    return dt_edit+' '+dt_hapus + ' ' + dt_kembali;
                }
            }
        ]
    });

    $('#datePickerTglAmbil').datepicker();
    $('#datePickerTglAmbil').on('changeDate', function() {
        $('#my_hidden_input').val(
            $('#tglAmbil').datepicker('getFormattedDate')
        );
    });

    $('#datePickerTglKembali').datepicker();
    $('#datePickerTglKembali').on('changeDate', function() {
        $('#my_hidden_input').val(
            $('#tglKembali').datepicker('getFormattedDate')
        );
    });

    $("#summernote").summernote({
        tabsize: 2,
        height: 100
    });

    $("div.toolbar").html(''+
                '<div class="btn-group pull-right">'+
                    '<button type="button" class="btn btn-info" id="addPeminjam" style="margin-left:5px; padding:4px 10px;"><span class="glyphicon glyphicon-plus"></span> Add New</button>'+
                '</div>');

    $("#addPeminjam").click(function(){
        $("#addPeminjamModal").modal("show");
    })

    $("#addPeminjamModal").on("hidden.bs.modal", function(){
        $("#sudahKembali").hide();
    })

    var start = moment();
			var end = moment();
			//inisialisasi variabel
			var d = new Date();
			var e=d.getTimezoneOffset();
			var timeZone = (e*60*-1) * 1000; //timezone diff in millisecond

			function cb(start) { //simpan value millis hari ini
				$('#daterangepicker_value').html(start.format('D/M/Y hh:mm') + ' - ' + end.format('D/M/Y hh:mm'));

				//convert
				var startDate=start.format('D/M/Y hh:mm');
				var millis_start = startDate;
				var millis_end = startDate;
				// var millis_end = eval(millis_end+99999); //ambil akhir dari hari

				//setting ke form
				$('#form_date_start').val(millis_start);
				$('#form_date_end').val(millis_end);
				$('#form_date_diff').val(timeZone);
			}

			function cb2(start, end) {
				$('#daterangepicker_value').html(start.format('D/M/Y hh:mm') + ' - ' + end.format('D/M/Y hh:mm'));
				var startDate=start.format('D/M/Y hh:mm');
				var endDate=end.format('D/M/Y hh:mm');

				//date to millis
				var millis_start = startDate;
				var millis_end = endDate;
				// var millis_end = eval(millis_end+99999); //ambil akhir dari hari

				//setting ke form
				$('#form_date_start').val(millis_start);
				$('#form_date_end').val(millis_end);
				$('#form_date_diff').val(timeZone);
			}

			$('#daterangepicker').daterangepicker({
				timePicker: true,
				timePicker24Hour: true,
				startDate: start,
				endDate: end,
			}, cb2); //setelah di-klik

			cb(start); //pertamakali di load

    
    $("#addItems").click(function(){
        $("#moreItems").append(`
            <div class="input-group mb-2">
                <div class="form-row">
                    <div class="col-md-5 input-group mb-2 namaBarangGroup">
                        <div class="input-group-prepend">
                        <div class="input-group-text btn btn-danger removeItems" onClick="removeItems(this)" id="removeItems"><i class="fas fa-minus"></i></div>
                        </div>
                        <input type="text" class="form-control namaBarang" id="namaBarang"  name="namaBarang[]" placeholder="Nama Barang">
                    </div>
                    <div class="col-md-4">
                    <textarea class="form-control kelengkapanBarang" value="" id="kelengkapanBarang" name="kelengkapanBarang[]" placeholder="kelengkapan barang" height="80px"></textarea>
                    </div>
                    <div class="col-md-2"><input type="number" class="form-control hargaBarang" onChange="changeValue(this)" onKeyUp="changeHargaTotalPinjaman(this)" value="0" id="hargaBarang" name="hargaBarang[]" placeholder="Harga Barang"></div>
                    <div class="col-md-1"><input type="number" class="form-control jumlahBarang" value="0" id="jumlahBarang" name="jumlahBarang[]" onKeyUp="changeHargaTotalPinjaman(this)"  value="0" placeholder="jumlah Barang"></div>
                </div>
            </div>
            
        `);
    })

    $("#isDp").on('click', function(){
        console.log("hello");
        $("#isDp").prop('checked')
        if($("#isDp").prop('checked')){
            $("#ifDp").show();
        } else {
            $("#ifDp").hide();
        }
    })

    $("#peminjamanForm").on("submit", function(e){
        e.preventDefault();
        r = $("#peminjamanForm").serializeObject();
        console.log(r);
        $.ajax({
            method : 'POST',
            url : '<?=base_url()?>/peminjaman/save',
            data : r,
            success : function(e){
                alert("berhasil tersimpan")
                $("#addPeminjamModal").modal("show");
                $("#peminjaman").DataTable().ajax.reload();
            },
            error : function(e){
                console.log(e);
                alert("gagal tersimpan")
            }
        })
        
    })

    $('#addPeminjamModal').on('hidden.bs.modal', function () {
        $(".removeItems").click();
        $("#id").val("");
        $("#namaPeminjam").val("");
        $("#nomorHP").val("");
        $("#tglAmbil").val("<?= date('m/d/Y')?>")
        $("#tglKembali").val("<?= date('m/d/Y', strtotime(date('m/d/Y') . ' +3 day'))?>")
        $("#hargaPinjaman").val("");
        $(".namaBarang").val("");
        $(".kelengkapanBarang").val("");
        $(".hargaBarang").val("");
        $(".jumlahBarang").val("");
    })


})
</script>

<script>
    function removeItems(e){
        $(e).parent().parent().parent().parent().remove()
    }
    function AddItem(){
        $("#moreItems").append(`
            <div class="input-group mb-2">
                <div class="form-row">
                    <div class="col-md-5 input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text btn btn-danger removeItems" onClick="removeItems(this)" id="removeItems"><i class="fas fa-minus"></i></div>
                        </div>
                        <input type="text" class="form-control namaBarang" id="namaBarang"  name="namaBarang[]" placeholder="Nama Barang">
                    </div>
                    <div class="col-md-4"><input type="text" class="form-control kelengkapanBarang" name="kelengkapanBarang[]" value="" id="kelengkapanBarang" placeholder="kelengkapan barang" ></input></div>
                    <div class="col-md-2"><input type="number" class="form-control hargaBarang" onChange="changeValue(this)" onKeyUp="changeHargaTotalPinjaman(this)" value="0" id="hargaBarang" name="hargaBarang[]" placeholder="Harga Barang"></div>
                    <div class="col-md-1"><input type="number" class="form-control jumlahBarang" value="0" id="jumlahBarang" name="jumlahBarang[]" onKeyUp="changeHargaTotalPinjaman(this)"  value="0" placeholder="jumlah Barang"></div>
                </div>
            </div>
            
        `);
    }


    function changeStatus(id){
        console.log(id);
        $.ajax({
            method : 'POST',
            url : "<?= base_url()?>peminjaman/setStatusLunas",
            data : {
                id : id
            },
            dataType : "JSON",
            success : function(res){
                $("#peminjaman").DataTable().ajax.reload();
            }
        })
    }

    function deleteData(id){
        $.ajax({
            method : "POST",
            url : "<?= base_url()?>peminjaman/delete",
            data : {
                id : id
            },
            dataType : "JSON",
            success : function(res){
                console.log("Success");
                $("#peminjaman").DataTable().ajax.reload();
            },
            error : function(err){
                console.log("error");
            }
        })
    }

    function editData(id) {
        console.log(id);
        $.ajax({
            method : "POST",
            url : "<?= base_url()?>peminjaman/getDataById",
            data : {
                id : id
            },
            dataType : "JSON",
            success : function(res){
                $("#id").val(res[0].id_nota);
                $("#printNota").attr('href', '<?php echo base_url();?>peminjaman/invoice/' + res[0].id_nota);
                $("#namaPeminjam").val(res[0].nama);
                $("#nomorHP").val(res[0].nomer_handphone);
                $("#tglAmbil").val(moment.unix(res[0].tanggal_sewa/1000).format("M/D/YYYY"))
                $("#tglKembali").val(moment.unix(res[0].tanggal_kadaluarsa/1000).format("M/D/YYYY"))
                console.log(moment.unix(res[0].tanggal_sewa/1000).format("M/D/YYYY"))
                if(res[0].status == "belum_lunas"){
                    console.log("GGGGG")
                    $("#isDp").prop("checked");
                    $("#isDp").click();
                    $("#dpTerbayar").val(res[0].terbayar);
                } else {
                    // $("#simpanData").prop("disabled", true);
                    $("#isDp").prop("disabled", true);
                }
                var terbayar = 0;
                for(var i = 1; i < res.length; i++){
                    AddItem();
                }

                for(var i = 0; i < res.length; i++){
                    terbayar = parseInt(terbayar) + parseInt(res[i].harga_sewa);
                    $("#hargaPinjaman").val(terbayar);
                    $($(".namaBarang")[i]).val(res[i].nama_barang);
                    $($(".kelengkapanBarang")[i]).val(res[i].kelengkapan);
                    $($(".jumlahBarang")[i]).val(res[i].jumlah_barang);
                    $($(".hargaBarang")[i]).val(res[i].harga_sewa);
                }

                
                $("#peminjaman").DataTable().ajax.reload();
                $("#addPeminjamModal").modal("show");
            },
            error : function(err){
                alert("an error occupet")
            }
        })
    }

    function changeValue(e){
        let barang = $(".hargaBarang");
        let hargaBarang = 0;
        for(let i = 0; i < barang.length; i++){
            if($($(".hargaBarang")[i]).val() == ""){
                $($(".hargaBarang")[i]).val(0)
            }
            if($($(".jumlahBarang")[i]).val() == ""){
                $($(".jumlahBarang")[i]).val(0)
            }
            hargaBarang = parseInt(hargaBarang) + (parseInt($($(".hargaBarang")[i]).val()) *  $($(".jumlahBarang")[i]).val());
        }
        $("#hargaPinjaman").val(hargaBarang);
    }

    function changeHargaTotalPinjaman(e){
        // let hargaPinjaman = parseInt($("#hargaPinjaman").val());
        let barang = $(".hargaBarang");
        let hargaBarang = 0;
        for(let i = 0; i < barang.length; i++){
            if($($(".hargaBarang")[i]).val() == ""){
                // $($(".hargaBarang")[i]).val(0)
            }
            hargaBarang = parseInt(hargaBarang) + parseInt($($(".hargaBarang")[i]).val())*  parseInt($($(".jumlahBarang")[i]).val());
        }
    

        if(isNaN(hargaBarang)){
            $("#hargaPinjaman").val(0);
        } else {
            $("#hargaPinjaman").val(hargaBarang);
        }
    }
</script>