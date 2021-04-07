<!DOCTYPE html>
<html>
<head>
  <title>Imunisasi</title>
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
    var data;
    $(document).ready(function() {
      $("#ttable").val();
    });

    $(document).ready(function(){
      $("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

	  $.ajax({
		  type : "GET",	
          url : "prosesCrudImunisasi.php",
          data : { func_imun: "ambil_data_imun"},
          cache : false,
          success : function(msg){
          data = JSON.parse(msg);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td>"+element.id_imunisasi+"</td>"+
              "<td>"+element.tgl_imunisasi+"</td>" +
              "<td>"+element.usia_saat_vaksin+" tahun</td>"+
              "<td>"+element.tinggi_badan+" cm</td>" +
              "<td>"+element.berat_badan+" kg</td>" +
              "<td>"+element.periode+" bulan</td>" +
              '<td><button onclick="window.location.href=\'formedit.html?id_imunisasi='+ element.id_imunisasi +'\'">EDIT</button></td>'
              content+="</tr>";
            }

            content+="</tr>";
            $("#content").html(content);
          }
        });

      $("#id_imun").change(function() {
        id_imun = $("#id_imun").val();
      });

      $("#tdelete").click(function(){
				option_nik_ibu = $("#option_nik_ibu").val();
				if (option_nik_ibu=="Pilih NIK Ibu") {
					alert("Pilih dulu nik_ibu");
					exit();
				}
				
				$.ajax({
					url: "prosesCrudIbu.php",
					data: "func_ibu=del_data_ibu&option_nik_ibu="+option_nik_ibu,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
						} else {
							$("#status").html("EROR. . .");
						}

						$("#nama_ibu").val("");
						$("#alamat_ibu").val("");
						$("#telp_ibu").val("");
						$("#loading").hide();
						$("#option_nik_ibu").load ("prosesCrudIbu.php", "func_ibu=ambi_loption_ibu");
					}
				});
			});
    });


  </script>
<html>
<body>
  <table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Imunisasi</th>
            <!-- <th>Nama Anak</th>
            <th>ID Petugas</th>
            <th>ID Vaksin</th> -->
            <th>Tanggal Imunisasi</th>
            <th>Usia saat Vaksin</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>

	<button onclick="window.location.href='formtambah.html'">Tambah Data</button>
</body>
</html>