<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_posyandu;
    var nama_posyandu;
    var alamat_posyandu;
    var kel_posyandu;
    var kec_posyandu;
    var kota_kab_posyandu;
    var posyandu;

    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudPosyandu.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "ambil_data_posyandu.php",
					data: {func_posyandu : "ambil_single_data", id_posyandu: "<?php echo $_GET['id_posyandu']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = JSON.parse(msg);
						nama_posyandu = data['nama_posyandu'];
						alamat_posyandu = data['alamat_posyandu'];
						kel_posyandu = data['kel_posyandu'];
						kec_posyandu = data['kec_posyandu'];
						kota_kab_posyandu = data['kota_kab_posyandu'];

						//masukan ke masing - masing textfield
						$("#nama_posyandu").val(nama_posyandu);
						$("#alamat_posyandu").val(alamat_posyandu);
						$("#kel_posyandu").val(kel_posyandu);
						$("#kec_posyandu").val(kec_posyandu);
						$("#kota_kab_posyandu").val(kota_kab_posyandu);
					}
			});

    		$("#tupdate").click(function(){
    			nama_posyandu = $("#nama_posyandu").val();

    			alamat_posyandu = $("#alamat_posyandu").val();
    			kel_posyandu = $("#kel_posyandu").val();
    			kec_posyandu = $("#kec_posyandu").val();
    			kota_kab_posyandu = $("#kota_kab_posyandu").val();
				posyandu = {
					"nama_posyandu" : nama_posyandu,
					"alamat_posyandu" : alamat_posyandu,
					"kel_posyandu" : kel_posyandu,
					"kec_posyandu" : kec_posyandu,
					"kota_kab_posyandu" : kota_kab_posyandu
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudPosyandu.php",
    			data : {posyandu : posyandu, func_posyandu : "update_data_posyandu", id_posyandu: "<?php echo $_GET['id_posyandu']?>"},
    			cache : false,
    			success : function(msg){
    				if(msg=="sukses"){
    					$("#status").html("Update Berhasil. . . ");
    				}else{
    					$("#status").html("ERROR. . . ");
    				}
    				$("#loading").hide();
       			}
    		});
    		});
    	});
    });
 	</script>
</head>
<body>
	<form>
		Nama Posyandu : 
		<input type="text" id="nama_posyandu"><p>
		Alamat Posyandu : 
		<input type="text" id="alamat_posyandu"><p>
		Kelurahan Posyandu : 
		<input type="text" id="kel_posyandu"><p>
		Kecamatan Posyandu : 
		<input type="text" id="kec_posyandu"><p>
		Kota/Kabupaten Posyandu : 
		<input type="text" id="kota_kab_posyandu"><p>
		<button id="tupdate" type="button"> UPDATE </button>
		<button onclick="window.location.href='crudPosyandu.php'" type="button"> KEMBALI </button>
		<span id="status"></span>
	</form>
</body>
</html>