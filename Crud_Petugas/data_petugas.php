<head>

</head>
<body>
	<br>Nama Petugas : <select id="option_nama_petugas"></select> <br> 
	<a id="formtambah" style="cursor:pointer;color:blue;"><u>Tambah Data Petugas</u></a> 
	<p style="display:none" id="formnik"> 
		Nama Petugas  :<br> 
		<input type="text" id="nama_petugas"> 
	</p> 

	<p> 
	Jabatan :<br> 
	<input type="text" id="jabatan_petugas"><p> 
	Jenis Kelamin :<br> 
	<input type="radio" value="L" id="laki" name="jk_petugas">Laki - Laki
	<input type="radio" value="P" id="perempuan" name="jk_petugas">Perempuan <p>
	Tempat Lahir :<br> 
	<input type="text" id="temp_lahir_petugas"><p>
	Tanggal Lahir :<br>
	<input type="date" id="tgl_lahir_petugas"><p>
	Alamat :<br>
	<input type="text" id="alamat_petugas" size="30"><p>
	No Telepon :<br>
	<input type="text" id="telp_petugas"><p>
	Status :<br>
	<input type="text" id="status_petugas"><p><br>
	<button type="button" id="tupdate">UPDATE</button> 
	<button type="button" id="tdelete">DEL</button> 
	<button type="button" id="ttambah">TAMBAH</button><br><br>
	<button onclick="window.location.href='crudpetugas.html'">BACK TO TABLE</a></button><br><br>
	<button onclick="window.location.href='../home.html'">BACK TO HOME</a></button><br> 
	<span id="status"></span>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var option_nama_petugas;
		var jabatan_petugas;
		var jk_petugas;
		var temp_lahir_petugas;
		var tgl_lahir_petugas;
		var alamat_petugas;
		var telp_petugas;
		var status_petugas;
		var data_petugas;
		
		$(document).ready(function(){
			//meloading option NIK dari database
			$("#option_nama_petugas").load("prosesCrudPetugas.php", "func_petugas=ambil_option_petugas");

			//jika ada event onchange ambil data dari database
			$("#option_nama_petugas").change(function(){
				//ambil nilai nik dari form
				option_nama_petugas = $("#option_nama_petugas").val();
			

				//lakukan pengiriman data 
				$.ajax({
					url: "prosesCrudPetugas.php",
					data: "func_petugas=ambil_data_petugas&option_nama_petugas="+option_nama_petugas,
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg.split("|");

						//masukan ke masing - masing textfield
						$("#jabatan_petugas").val(data[0]);
						if (data[1] == 'L'){
							$("#laki").prop("checked", true);
							$("#perempuan").prop("checked", false);
						} else {
							$("#perempuan").prop("checked", true);
							$("#laki").prop("checked", false);
						}
						$("#temp_lahir_petugas").val(data[2]);
						$("#tgl_lahir_petugas").val(data[3]);
						$("#alamat_petugas").val(data[4]);
						$("#telp_petugas").val(data[5]);
						$("#status_petugas").val(data[6]);
					}
				});
			});
			//jika tombol update diclick
			$("#tupdate").click(function(){
				//ambil nilai-nilai dari masing-masing input
				option_nama_petugas = $("#option_nama_petugas").val();
				if (option_nama_petugas=="Pilih Nama Petugas") {
					alert("Pilih dulu nama_petugas");
					exit();
				}
				
				jabatan_petugas = $("#jabatan_petugas").val();
				jk_petugas = $("input[name='jk_petugas']:checked").val(); 
                temp_lahir_petugas = $("#temp_lahir_petugas").val();
                tgl_lahir_petugas = $("#tgl_lahir_petugas").val();
                alamat_petugas = $("#alamat_petugas").val();
                telp_petugas = $("#no_telp_petugas").val();
                status_petugas = $("#status_petugas").val();

				data_petugas = "&option_nama_petugas="+option_nama_petugas+"&jabatan_petugas="+jabatan_petugas+"&jk_petugas="+jk_petugas+"&temp_lahir_petugas="+temp_lahir_petugas+"&tgl_lahir_petugas=" + tgl_lahir_petugas+"&alamat_petugas="+alamat_petugas+"&telp_petugas="+telp_petugas+"&status_petugas="+status_petugas;
				//tampilkan status Updating dan animasinya
				$("#status").html("Lagi di update. . .");
				$("#loading").show();
				$.ajax({
					url: "prosesCrudPetugas.php",
					data: "func_petugas=update_data_petugas"+data_petugas,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Update Berhasil . . ");
						}else{
							$("#status").html("ERROR. . .");
                            console.log(msg);
							}

						$("#loading").hide();
					}
				});
			});

			//jika tombol DEL diklik
			$("#tdelete").click(function(){
				option_nama_petugas = $("#option_nama_petugas").val();
				if (option_nama_petugas=="Pilih Nama Petugas") {
					alert("Pilih dulu nama_petugas");
					exit();
					
				}
				$.ajax({
					url: "prosesCrudPetugas.php",
					data: "func_petugas=del_data_petugas&option_nama_petugas="+option_nama_petugas,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
						}else{
							$("#status").html("EROR. . .");
						}

						$("#jabatan_petugas").val("");
						$("#jk_petugas").val("");
						$("#temp_lahir_petugas").val("");
						$("#tgl_lahir_petugas").val("");
						$("#alamat_petugas").val("");
						$("#telp_petugas").val("");
						$("#status_petugas").val("");
						$("#loading").hide();
						$("#option_nama_petugas").load ("prosesCrudPetugas.php", "func_petugas=ambil_option_petugas");
					}
				});
			});

			//Jika link tambah dta diklik
			$("#formtambah").click(function(){ 
 				$("#formnik").show(); 
 				$("#nama_petugas").val(""); 
 				$("#jabatan_petugas").val(""); 
 				$("#jk_petugas").val(""); 
 				$("#temp_lahir_petugas").val("");
 				$("#tgl_lahir_petugas").val("");
 				$("#alamat_petugas").val("");
 				$("#telp_petugas").val("");
 				$("#status_petugas").val(""); 
 			});
 			
			 //jika link Tambah Data Karyawan diklik 
 			$("#formtambah").click(function(){ 
 				$("#formnik").show(); 
 				$("#nama_petugas").val(""); 
 				$("#jabatan_petugas").val(""); 
 				$("jk_petugas").val(""); 
 				$("#temp_lahir_petugas").val("");
 				$("#tgl_lahir_petugas").val("");
 				$("#alamat_petugas").val("");
 				$("#telp_petugas").val("");
 				$("#status_petugas").val(""); 
 			}); 
 
			//jika tombol TAMBAH diklik 
			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nama_petugas = $("#nama_petugas").val(); 
				if(!nama_petugas){ 
					alert("Nama belum diisi\nKlik Tambah Data Petugas"); 
					exit(); 
				} 

				jabatan_petugas = $("#jabatan_petugas").val(); 
				jk_petugas = $("input[name='jk_petugas']:checked").val(); 
				temp_lahir_petugas = $("#temp_lahir_petugas").val();
				tgl_lahir_petugas = $("#tgl_lahir_petugas").val();
				alamat_petugas = $("#alamat_petugas").val();
				telp_petugas = $("#telp_petugas").val();
				status_petugas = $("#status_petugas").val(); 
				data_petugas = "&nama_petugas="+nama_petugas + "&jabatan_petugas="+jabatan_petugas+"&jk_petugas="+jk_petugas+"&temp_lahir_petugas="+temp_lahir_petugas+"&tgl_lahir_petugas="+tgl_lahir_petugas+"&alamat_petugas="+alamat_petugas+"&telp_petugas="+telp_petugas+"&status_petugas="+status_petugas;
						
				$("#status").html("Lagi ditambah..."); 
				$("#loading").show(); 
				$.ajax({ 
					url: "prosesCrudPetugas.php", 
					data: "func_petugas=tambah_data_petugas"+data_petugas, 
					cache: false, 
					success: function(msg){ 
						if(msg=="sukses"){ 
							$("#status").html("Berhasil ditambah..."); 
						}else{ 
							$("#status").html("ERROR.."); 
						} 

						$("#loading").hide(); 
						$("#option_nama_petugas").load("prosesCrudPetugas.php","func_petugas=ambil_option_petugas"); 
						$("#formnik").hide(); 
						$("#nama_petugas").val(""); 
					}
				});
			});
		});
 	</script>
 	</body>