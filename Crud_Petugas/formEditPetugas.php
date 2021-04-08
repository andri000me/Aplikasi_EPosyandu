<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form>
        <p> 
        Nama Petugas :<br> 
        <input type="text" id="nama_petugas"><p>
        Jabatan Petugas :<br> 
        <input type="text" id="jabatan_petugas"><p> 
        Jenis Kelamin Petugas :<br>
        <input type="radio" value="L" id="laki" name="jk_petugas">Laki - Laki<p>
        <input type="radio" value="P" id="perempuan" name="jk_petugas">Perempuan<p>
        Tempat Lahir Petugas : <br>
        <input type="text" id="temp_lahir_petugas"><p>
        Tanggal Lahir : <br> 
        <input type="date" id="tgl_lahir_petugas" size="30"><p>
        Alamat Petugas : <br>
        <input type="text" id="alamat_petugas"><p>
        No Telepon Petugas : <br>
        <input type="text" id="telp_petugas"><p>
        Status Petugas :<br>
        <input type="text" id="status_petugas"><p>
        <button type="button" id="tupdate">UPDATE</button> 
        <button onclick="window.location.href='crudpetugas.php'" type="button"> BACK </button>
        <span id="status"></span>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var id_petugas;
        var nama_petugas;
        var jabatan_petugas;
        var jk_petugas;
        var temp_lahir_petugas;
        var tgl_lahir_petugas;
        var alamat_petugas;
        var telp_petugas;
        var status_petugas;
        var petugas;

    $(document).ready(function () {
        $(document).ready(function(){

            //$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

            $.ajax({
                    type : "GET",
                    url: "ambil_data_petugas.php",
                    data: {func_petugas : "ambil_single_data", id_petugas: "<?php echo $_GET['id_petugas']?>"},
                    cache: false,
                    success: function(msg){
                        //karna di server pembatas setiap data adalah |
                        //maka kita split dan akan membentuk array
                        data = JSON.parse(msg);
                        nama_petugas = data['nama_petugas'];
                        jabatan_petugas = data['jabatan_petugas'];
                        jk_petugas = data['jk_petugas'];
                        temp_lahir_petugas = data['temp_lahir_petugas'];
                        tgl_lahir_petugas = data['tgl_lahir_petugas'];
                        alamat_petugas = data['alamat_petugas'];
                        telp_petugas = data['telp_petugas'];
                        status_petugas = data['status_petugas'];

                        //masukan ke masing - masing textfield
                        $("#nama_petugas").val(nama_petugas);
                        $("#jabatan_petugas").val(jabatan_petugas);
                        if (jk_petugas == 'L'){
                            $("#laki").prop("checked", true);
                            $("#perempuan").prop("checked", false);
                        } else {
                            $("#perempuan").prop("checked", true);
                            $("#laki").prop("checked", false);
                        }
                        $("#temp_lahir_petugas").val(temp_lahir_petugas);
                        $("#tgl_lahir_petugas").val(tgl_lahir_petugas);
                        $("#alamat_petugas").val(alamat_petugas);
                        $("#telp_petugas").val(telp_petugas);
                        $("#status_petugas").val(status_petugas);
                    
                    }
            });

            $("#tupdate").click(function(){
                nama_petugas = $("#nama_petugas").val();
                jabatan_petugas = $("#jabatan_petugas").val();
                temp_lahir_petugas = $("#temp_lahir_petugas").val();
                tgl_lahir_petugas = $("#tgl_lahir_petugas").val();
                alamat_petugas = $("#alamat_petugas").val()
                telp_petugas = $("#telp_petugas").val();
                status_petugas = $("#status_petugas").val();
                //data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
                petugas = {
                    "nama_petugas" : nama_petugas,
                    "jabatan_petugas" : jabatan_petugas,
                    "jk_petugas" : document.getElementById('laki').checked ? 'L':'P',
                    "temp_lahir_petugas" : temp_lahir_petugas,
                    "tgl_lahir_petugas" : tgl_lahir_petugas,
                    "alamat_petugas" : alamat_petugas,
                    "telp_petugas" : telp_petugas,
                    "status_petugas" : status_petugas
                };  

                
                $("#status").html("Lagi di update . . . ");
                $("#loading").show();
                $.ajax({
                type : "POST",
                url : "prosesCrudPetugas.php",
                data : {petugas : petugas, func_petugas : "update_data_petugas", id_petugas : "<?php echo $_GET['id_petugas']?>"},
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