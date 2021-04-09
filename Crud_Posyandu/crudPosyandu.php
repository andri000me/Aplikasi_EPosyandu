<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posyandu</title>
</head>
<body>

    <button type="button" onclick="window.location.href='formTambahPosyandu.php'">TAMBAH DATA POSYANDU</button>
    <br><br>
    <table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Posyandu</th>
            <th>Nama Posyandu</th>
            <th>Alamat Posyandu</th>
            <th>Kelurahan Posyandu</th>
            <th>Kecamatan Posyandu</th>
            <th>Kota/Kabupaten Posyandu</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
    <br>
  <button type="button" onclick="window.location.href='../home.html'">BACK TO HOME</button>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_posyandu;
    var nama_posyandu;
    var alamat_posyandu;
    var kel_posyandu;
    var kec_posyandu;
    var kota_kab_posyandu;
    var posyandu;
    $(document).ready(function() {
      $("#ttable").val();
    });

    $(document).ready(function(){
      $("#id_posyandu").load("ambil_data_imunisasi.php", "func_posyandu=ambil_data_posyandu");

	  function getAllData(){
      $.ajax({
		  type : "GET",	
          url : "http://localhost/Aplikasi_EPosyandu/api/Posyandu/read.php",
          data : {func_posyandu : "ambil_data_posyandu"},
          cache : false,
          success : function(msg){
          data = msg.records;
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td>"+element.id_posyandu+"</td>"+
              "<td>"+element.nama_posyandu+"</td>" +
              "<td>"+element.alamat_posyandu+"</td>"+
              "<td>"+element.kel_posyandu+"</td>" +
              "<td>"+element.kec_posyandu+"</td>" +
              "<td>"+element.kota_kab_posyandu+"</td>" +
              '<td><button onclick="window.location.href=\'formEditPosyandu.php?id_posyandu='+ element.id_posyandu +'\'">EDIT</button></td>' +
              '<td><button class="tdelete" value="'+element.id_posyandu+'">DELETE</button></td>'
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
					url : "prosesCrudPosyandu.php",
					data : {func_posyandu : "delete", id_posyandu : $(this).val()},
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