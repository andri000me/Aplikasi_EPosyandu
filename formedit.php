<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_imun;
    var nama_anak;
    var id_petugas;
    var id_vaksin;
    var tgl_imun;
    var tinggi_badan;
    var berat_badan;
    var usia_saat_vaksin;
    var periode;
    var imunisasi;

    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "ambil_data_imunisasi.php",
					data: {func_imun : "ambil_single_data", id_imunisasi: "<?php echo $_GET['id_imunisasi']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = JSON.parse(msg);
						tgl_imun = data['tgl_imunisasi'];
						usia_saat_vaksin = data['usia_saat_vaksin'];
						tinggi_badan = data['tinggi_badan'];
						berat_badan = data['berat_badan'];
						periode = data['periode'];

						//masukan ke masing - masing textfield
						$("#tgl_imun").val(tgl_imun);
						$("#usia_saat_vaksin").val(usia_saat_vaksin);
						$("#tinggi_badan").val(tinggi_badan);
						$("#berat_badan").val(berat_badan);
						$("#periode").val(periode);
					}
			});

    		$("#tupdate").click(function(){
    			tgl_imun = $("#tgl_imun").val();

    			usia_saat_vaksin = $("#usia_saat_vaksin").val();
    			tinggi_badan = $("#tinggi_badan").val();
    			berat_badan = $("#berat_badan").val();
    			periode = $("#periode").val();
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				imunisasi = {
					"tgl_imun" : tgl_imun,
					"usia_saat_vaksin" : usia_saat_vaksin,
					"tinggi_badan" : tinggi_badan,
					"berat_badan" : berat_badan,
					"periode" : periode
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudImunisasi.php",
    			data : {imunisasi : imunisasi, func_imun : "update_data_imun", id_imunisasi: "<?php echo $_GET['id_imunisasi']?>"},
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
		Tanggal Imunisasi : 
		<input type="date" id="tgl_imun"><p>
		Usia Saat Vaksin : 
		<input type="text" id="usia_saat_vaksin"><p>
		Tinggi Badan : 
		<input type="text" id="tinggi_badan"><p>
		Berat Badan : 
		<input type="text" id="berat_badan"><p>
		Periode : 
		<input type="text" id="periode"><p>
		<button id="tupdate" type="button"> UPDATE </button>
		<button onclick="window.location.href='crudImunisasi.php'" type="button"> KEMBALI </button>
		<span id="status"></span>
	</form>
</body>
</html>