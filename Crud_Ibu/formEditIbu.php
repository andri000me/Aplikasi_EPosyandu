<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form>
		NIK Ibu  :<br> 
		<input type="text" id="nik_ibu"> 
	<p> 
		Nama ibu :<br> 
		<input type="text" id="nama_ibu"><br>
		Alamat :<br> 
		<input type="text" id="alamat_ibu"><br> 
		No telp :<br> 
		<input type="text" id="telp_ibu" size="30"><br> 
		
		<button id="tupdate" type="button"> UPDATE </button>
		<button onclick="window.location.href='crudIbu.php'" type="button"> BACK </button>
		<span id="status"></span>
	</form>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var option_nik_ibu;
		var nama_ibu;
		var alamat_ibu;
		var telp_ibu;
		var ibu;
    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "ambil_data_ibu.php",
					data: {func_ibu : "ambil_single_data", id_ibu: "<?php echo $_GET['id_ibu']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = JSON.parse(msg);
						nik_ibu = data['nik_ibu'];
						nama_ibu = data['nama_ibu'];
						alamat_ibu = data['alamat_ibu'];
						telp_ibu = data['no_telp_ibu'];
						

						//masukan ke masing - masing textfield
						$("#nik_ibu").val(nik_ibu);
						$("#nama_ibu").val(nama_ibu);
						$("#alamat_ibu").val(alamat_ibu);
						$("#telp_ibu").val(telp_ibu);
					}
			});

    		$("#tupdate").click(function(){
    			nik_ibu = $("#nik_ibu").val();

    			nama_ibu = $("#nama_ibu").val();
    			alamat_ibu = $("#alamat_ibu").val();
    			telp_ibu = $("#telp_ibu").val();
    			
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				ibu = {
					"nik_ibu" : nik_ibu,
					"nama_ibu" : nama_ibu,
					"alamat_ibu" : alamat_ibu,
					"no_telp_ibu" : telp_ibu
					
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudIbu.php",
    			data : {ibu : ibu, func_ibu : "update_data_ibu", id_ibu: "<?php echo $_GET['id_ibu']?>"},
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
</body>
</html>