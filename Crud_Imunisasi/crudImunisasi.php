<!DOCTYPE html>
<html>
<head>
  <title>Imunisasi</title>

</head>
<body>
<button onclick="window.location.href='formtambah.php'">Tambah Data</button><br><br>
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
            <th colspan=2>Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
  <br>
	<button onclick="window.location.href='../home.html'">BACK TO HOME</button>

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
      $("#id_imun").load("ambil_data_imunisasi.php", "func_imun=ambil_data_imun");

	  function getAllData(){
      $.ajax({
		      type : "GET",	
          url : "ambil_data_imunisasi.php",
          data : {func_imun : "ambil_data_imun"},
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
              '<td><button onclick="window.location.href=\'formedit.php?id_imunisasi='+ element.id_imunisasi +'\'">EDIT</button></td>' +
              '<td><button class="tdelete" value="'+element.id_imunisasi+'">DELETE</button></td>'
              content+="</tr>";
            }

            content+="</tr>";
            $("#content").html(content);
          }
        });
      }
      getAllData();
      $("#id_imun").change(function() {
        id_imun = $("#id_imun").val();
      });

      $(document).on('click', '.tdelete', function(){
				$.ajax({
          type : "POST",
					url : "prosesCrudImunisasi.php",
					data : {func_imun : "delete", id_imunisasi : $(this).val()},
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
              getAllData();
						} else {
							$("#status").html("EROR. . .");
						}
						$("#loading").hide();
					}
				});
			});
    });


  </script>
</body>
</html>