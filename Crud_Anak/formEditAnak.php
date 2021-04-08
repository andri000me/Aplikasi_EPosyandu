<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form>
        <p> 
Nama Anak :<br> 
<input type="text" id="nama_anak"><p>
       NIK Anak  :<br> 
<input type="text" id="nik_anak"> 
</p> 
 
Tempat Lahir :<br> 
<input type="text" id="temp_lahir_anak"><p> 
Tanggal Lahir : (YYYY/MM/DD)<br> 
<input type="date" id="tgl_lahir_anak" size="30"><p>
Usia :<br>
<input type="text" id="usia_anak"><p>
Jenis Kelamin :<br>
<input type="radio" value="L" id="laki" name="jk_anak">Laki - Laki<p>
<input type="radio" value="P" id="perempuan" name="jk_anak">Perempuan<p>
<button type="button" id="tupdate">UPDATE</button> 
        <button onclick="window.location.href='crudAnak.php'" type="button"> KEMBALI </button>
        <span id="status"></span>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var id_anak
        var nik_anak;
        var nama_anak;
        var temp_lahir_anak;
        var tgl_lahir_anak;
        var usia_anak;
        var jk_anak;
        var data_anak;

    $(document).ready(function () {
        $(document).ready(function(){

            //$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

            $.ajax({
                    type : "GET",
                    url: "ambil_data_anak.php",
                    data: {func_anak : "ambil_single_data", id_anak: "<?php echo $_GET['id_anak']?>"},
                    cache: false,
                    success: function(msg){
                        //karna di server pembatas setiap data adalah |
                        //maka kita split dan akan membentuk array
                        data = JSON.parse(msg);
                        nama_anak = data['nama_anak'];
                        nik_anak = data['nik_anak'];
                        temp_lahir_anak = data['tempat_lahir_anak'];
                        tgl_lahir_anak = data['tanggal_lahir_anak'];
                        usia_anak = data['usia'];
                        jk_anak = data['jk_anak'];

                        //masukan ke masing - masing textfield
                        $("#nik_anak").val(nik_anak);
                        $("#nama_anak").val(nama_anak);
                        $("#temp_lahir_anak").val(temp_lahir_anak);
                        $("#tgl_lahir_anak").val(tgl_lahir_anak);
                        $("#usia_anak").val(usia_anak);
                       if (jk_anak == 'L'){
                            $("#laki").prop("checked", true);
                            $("#perempuan").prop("checked", false);
                        } else {
                            $("#perempuan").prop("checked", true);
                            $("#laki").prop("checked", false);
                        }
                    }
            });

            $("#tupdate").click(function(){
                nik_anak = $("#nik_anak").val();

                nama_anak = $("#nama_anak").val();
                temp_lahir_anak = $("#temp_lahir_anak").val();
                tgl_lahir_anak = $("#tgl_lahir_anak").val();
                usia_anak = $("#usia_anak").val()
                jk_anak = $("#jk_anak").val();
                //data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
                data_anak = {
                    "nik_anak" : nik_anak,
                    "nama_anak" : nama_anak,
                    "temp_lahir_anak" : temp_lahir_anak,
                    "tgl_lahir_anak" : tgl_lahir_anak,
                    "usia_anak" : usia_anak,
                    "jk_anak" : document.getElementById('laki').checked ? 'L':'P'
                };  

                
                $("#status").html("Lagi di update . . . ");
                $("#loading").show();
                $.ajax({
                type : "POST",
                url : "prosesCrudAnak.php",
                data : {data_anak : data_anak, func_anak : "update_data_anak", id_anak: "<?php echo $_GET['id_anak']?>"},
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