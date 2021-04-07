<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
		Nama Vaksin : 
		<input type="text" id="nama_vaksin"><p>
		<button id="tupdate" type="button"> UPDATE </button>
		<button onclick="window.location.href='crudVaksin.php'" type="button"> KEMBALI </button>
		<span id="status"></span>
	</form>
    
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_vaksin;
    var nama_vaksin;
    var vaksin;

    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "ambil_data_vaksin.php",
					data: {func_vaksin : "ambil_single_data", id_vaksin : "<?php echo $_GET['id_vaksin']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = JSON.parse(msg);
						nama_vaksin = data['nama_vaksin'];

						//masukan ke masing - masing textfield
						$("#nama_vaksin").val(nama_vaksin);
					}
			});

    		$("#tupdate").click(function(){
    			nama_vaksin = $("#nama_vaksin").val();

    		
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				vaksin = {
					"nama_vaksin" : nama_vaksin
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudVaksin.php",
    			data : {vaksin : vaksin, func_vaksin : "update_data_vaksin", id_vaksin: "<?php echo $_GET['id_vaksin']?>"},
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