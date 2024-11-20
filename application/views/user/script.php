  <script src="<?=base_url()?>js/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url()?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>js/jquery-ui.js"></script>
  <script src="<?=base_url()?>js/popper.min.js"></script>
  <script src="<?=base_url()?>js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>js/jquery.countdown.min.js"></script>
  <script src="<?=base_url()?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url()?>js/aos.js"></script>

  <script src="<?=base_url()?>js/typed.js"></script>

  <script type="text/javascript" src="<?=base_url()?>assets/plugin/datatables/jquery.dataTables.min.js"></script>

  <script src="<?=base_url()?>assets/plugin/toastr/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugin/toastr/toastr.css">

<?php if ($this->session->flashdata('success')): ?>
  <script type="text/javascript">
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

      
      toastr.success("<?php echo  $this->session->flashdata('success')?>");
      
      
    </script> 

<?php elseif ($this->session->flashdata('error')): ?>
  <script type="text/javascript">
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

      
      toastr.error("<?php echo  $this->session->flashdata('error')?>");
      
      
    </script> 
<?php endif ?>

<?php if ($this->uri->segment(2) == ''): ?>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
  </script> 

  <script type="text/javascript">
    function tukar_halaman(a,b)
    {
      $.ajax({
        type: "post",
        url: "<?=base_url()?>user/tukar_halaman/",
        data: {no: a, kategori : b}, // appears as $_GET['id'] @ your backend side
        // dataType: "json",
        success: function(data1) {
          if (b == 1) {
            // console.log(data1);
            $("#undangan").html(data1);
          }else if (b == 2) {
            $("#kartu_nama").html(data1);
          }else if (b == 3) {
            $("#spanduk").html(data1);
          }
        }
      });
    }
  </script>

<?php elseif ($this->uri->segment(2) == 'beli'): ?>
  <?php  
    foreach ($data->result() as $key => $value);
    $data_pembeli = $this->session->userdata('pembeli');
    $ket = json_decode($value->keterangan);
    $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
    foreach ($cekkategori->result() as $key1 => $value1) ;
    $kategori = $value1->nama;
    if ($value->kategori == 1) {
      if ($ket->undangan == 1) {
        $kategori = $kategori . ' Aqiqah';
      }elseif ($ket->undangan == 2) {
        $kategori = $kategori . ' Nikah';
      }
    }else{
      $kategori = $kategori;
    }
  ?>

  <script src="<?=base_url()?>/dist/js/lightbox-plus-jquery.min.js"></script>

  <script type="text/javascript">
    var elem = document.getElementById("panjang");

    elem.addEventListener("keydown",function(event){
        var key = event.which;
        if((key<48 || key>57) && key != 8) event.preventDefault();
    });

    elem.addEventListener("keyup",function(event){
        var value = this.value.replace(/,/g,"");
        this.dataset.currentValue=parseInt(value);
        var caret = value.length-1;
        while((caret-3)>-3)
        {
            caret -= 1;
            value = value.split('');
            value.splice(caret+1,0,",");
            value = value.join('');
        }
        this.value = value;
    });
  </script>

  <script type="text/javascript">
    var elem = document.getElementById("lebar");

    elem.addEventListener("keydown",function(event){
        var key = event.which;
        if((key<48 || key>57) && key != 8) event.preventDefault();
    });

    elem.addEventListener("keyup",function(event){
        var value = this.value.replace(/,/g,"");
        this.dataset.currentValue=parseInt(value);
        var caret = value.length-1;
        while((caret-3)>-3)
        {
            caret -= 1;
            value = value.split('');
            value.splice(caret+1,0,",");
            value = value.join('');
        }
        this.value = value;
    });
  </script>

  <script type="text/javascript">
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
          textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
              this.oldValue = this.value;
              this.oldSelectionStart = this.selectionStart;
              this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
              this.value = this.oldValue;
              this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
              this.value = "";
            }
          });
        });
      }


    // Install input filters.
    setInputFilter(document.getElementById("jumlah_kertas"), function(value) {
      return /^-?\d*$/.test(value); });
    <?php  
      if ($value->kategori == 3) { ?>
    // setInputFilter(document.getElementById("panjang"), function(value) {
    //   return /^-?\d*$/.test(value); });
    // setInputFilter(document.getElementById("lebar"), function(value) {
    //   return /^-?\d*$/.test(value); });
        <?php
      }elseif ($value->kategori == 2) { ?>
    setInputFilter(document.getElementById("no_telpon"), function(value) {
      return /^-?\d*$/.test(value); });
        <?php
      }
    ?>

  </script>

  <?php if ($value->kategori != 3): ?>
    <script type="text/javascript">
      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
      setInterval("my_function();",5000); 
        <?php foreach ($data->result() as $key => $value);
          $ket = json_decode($value->keterangan);
        ?>      
        function my_function(){
            var jenis_kertas = $("#jenis_kertas").val();
            var jumlah_kertas = $("#jumlah_kertas").val();
            if (jenis_kertas == null || jenis_kertas == '') {
              // console.log('Pilih Kertas dulu');
              $('#jumlah_harga').val("-Pilih Jenis Kertas Dan Isikan Jumlah Kertas")
            }else if (jumlah_kertas == '') {
              $('#jumlah_harga').val("-Isikan Jumlah Kertas")
            }else{
              // var harga = (parseFloat(jenis_kertas) + parseFloat(<?=$ket->harga?>))  * parseFloat(jumlah_kertas);
              var harga = (parseFloat(jenis_kertas) * parseFloat(jumlah_kertas) )+ parseFloat(<?=$ket->harga?>);
              // console.log(numberWithCommas(harga)); 
              $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
            }
        }
    </script>
  <?php endif ?>
  
  <?php if ($value->kategori == 3): ?>
    <script type="text/javascript">
      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
      setInterval("my_function();",2500); 
        <?php foreach ($data->result() as $key => $value);
          $ket = json_decode($value->keterangan);
        ?>      
        function my_function(){
          var panjang = $("#panjang").val();
          var lebar = $("#lebar").val();
          var jumlah_kertas = $("#jumlah_kertas").val();

          // console.log(panjang);
          // console.log(lebar);
          if (panjang == '' || panjang == null) {
            $('#jumlah_harga').val("-Panjang Kertas Belum Terisi")
          }else if (lebar == '' || lebar == null) {
            $('#jumlah_harga').val("-Lebar Kertas Belum Terisi")
          }else if (jumlah_kertas == '') {
            $('#jumlah_harga').val("-Isikan Jumlah Kertas");
          }else{
            if (panjang.length == 3) {
              panjang = panjang.replace(/,/g, '.');
            }

            if (lebar.length == 3) {
              lebar = lebar.replace(/,/g, '.');
            }

            // if (panjang > 6) {
            //   // document.getElementById('panjang').value = '';
            //   // $("#panjang").focus();
            //   $("#panjang").focus(function() {
            //       $(this).val("");
            //   });
            //   console.log("panjnag");
              
            // }
            // var jumlah_panjang = parseFloat(panjang) * 12500;
            // var jumlah_lebar = parseFloat(lebar) * 12500;
            // var harga = (parseFloat(<?=$ket->harga?>) + jumlah_panjang + jumlah_lebar)  * parseFloat(jumlah_kertas);
            var harga = ((panjang * 12500) +  (lebar * 12500) ) * jumlah_kertas + parseFloat(<?=$ket->harga?>);
            harga = Math.round(harga);
            // console.log(numberWithCommas(harga)); 
            // $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
            $('#panjang').val(panjang);
            $('#lebar').val(lebar);
            $('#jumlah_harga').val("Rp . " +numberWithCommas(harga));
          }
        }
    </script>
  <?php endif ?>
  <script type="text/javascript">
    var file = document.getElementById('files');
   
    function previewImage() {
      if ($("#files")[0].files.length > 5) {        
        $('#files').val(null);
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        
        toastr.error("Jumlah Foto Yang Diupload Maksimal 5");
        $('#ubah_sini').html("");
        document.getElementById('files').focus() ;
      }else{
        var text = "";
        for (var i = 0; i < file.files.length; i++) {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("files").files[i]);

          oFReader.onload = function(oFREvent) {
            // document.getElementById("image-preview").src = oFREvent.target.result;
            // console.log(oFREvent.target.result);
            if (i==0) {
              text +='';
            }else if (i!=0) {
              text+='<div class="form-group"><center> <a class="example-image-link" href="'+oFREvent.target.result+'" data-lightbox="example-set" ><img class="example-image" src="'+oFREvent.target.result+'" width="240px" height="240px" alt=""/></a></center></div>';
            }
            
            $('#ubah_sini').html(text);
          };
          // console.log(i);
        }
      }      
    };
  </script> 

  <?php if ($kategori == 'Undangan Nikah'): ?>
    <script type="text/javascript">
      function proses(){
        var jenis_kertas = $('select[name="jenis_kertas"]').val();
        // var panjang_kertas = $('select[name="panjang_kertas"]').val();
        var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
        var alamat = $('input[name="alamat"]').val();
        var deadline = $('select[name="deadline"]').val();


        var nama_pertama = $('input[name="nama_pertama"]').val();
        var nama_kedua = $('input[name="nama_kedua"]').val();
        var tanggal = $('input[name="tanggal"]').val();
        var akad = $('input[name="akad"]').val();
        var resepsi = $('input[name="resepsi"]').val();
        var nama_ortu_pertama = $('input[name="nama_ortu_pertama"]').val();
        var nama_ortu_kedua = $('input[name="nama_ortu_kedua"]').val();


        var data = $('#ini_formnya').serializeArray();
        data = jQuery.grep(data, function(value) {
          return value['name'] != 'files';
        });
        data = JSON.stringify(data);

        var form_data = new FormData();
        form_data.append('data', data);

        var totalfiles = document.getElementById('files').files.length;
        
        if (jenis_kertas == null || jenis_kertas == '') {
          // console.log(jenis_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
          $('select[name="jenis_kertas"]').focus();
        }else if (jumlah_kertas == '' || jumlah_kertas == null) {
          // console.log(jumlah_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
          $('input[name="jumlah_kertas"]').focus();
        }else if (alamat == '' || alamat == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
          $('input[name="alamat"]').focus();
        }else if (deadline == '' || deadline == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
          $('select[name="deadline"]').focus();
        }else if (nama_pertama == '' || nama_pertama== null) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Pertama Harus Diisi");
          $('input[name="nama_pertama"]').focus();
        }else if (nama_kedua == '' || nama_kedua== null) {
          // console.log(nama_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Kedua Harus Diisi");
          $('input[name="nama_kedua"]').focus();
        }else if (tanggal == '' || tanggal== null) {
          // console.log(tanggal);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Tanggal Pernikahan Harus Diisi");
          $('input[name="tanggal"]').focus();
        }else if (akad == '' || akad== null) {
          // console.log(akad);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Akad Harus Diisi");
          $('input[name="akad"]').focus();
        }else if (resepsi == '' || resepsi== null) {
          // console.log(resepsi);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Resepsi Harus Diisi");
          $('input[name="resepsi"]').focus();
        }else if (nama_ortu_pertama == '' || nama_ortu_pertama== null) {
          // console.log(nama_ortu_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Orang Tua Pertama Harus Diisi");
          $('input[name="nama_ortu_pertama"]').focus();
        }else if (nama_ortu_kedua == '' || nama_ortu_kedua== null) {
          // console.log(nama_ortu_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Orang Tua Kedua Harus Diisi");
          $('input[name="nama_ortu_kedua"]').focus();
        }else if (totalfiles > 5) {
          // console.log(nama_ortu_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
          $("#files").val(null);
          document.getElementById('files').focus();
        }else {
          for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
          }
          form_data.append('data', data);
          form_data.append('id_nya', <?=$this->uri->segment(3)?>);
          
          $.ajax({
            url: "<?=base_url()?>user/beli/beli_produk",
            type: 'post',
            data: form_data,
            // dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
              response = JSON.parse(response);
              // console.log(response);
              if (response['error'] == 0 || response['error'] == 1) {
                var mesej;
                if (response['error'] == 0) {
                  mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                }else if (response['error'] == 1) {
                  mesej = "Ukuran Foto Maksimal 1.5 mb";
                }
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
                toastr.error("<b>Error</b><br>"+mesej);
                $("#files").val(null);
                document.getElementById('files').focus();
              }else if (response['error'] == 3 ) {
                // console.log('sini_ok');
                window.location.replace(response['url']);
              }
              // alert(response);
              // window.location.replace(response);

            }
          });

          // $.ajax({
          //   type: "post",
          //   url: "<?=base_url()?>user/beli/<?=$this->uri->segment(3)?>",
          //   data: {data: data}, // appears as $_GET['id'] @ your backend side
          //   // dataType: "html",
          //   success: function(data1) {
          //     window.location.replace("<?=base_url()?>user/pesanan/detail/"+data1);
          //     // console.log(data1);
          //   }

          // });
        }
      }
    </script>  

    

  <?php elseif ($kategori == 'Undangan Aqiqah'): ?>
    <script type="text/javascript">
      function proses(){
        var jenis_kertas = $('select[name="jenis_kertas"]').val();
        // var panjang_kertas = $('select[name="panjang_kertas"]').val();
        var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
        var alamat = $('input[name="alamat"]').val();
        var waktu = $('input[name="waktu"]').val();
        var tempat = $('input[name="tempat"]').val();
        var deadline = $('select[name="deadline"]').val();


        var nama_anak = $('input[name="nama_anak"]').val();
        var ket_anak = $('input[name="ket_anak"]').val();
        var tanggal = $('input[name="tanggal"]').val();
        var nama_ortu = $('input[name="nama_ortu"]').val();


        var data = $('#ini_formnya').serializeArray();
        data = jQuery.grep(data, function(value) {
          return value['name'] != 'files';
        });
        data = JSON.stringify(data);

        var form_data = new FormData();
        form_data.append('data', data);

        var totalfiles = document.getElementById('files').files.length;

        console.log(data);
        
        if (jenis_kertas == null || jenis_kertas == '') {
          // console.log(jenis_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
          $('select[name="jenis_kertas"]').focus();
        }else if (jumlah_kertas == '' || jumlah_kertas == null) {
          // console.log(jumlah_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
          $('input[name="jumlah_kertas"]').focus();
        }else if (alamat == '' || alamat == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
          $('input[name="alamat"]').focus();
        }else if (deadline == '' || deadline == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
          $('select[name="deadline"]').focus();
        }else if (nama_anak == '' || nama_anak== null) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Anak Harus Diisi");
          $('input[name="nama_anak"]').focus();
        }else if (tanggal == '' || tanggal== null) {
          // console.log(nama_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Tanggal Harus Diisi");
          $('input[name="tanggal"]').focus();
        }else if (waktu == '' || waktu == null) {
          // console.log(tanggal);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Waktu Harus Diisi");
          $('input[name="waktu"]').focus();
        }else if (tempat == '' || tempat== null) {
          // console.log(akad);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Akad Harus Diisi");
          $('input[name="tempat"]').focus();
        }else if (nama_ortu == '' || nama_ortu== null) {
          // console.log(resepsi);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Orang Tua Harus Diisi");
          $('input[name="nama_ortu"]').focus();
        }else if (totalfiles > 5) {
          // console.log(nama_ortu_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
          $("#files").val(null);
          document.getElementById('files').focus();
        }else {
          for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
          }
          form_data.append('data', data);
          form_data.append('id_nya', <?=$this->uri->segment(3)?>);
          
          $.ajax({
            url: "<?=base_url()?>user/beli/beli_produk",
            type: 'post',
            data: form_data,
            // dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
              response = JSON.parse(response);
              // console.log(response);
              if (response['error'] == 0 || response['error'] == 1) {
                var mesej;
                if (response['error'] == 0) {
                  mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                }else if (response['error'] == 1) {
                  mesej = "Ukuran Foto Maksimal 1.5 mb";
                }
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
                toastr.error("<b>Error</b><br>"+mesej);
                $("#files").val(null);
                document.getElementById('files').focus();
              }else if (response['error'] == 3 ) {
                // console.log('sini_ok');
                window.location.replace(response['url']);
              }
              // alert(response);
              // window.location.replace(response);

            }
          });

          // $.ajax({
          //   type: "post",
          //   url: "<?=base_url()?>user/beli/<?=$this->uri->segment(3)?>",
          //   data: {data: data}, // appears as $_GET['id'] @ your backend side
          //   // dataType: "html",
          //   success: function(data1) {
          //     window.location.replace("<?=base_url()?>user/pesanan/detail/"+data1);
          //     // console.log(data1);
          //   }

          // });
        }
      }
    </script>

  <?php elseif ($kategori == 'Kartu Nama'): ?>
    <script type="text/javascript">
      function proses(){
        var jenis_kertas = $('select[name="jenis_kertas"]').val();
        // var panjang_kertas = $('select[name="panjang_kertas"]').val();
        var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
        var alamat = $('input[name="alamat"]').val();
        var deadline = $('select[name="deadline"]').val();


        var nama = $('input[name="nama"]').val();
        var data = $('#ini_formnya').serializeArray();
        data = jQuery.grep(data, function(value) {
          return value['name'] != 'files';
        });
        data = JSON.stringify(data);

        var form_data = new FormData();
        form_data.append('data', data);

        var totalfiles = document.getElementById('files').files.length;
        
        if (jenis_kertas == null || jenis_kertas == '') {
          // console.log(jenis_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
          $('select[name="jenis_kertas"]').focus();
        }else if (jumlah_kertas == '' || jumlah_kertas == null) {
          // console.log(jumlah_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
          $('input[name="jumlah_kertas"]').focus();
        }else if (alamat == '' || alamat == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
          $('input[name="alamat"]').focus();
        }else if (deadline == '' || deadline == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
          $('select[name="deadline"]').focus();
        }else if (nama == '' || nama== null) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Harus Diisi");
          $('input[name="nama"]').focus();
        }else if (totalfiles > 5) {
          // console.log(nama_ortu_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
          $("#files").val(null);
          document.getElementById('files').focus();
        }else {
          for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
          }
          form_data.append('data', data);
          form_data.append('id_nya', <?=$this->uri->segment(3)?>);
          
          $.ajax({
            url: "<?=base_url()?>user/beli/beli_produk",
            type: 'post',
            data: form_data,
            // dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
              response = JSON.parse(response);
              // console.log(response);
              if (response['error'] == 0 || response['error'] == 1) {
                var mesej;
                if (response['error'] == 0) {
                  mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                }else if (response['error'] == 1) {
                  mesej = "Ukuran Foto Maksimal 1.5 mb";
                }
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
                toastr.error("<b>Error</b><br>"+mesej);
                $("#files").val(null);
                document.getElementById('files').focus();
              }else if (response['error'] == 3 ) {
                // console.log('sini_ok');
                window.location.replace(response['url']);
              }
              // alert(response);
              // window.location.replace(response);

            }
          });

          // $.ajax({
          //   type: "post",
          //   url: "<?=base_url()?>user/beli/<?=$this->uri->segment(3)?>",
          //   data: {data: data}, // appears as $_GET['id'] @ your backend side
          //   // dataType: "html",
          //   success: function(data1) {
          //     window.location.replace("<?=base_url()?>user/pesanan/detail/"+data1);
          //     // console.log(data1);
          //   }

          // });
        }
      }
    </script>

  <?php elseif ($kategori == 'Spanduk'): ?>
    <script type="text/javascript">
      $('#panjang').click(function(e) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.info("<b>Info</b><br>Maksimal Panjang Spanduk = '<b><i>5</i></b>' Meter");
      });

      $('#lebar').click(function(e) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.info("<b>Info</b><br>Maksimal Lebar Spanduk = '<b><i>5</i></b>' Meter");
      });


      $('#panjang').bind('change keyup',function (){
        // console.log($('#panjang').val());
        var panjang = $('#panjang').val();
        // console.log(panjang.length);
        if (panjang.length == 3) {
          panjang = panjang.replace(",", ".");
        }

        // console.log(panjang);
        if (panjang > 5 ) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
          $('input[name="panjang"]').focus();
          $('input[name="panjang"]').val('');
        }

      });

      $('#lebar').bind('change keyup',function (){
        // console.log($('#panjang').val());
        var panjang = $('#lebar').val();
        // console.log(panjang.length);
        if (panjang.length == 3) {
          panjang = panjang.replace(",", ".");
        }

        // console.log(panjang);
        if (panjang > 5 ) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
          $('input[name="lebar"]').focus();
          $('input[name="lebar"]').val('');
        }

      });

      function proses(){
        // var jenis_kertas = $('select[name="jenis_kertas"]').val();
        var panjang = $('input[name="panjang"]').val();
        var lebar = $('input[name="lebar"]').val();
        var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
        var alamat = $('input[name="alamat"]').val();
        var deadline = $('select[name="deadline"]').val();


        var nama = $('input[name="nama"]').val();
        var tema = $('input[name="tema"]').val();



        var data = $('#ini_formnya').serializeArray();
        data = jQuery.grep(data, function(value) {
          return value['name'] != 'files';
        });
        data = JSON.stringify(data);

        var form_data = new FormData();
        form_data.append('data', data);

        var totalfiles = document.getElementById('files').files.length;


        if (panjang == null || panjang == '') {
          // console.log(panjang_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Panjang Kertas Harus Diisi");
          $('input[name="panjang"]').focus();
        }else if (lebar == null || lebar == '') {
          // console.log(panjang_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Lebar Kertas Harus Diisi");
          $('input[name="lebar"]').focus();
        }else if (jumlah_kertas == '' || jumlah_kertas == null) {
          // console.log(jumlah_kertas);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
          $('input[name="jumlah_kertas"]').focus();
        }else if (alamat == '' || alamat == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
          $('input[name="alamat"]').focus();
        }else if (deadline == '' || deadline == null) {
          // console.log(alamat);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
          $('select[name="deadline"]').focus();
        }else if (nama == '' || nama== null) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Nama Harus Diisi");
          $('input[name="nama"]').focus();
        }else if (tema == '' || tema== null) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Tema Harus Diisi");
          $('input[name="tema"]').focus();
        }else if (panjang > 5) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
          $('input[name="panjang"]').focus();
          $('input[name="panjang"]').val('');
        }else if (lebar > 5) {
          // console.log(nama_pertama);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Lebar Maksimal 5 Meter");
          $('input[name="panjang"]').focus();
          $('input[name="panjang"]').val('');
        }else if (totalfiles > 5) {
          // console.log(nama_ortu_kedua);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
          $("#files").val(null);
          document.getElementById('files').focus();
        }else {
          for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
          }
          form_data.append('data', data);
          form_data.append('id_nya', <?=$this->uri->segment(3)?>);
          
          $.ajax({
            url: "<?=base_url()?>user/beli/beli_produk",
            type: 'post',
            data: form_data,
            // dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
              response = JSON.parse(response);
              // console.log(response);
              if (response['error'] == 0 || response['error'] == 1) {
                var mesej;
                if (response['error'] == 0) {
                  mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                }else if (response['error'] == 1) {
                  mesej = "Ukuran Foto Maksimal 1.5 mb";
                }
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
                toastr.error("<b>Error</b><br>"+mesej);
                $("#files").val(null);
                document.getElementById('files').focus();
              }else if (response['error'] == 3 ) {
                // console.log('sini_ok');
                window.location.replace(response['url']);
              }
              // alert(response);
              // window.location.replace(response);

            }
          });

          // $.ajax({
          //   type: "post",
          //   url: "<?=base_url()?>user/beli/<?=$this->uri->segment(3)?>",
          //   data: {data: data}, // appears as $_GET['id'] @ your backend side
          //   // dataType: "html",
          //   success: function(data1) {
          //     window.location.replace("<?=base_url()?>user/pesanan/detail/"+data1);
          //     // console.log(data1);
          //   }

          // });
        }
      }
    </script>
  <?php endif ?>

<?php elseif ($this->uri->segment(2) == 'pesanan'): ?>
  <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable({
            "aLengthMenu": [[10, 20, 30, ,40, -1], [10, 20, 30, 40 ,"All"]],
            "iDisplayLength": 10,
        // "pageLength": 5,
        "searching": true,
        "paging":   true,
        "ordering": true,
        "info":     false,

          });
          
      });
  </script>

  <script type="text/javascript">
    function previewImage() {
      document.getElementById("image-preview").style.display = "block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("imagesource").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    };
  </script>

  <script type="text/javascript">
    function klik_foto(e){
      if (e == 1) {
        $("#files").attr("disabled","");
        $("#files").val(null);
        $("#ubah_sini1").html("");
        $("#foto_upload_lama").attr("style","display : block");
      }else if (e == 2) {
        console.log("ganti foto");
        $("#files").removeAttr("disabled");
        $("#foto_upload_lama").attr("style","display : none");
      }
    }
  </script>

  <script type="text/javascript">
    function upload(){

      var file_data = $('#imagesource').prop('files')[0];   
      var form_data = new FormData();                  
      form_data.append('file', file_data);
      // form_data.append('no', <?=$this->uri->segment(4)?>);
      // console.log(form_data);                   
      var file = document.getElementById('imagesource').files[0];
      var le=file['name'].length;
      var poin=file['name'].lastIndexOf(".");
      var accu1=file['name'].substring(poin,le);
      var accu = accu1.toLowerCase(); 
      console.log(accu);

      if (accu == '.png' || accu == '.jpg') {
        console.log('benar');
      }else{
        console.log('salah');
      }

      if (document.getElementById('imagesource').value == "") {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

          
        toastr.error("Foto Harus Dipilih");
        document.getElementById('imagesource').focus() ;
      }else if(file && file.size > 1800000){
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

          
        toastr.error("Saiz Foto Maksimal 1.5 Mb");
        document.getElementById('imagesource').focus() ;
      }else if (accu == '.png' || accu == '.jpg'){
        $.ajax({
          cache: false,
          contentType: false,
          processData: false,
          type: "post",
          url: "<?=base_url()?>user/pesanan/upload_foto_transaksi/<?=$this->uri->segment(4)?>",
          data: form_data,
          // data: {foto : file}, // appears as $_GET['id'] @ your backend side
          // dataType: "html",
          success: function(data1) {
            window.location.replace("<?=base_url()?>user/pesanan/");
            console.log(data1);
          }

        });
      }else{
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        
        toastr.error("Ekstensi Foto Harus .png atau .jpg");
        document.getElementById('imagesource').focus() ;
      }
    }
  </script>

  <?php if (is_numeric($this->uri->segment(3))): ?>

    <script src="<?=base_url()?>/dist/js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript">
      function myFunction(a) {
        if (a == 0) {
          var x = $("#myDIV");
          var xx = document.getElementById("myDIV");
        }else if (a == 1) {
          var x = $("#myDIV1");
          var xx = document.getElementById("myDIV1");
        }
        
        if (xx.style.display === "none") {
          x.slideToggle();
        } else {
          x.slideToggle();
        }
      }

    </script>    
  <?php endif ?>

  <?php if ($this->uri->segment(3) == 'detail'): ?>
    <script src="<?=base_url()?>/dist/js/lightbox-plus-jquery.min.js"></script>  
    <script type="text/javascript">
      var file = document.getElementById('files');
     
      function previewImage1() {
        if ($("#files")[0].files.length > 5) {        
          $('#files').val(null);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };

          
          toastr.error("Jumlah Foto Yang Diupload Maksimal 5");
          $('#ubah_sini').html("");
          document.getElementById('files').focus() ;
        }else{
          var text = "";
          for (var i = 0; i < file.files.length; i++) {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("files").files[i]);

            oFReader.onload = function(oFREvent) {
              // document.getElementById("image-preview").src = oFREvent.target.result;
              // console.log(oFREvent.target.result);
              if (i==0) {
                text +='';
              }else if (i!=0) {
                text+='<div class="form-group"><center> <a class="example-image-link" href="'+oFREvent.target.result+'" data-lightbox="example-set" ><img class="example-image" src="'+oFREvent.target.result+'" width="240px" height="240px" alt=""/></a></center></div>';
              }
              
              $('#ubah_sini1').html(text);
            };
            // console.log(i);
          }
        }      
      };
    </script> 
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      }
    </script>  

    <!---->

    <?php  
      if ($beli_desain == 1) {
        foreach ($data_pembelian->result() as $key => $value) ; 
        $ket = json_decode($value->ket);
        $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
        foreach ($cekkategori->result() as $key1 => $value1) ;
        $kategori = $value1->nama;

        if ($value->kategori == 1) {
          if ($ket->undangan == 1) {
            $kategori = $kategori . ' Aqiqah';
          }elseif ($ket->undangan == 2) {
            $kategori = $kategori . ' Nikah';
          }
        }else{
          $kategori = $kategori;
        }
      }elseif ($beli_desain == 0) {
        foreach ($data->result() as $key => $value);
        $data_pembeli = $this->session->userdata('pembeli');
        $ket = json_decode($value->keterangan);
        $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
        foreach ($cekkategori->result() as $key1 => $value1) ;
        $kategori = $value1->nama;
        if ($value->kategori == 1) {
          if ($ket->undangan == 1) {
            $kategori = $kategori . ' Aqiqah';
          }elseif ($ket->undangan == 2) {
            $kategori = $kategori . ' Nikah';
          }
        }else{
          $kategori = $kategori;
        }
      }
        
    ?>

    <script type="text/javascript">
      var elem = document.getElementById("panjang");

      elem.addEventListener("keydown",function(event){
          var key = event.which;
          if((key<48 || key>57) && key != 8) event.preventDefault();
      });

      elem.addEventListener("keyup",function(event){
          var value = this.value.replace(/,/g,"");
          this.dataset.currentValue=parseInt(value);
          var caret = value.length-1;
          while((caret-3)>-3)
          {
              caret -= 1;
              value = value.split('');
              value.splice(caret+1,0,",");
              value = value.join('');
          }
          this.value = value;
      });
    </script>

    <script type="text/javascript">
      var elem = document.getElementById("lebar");

      elem.addEventListener("keydown",function(event){
          var key = event.which;
          if((key<48 || key>57) && key != 8) event.preventDefault();
      });

      elem.addEventListener("keyup",function(event){
          var value = this.value.replace(/,/g,"");
          this.dataset.currentValue=parseInt(value);
          var caret = value.length-1;
          while((caret-3)>-3)
          {
              caret -= 1;
              value = value.split('');
              value.splice(caret+1,0,",");
              value = value.join('');
          }
          this.value = value;
      });
    </script>

    <script type="text/javascript">
      function setInputFilter(textbox, inputFilter) {
          ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              } else {
                this.value = "";
              }
            });
          });
        }


      // Install input filters.
      setInputFilter(document.getElementById("jumlah_kertas"), function(value) {
        return /^-?\d*$/.test(value); });
      <?php  
        if ($value->kategori == 3) { ?>
      // setInputFilter(document.getElementById("panjang"), function(value) {
      //   return /^-?\d*$/.test(value); });
      // setInputFilter(document.getElementById("lebar"), function(value) {
      //   return /^-?\d*$/.test(value); });
          <?php
        }elseif ($value->kategori == 2) { ?>
      setInputFilter(document.getElementById("no_telpon"), function(value) {
        return /^-?\d*$/.test(value); });
          <?php
        }
      ?>

    </script>

    <?php if ($value->kategori != 3): ?>
      <script type="text/javascript">
        function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        setInterval("my_function();",5000); 
          <?php 
            if ($beli_desain == 0) {
              foreach ($data->result() as $key => $value);
              $ket = json_decode($value->keterangan);
            }
              
          ?>        
        function my_function(){
            var jenis_kertas = $("#jenis_kertas").val();
            var jumlah_kertas = $("#jumlah_kertas").val();
            if (jenis_kertas == null || jenis_kertas == '') {
              // console.log('Pilih Kertas dulu');
              $('#jumlah_harga').val("-Pilih Jenis Kertas Dan Isikan Jumlah Kertas")
            }else if (jumlah_kertas == '') {
              $('#jumlah_harga').val("-Isikan Jumlah Kertas")
            }else{
              var harga = (parseFloat(jenis_kertas) * parseFloat(jumlah_kertas) )+ <?php if ($beli_desain == 0){echo $ket->harga;}elseif ($beli_desain == 1) {echo 0;}?>;
              // console.log(numberWithCommas(harga)); 
              $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
            }
        }
      </script>
    <?php endif ?>
  
    <?php if ($value->kategori == 3): ?>
      <script type="text/javascript">
        function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $.ajax({
          // type: "post",
          // url: "<?=base_url()?>user/pesanan/",
          // data: {no : <?=$this->uri->segment(4)?> ,data: data,proses : "edit_kembali"}, // appears as $_GET['id'] @ your backend side
          // dataType: "html",
          success: function(data1) {
            // window.location.replace("<?=base_url()?>user/pesanan/detail/<?=$this->uri->segment(4)?>");
            my_function();
            // console.log(data1);
          }
        });

        setInterval("my_function();",2500); 
          <?php 
            if ($beli_desain == 0) {
              foreach ($data->result() as $key => $value);
              $ket = json_decode($value->keterangan);
            }
              
          ?>      
          function my_function(){
            var panjang = $("#panjang").val();
            var lebar = $("#lebar").val();
            var jumlah_kertas = $("#jumlah_kertas").val();

            // console.log(panjang);
            // console.log(lebar);
            if (panjang == '' || panjang == null) {
              $('#jumlah_harga').val("-Panjang Kertas Belum Terisi")
            }else if (lebar == '' || lebar == null) {
              $('#jumlah_harga').val("-Lebar Kertas Belum Terisi")
            }else if (jumlah_kertas == '') {
              $('#jumlah_harga').val("-Isikan Jumlah Kertas");
            }else{
              if (panjang.length == 3) {
                panjang = panjang.replace(/,/g, '.');
              }

              if (lebar.length == 3) {
                lebar = lebar.replace(/,/g, '.');
              }

              // if (panjang > 6) {
              //   // document.getElementById('panjang').value = '';
              //   // $("#panjang").focus();
              //   $("#panjang").focus(function() {
              //       $(this).val("");
              //   });
              //   console.log("panjnag");
                
              // }
              // var jumlah_panjang = parseFloat(panjang) * 12500;
              // var jumlah_lebar = parseFloat(lebar) * 12500;
              var harga = panjang * lebar * 12500 * jumlah_kertas + <?php if ($beli_desain == 0){echo $ket->harga;}elseif ($beli_desain == 1) {echo 0;}?>;
              harga = Math.round(harga);
              // console.log(numberWithCommas(harga)); 
              // $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
              $('#panjang').val(panjang);
              $('#lebar').val(lebar);
              $('#jumlah_harga').val("Rp . " +numberWithCommas(harga));
            }
          }
      </script>
    <?php endif ?>

    <?php if ($kategori == 'Undangan Nikah'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama_pertama = $('input[name="nama_pertama"]').val();
          var nama_kedua = $('input[name="nama_kedua"]').val();
          var tanggal = $('input[name="tanggal"]').val();
          var akad = $('input[name="akad"]').val();
          var resepsi = $('input[name="resepsi"]').val();
          var nama_ortu_pertama = $('input[name="nama_ortu_pertama"]').val();
          var nama_ortu_kedua = $('input[name="nama_ortu_kedua"]').val();


          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;
          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama_pertama == '' || nama_pertama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Pertama Harus Diisi");
            $('input[name="nama_pertama"]').focus();
          }else if (nama_kedua == '' || nama_kedua== null) {
            // console.log(nama_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Kedua Harus Diisi");
            $('input[name="nama_kedua"]').focus();
          }else if (tanggal == '' || tanggal== null) {
            // console.log(tanggal);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tanggal Pernikahan Harus Diisi");
            $('input[name="tanggal"]').focus();
          }else if (akad == '' || akad== null) {
            // console.log(akad);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Akad Harus Diisi");
            $('input[name="akad"]').focus();
          }else if (resepsi == '' || resepsi== null) {
            // console.log(resepsi);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Resepsi Harus Diisi");
            $('input[name="resepsi"]').focus();
          }else if (nama_ortu_pertama == '' || nama_ortu_pertama== null) {
            // console.log(nama_ortu_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Pertama Harus Diisi");
            $('input[name="nama_ortu_pertama"]').focus();
          }else if (nama_ortu_kedua == '' || nama_ortu_kedua== null) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Kedua Harus Diisi");
            $('input[name="nama_ortu_kedua"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            form_data.append('id_nya', <?=$this->uri->segment(4)?>);
            
            $.ajax({
              url: "<?=base_url()?>user/pesanan/edit_kembali",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  $("#sini_ubah1").html("");
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });
          }
        }
      </script>  

    <?php elseif ($kategori == 'Undangan Aqiqah'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var waktu = $('input[name="waktu"]').val();
          var tempat = $('input[name="tempat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama_anak = $('input[name="nama_anak"]').val();
          var ket_anak = $('input[name="ket_anak"]').val();
          var tanggal = $('input[name="tanggal"]').val();
          var nama_ortu = $('input[name="nama_ortu"]').val();


          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;

          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama_anak == '' || nama_anak== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Anak Harus Diisi");
            $('input[name="nama_anak"]').focus();
          }else if (tanggal == '' || tanggal== null) {
            // console.log(nama_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tanggal Harus Diisi");
            $('input[name="tanggal"]').focus();
          }else if (waktu == '' || waktu == null) {
            // console.log(tanggal);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Waktu Harus Diisi");
            $('input[name="waktu"]').focus();
          }else if (tempat == '' || tempat== null) {
            // console.log(akad);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Akad Harus Diisi");
            $('input[name="tempat"]').focus();
          }else if (nama_ortu == '' || nama_ortu== null) {
            // console.log(resepsi);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Harus Diisi");
            $('input[name="nama_ortu"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            form_data.append('id_nya', <?=$this->uri->segment(4)?>);
            
            $.ajax({
              url: "<?=base_url()?>user/pesanan/edit_kembali",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  $("#sini_ubah1").html("");
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });
          }
        }
      </script>

    <?php elseif ($kategori == 'Kartu Nama'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama = $('input[name="nama"]').val();
          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;

          // console.log(data);
          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama == '' || nama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Harus Diisi");
            $('input[name="nama"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            form_data.append('id_nya', <?=$this->uri->segment(4)?>);
            
            $.ajax({
              url: "<?=base_url()?>user/pesanan/edit_kembali",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  $("#sini_ubah1").html("");
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });
          }

          
        }
      </script>

    <?php elseif ($kategori == 'Spanduk'): ?>
      <script type="text/javascript">
        $('#panjang').click(function(e) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.info("<b>Info</b><br>Maksimal Panjang Spanduk = '<b><i>5</i></b>' Meter");
        });

        $('#lebar').click(function(e) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.info("<b>Info</b><br>Maksimal Lebar Spanduk = '<b><i>5</i></b>' Meter");
        });

        $('#panjang').bind('change keyup',function (){
          // console.log($('#panjang').val());
          var panjang = $('#panjang').val();
          // console.log(panjang.length);
          if (panjang.length == 3) {
            panjang = panjang.replace(",", ".");
          }

          // console.log(panjang);
          if (panjang > 5 ) {
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }

        });

        $('#lebar').bind('change keyup',function (){
          // console.log($('#panjang').val());
          var panjang = $('#lebar').val();
          // console.log(panjang.length);
          if (panjang.length == 3) {
            panjang = panjang.replace(",", ".");
          }

          // console.log(panjang);
          if (panjang > 5 ) {
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="lebar"]').focus();
            $('input[name="lebar"]').val('');
          }

        });

        function proses(){
          // var jenis_kertas = $('select[name="jenis_kertas"]').val();
          var panjang = $('input[name="panjang"]').val();
          var lebar = $('input[name="lebar"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama = $('input[name="nama"]').val();
          var tema = $('input[name="tema"]').val();



          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;



          if (panjang == null || panjang == '') {
            // console.log(panjang_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Kertas Harus Diisi");
            $('input[name="panjang"]').focus();
          }else if (lebar == null || lebar == '') {
            // console.log(panjang_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Lebar Kertas Harus Diisi");
            $('input[name="lebar"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama == '' || nama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Harus Diisi");
            $('input[name="nama"]').focus();
          }else if (tema == '' || tema== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tema Harus Diisi");
            $('input[name="tema"]').focus();
          }else if (panjang > 5) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }else if (lebar > 6) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Lebar Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            form_data.append('id_nya', <?=$this->uri->segment(4)?>);
            
            $.ajax({
              url: "<?=base_url()?>user/pesanan/edit_kembali",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  $("#sini_ubah1").html("");
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });
          }

        }
      </script>
    <?php endif ?>
  <?php endif ?>
<?php endif ?>
 


<?php if ($this->uri->segment(2) == 'pengembalian'): ?>
  <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable({
            "aLengthMenu": [[10, 20, 30, ,40, -1], [10, 20, 30, 40 ,"All"]],
            "iDisplayLength": 10,
        // "pageLength": 5,
        "searching": true,
        "paging":   true,
        "ordering": true,
        "info":     false,

          });
          
      });
  </script>
  <?php if (is_numeric($this->uri->segment(3))): ?>
  <script type="text/javascript">
    var file = document.getElementById('imagesource');
   
    function previewImage() {
      if ($("#imagesource")[0].files.length > 5) {        
        $('#imagesource').val(null);
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        
        toastr.error("Jumlah Foto Yang Diupload Maksimal 5");
        $('#ubah_sini').html("");
        document.getElementById('imagesource').focus() ;
      }else{
        var text = "";
        for (var i = 0; i < file.files.length; i++) {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("imagesource").files[i]);

          oFReader.onload = function(oFREvent) {
            // document.getElementById("image-preview").src = oFREvent.target.result;
            // console.log(oFREvent.target.result);
            if (i==0) {
              text +='';
            }else if (i!=0) {
              text+='<div class="form-group"><center> <a class="example-image-link" href="'+oFREvent.target.result+'" data-lightbox="example-set" ><img class="example-image" src="'+oFREvent.target.result+'" width="50%" alt=""/></a></center></div>';
            }
            
            $('#ubah_sini').html(text);
          };
          // console.log(i);
        }
      }      
    };
  </script> 

  <script type="text/javascript">
    function myFunction() {
      
      var x = $("#myDIV");
      var xx = document.getElementById("myDIV");
      
      
      if (xx.style.display === "none") {
        x.slideToggle();
      } else {
        x.slideToggle();
      }
    }

  </script>
  
  <script src="<?=base_url()?>/dist/js/lightbox-plus-jquery.min.js"></script>
  <?php endif ?>
<?php endif ?> 

<?php if ($this->uri->segment(2) == 'desain_sendiri'): ?>
  <?php if ($this->uri->segment(3) == ''): ?>
    <script type="text/javascript">
      function changeKategori() {
        var selectBox = document.getElementById("kategori");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        if (selectedValue == 1) {
          $('#undangan'). attr("required", "");
          $("#jenis_undangan").show();
        }else{
          $('#undangan').removeAttr('required')
          $("#jenis_undangan").hide();
        }
        
      }
    </script>  
  <?php endif ?>

  <?php if (is_numeric($this->uri->segment(4))): ?>
    <?php  
      // foreach ($data->result() as $key => $value);
      // $data_pembeli = $this->session->userdata('pembeli');
      // $ket = json_decode($value->keterangan);
      // $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
      // foreach ($cekkategori->result() as $key1 => $value1) ;
      $kategori = $this->uri->segment(4);
      $undangan = $this->uri->segment(5);
      if ($kategori == 1) {
        if ($undangan == 1) {
          $kategori1 = 'Undangan Aqiqah';
        }elseif ($undangan == 2) {
          $kategori1 = 'Undangan Nikah';
        }
      }elseif ($kategori == 2) {
        $kategori1 = 'Kartu Nama';
      }elseif($kategori == 3){
        $kategori1 = 'Spanduk';
      }
    ?>

    <script src="<?=base_url()?>/dist/js/lightbox-plus-jquery.min.js"></script>

    <script type="text/javascript">
      var elem = document.getElementById("panjang");

      elem.addEventListener("keydown",function(event){
          var key = event.which;
          if((key<48 || key>57) && key != 8) event.preventDefault();
      });

      elem.addEventListener("keyup",function(event){
          var value = this.value.replace(/,/g,"");
          this.dataset.currentValue=parseInt(value);
          var caret = value.length-1;
          while((caret-3)>-3)
          {
              caret -= 1;
              value = value.split('');
              value.splice(caret+1,0,",");
              value = value.join('');
          }
          this.value = value;
      });
    </script>

    <script type="text/javascript">
      var elem = document.getElementById("lebar");

      elem.addEventListener("keydown",function(event){
          var key = event.which;
          if((key<48 || key>57) && key != 8) event.preventDefault();
      });

      elem.addEventListener("keyup",function(event){
          var value = this.value.replace(/,/g,"");
          this.dataset.currentValue=parseInt(value);
          var caret = value.length-1;
          while((caret-3)>-3)
          {
              caret -= 1;
              value = value.split('');
              value.splice(caret+1,0,",");
              value = value.join('');
          }
          this.value = value;
      });
    </script>

    <script type="text/javascript">
      function setInputFilter(textbox, inputFilter) {
          ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              } else {
                this.value = "";
              }
            });
          });
        }


      // Install input filters.
      setInputFilter(document.getElementById("jumlah_kertas"), function(value) {
        return /^-?\d*$/.test(value); });
      <?php  
        if ($kategori == 3) { ?>
      // setInputFilter(document.getElementById("panjang"), function(value) {
      //   return /^-?\d*$/.test(value); });
      // setInputFilter(document.getElementById("lebar"), function(value) {
      //   return /^-?\d*$/.test(value); });
          <?php
        }elseif ($kategori == 2) { ?>
      setInputFilter(document.getElementById("no_telpon"), function(value) {
        return /^-?\d*$/.test(value); });
          <?php
        }
      ?>

    </script>

    <?php if ($kategori != 3): ?>
      <script type="text/javascript">
        function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        setInterval("my_function();",5000); 
             
        function my_function(){
            var jenis_kertas = $("#jenis_kertas").val();
            var jumlah_kertas = $("#jumlah_kertas").val();
            if (jenis_kertas == null || jenis_kertas == '') {
              // console.log('Pilih Kertas dulu');
              $('#jumlah_harga').val("-Pilih Jenis Kertas Dan Isikan Jumlah Kertas")
            }else if (jumlah_kertas == '') {
              $('#jumlah_harga').val("-Isikan Jumlah Kertas")
            }else{
              var harga = (parseFloat(jenis_kertas) * parseFloat(jumlah_kertas) );
              // console.log(numberWithCommas(harga)); 
              $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
            }
        }
      </script>
    <?php endif ?>
    
    <?php if ($kategori == 3): ?>
      <script type="text/javascript">
        function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        setInterval("my_function();",2500); 
              
          function my_function(){
            var panjang = $("#panjang").val();
            var lebar = $("#lebar").val();
            var jumlah_kertas = $("#jumlah_kertas").val();

            // console.log(panjang);
            // console.log(lebar);
            if (panjang == '' || panjang == null) {
              $('#jumlah_harga').val("-Panjang Kertas Belum Terisi")
            }else if (lebar == '' || lebar == null) {
              $('#jumlah_harga').val("-Lebar Kertas Belum Terisi")
            }else if (jumlah_kertas == '') {
              $('#jumlah_harga').val("-Isikan Jumlah Kertas");
            }else{
              if (panjang.length == 3) {
                panjang = panjang.replace(/,/g, '.');
              }

              if (lebar.length == 3) {
                lebar = lebar.replace(/,/g, '.');
              }

              // if (panjang > 6) {
              //   // document.getElementById('panjang').value = '';
              //   // $("#panjang").focus();
              //   $("#panjang").focus(function() {
              //       $(this).val("");
              //   });
              //   console.log("panjnag");
                
              // }
              // var jumlah_panjang = parseFloat(panjang) * 12500;
              // var jumlah_lebar = parseFloat(lebar) * 12500;
              var harga = ((panjang * 12500) +  (lebar * 12500))  * jumlah_kertas;
              harga = Math.round(harga);
              // console.log(numberWithCommas(harga)); 
              // $('#jumlah_harga').val("Rp . " + numberWithCommas(harga))
              $('#panjang').val(panjang);
              $('#lebar').val(lebar);
              $('#jumlah_harga').val("Rp . " +numberWithCommas(harga));
            }
          }
      </script>
    <?php endif ?>
    <script type="text/javascript">
      var file = document.getElementById('files');
     
      function previewImage() {
        if ($("#files")[0].files.length > 5) {        
          $('#files').val(null);
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };

          
          toastr.error("Jumlah Foto Yang Diupload Maksimal 5");
          $('#ubah_sini').html("");
          document.getElementById('files').focus() ;
        }else{
          var text = "";
          for (var i = 0; i < file.files.length; i++) {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("files").files[i]);

            oFReader.onload = function(oFREvent) {
              // document.getElementById("image-preview").src = oFREvent.target.result;
              // console.log(oFREvent.target.result);
              if (i==0) {
                text +='';
              }else if (i!=0) {
                text+='<div class="form-group"><center> <a class="example-image-link" href="'+oFREvent.target.result+'" data-lightbox="example-set" ><img class="example-image" src="'+oFREvent.target.result+'" width="240px" height="240px" alt=""/></a></center></div>';
              }
              
              $('#ubah_sini').html(text);
            };
            // console.log(i);
          }
        }      
      };
    </script> 

    <?php if ($kategori1 == 'Undangan Nikah'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama_pertama = $('input[name="nama_pertama"]').val();
          var nama_kedua = $('input[name="nama_kedua"]').val();
          var tanggal = $('input[name="tanggal"]').val();
          var akad = $('input[name="akad"]').val();
          var resepsi = $('input[name="resepsi"]').val();
          var nama_ortu_pertama = $('input[name="nama_ortu_pertama"]').val();
          var nama_ortu_kedua = $('input[name="nama_ortu_kedua"]').val();


          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;
          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama_pertama == '' || nama_pertama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Pertama Harus Diisi");
            $('input[name="nama_pertama"]').focus();
          }else if (nama_kedua == '' || nama_kedua== null) {
            // console.log(nama_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Kedua Harus Diisi");
            $('input[name="nama_kedua"]').focus();
          }else if (tanggal == '' || tanggal== null) {
            // console.log(tanggal);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tanggal Pernikahan Harus Diisi");
            $('input[name="tanggal"]').focus();
          }else if (akad == '' || akad== null) {
            // console.log(akad);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Akad Harus Diisi");
            $('input[name="akad"]').focus();
          }else if (resepsi == '' || resepsi== null) {
            // console.log(resepsi);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Resepsi Harus Diisi");
            $('input[name="resepsi"]').focus();
          }else if (nama_ortu_pertama == '' || nama_ortu_pertama== null) {
            // console.log(nama_ortu_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Pertama Harus Diisi");
            $('input[name="nama_ortu_pertama"]').focus();
          }else if (nama_ortu_kedua == '' || nama_ortu_kedua== null) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Kedua Harus Diisi");
            $('input[name="nama_ortu_kedua"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            // form_data.append('id_nya', <?=$this->uri->segment(3)?>);
            form_data.append('kategori_nya', 1);
            
            $.ajax({
              url: "<?=base_url()?>user/desain_sendiri/beli_produk",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                // console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });

            
          }
        }
      </script>  

      

    <?php elseif ($kategori1 == 'Undangan Aqiqah'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var waktu = $('input[name="waktu"]').val();
          var tempat = $('input[name="tempat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama_anak = $('input[name="nama_anak"]').val();
          var ket_anak = $('input[name="ket_anak"]').val();
          var tanggal = $('input[name="tanggal"]').val();
          var nama_ortu = $('input[name="nama_ortu"]').val();


          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;

          console.log(data);
          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama_anak == '' || nama_anak== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Anak Harus Diisi");
            $('input[name="nama_anak"]').focus();
          }else if (tanggal == '' || tanggal== null) {
            // console.log(nama_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tanggal Harus Diisi");
            $('input[name="tanggal"]').focus();
          }else if (waktu == '' || waktu == null) {
            // console.log(tanggal);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Waktu Harus Diisi");
            $('input[name="waktu"]').focus();
          }else if (tempat == '' || tempat== null) {
            // console.log(akad);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Akad Harus Diisi");
            $('input[name="tempat"]').focus();
          }else if (nama_ortu == '' || nama_ortu== null) {
            // console.log(resepsi);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Orang Tua Harus Diisi");
            $('input[name="nama_ortu"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            // form_data.append('id_nya', <?=$this->uri->segment(3)?>);
            form_data.append('kategori_nya', 1);
            
            $.ajax({
              url: "<?=base_url()?>user/desain_sendiri/beli_produk",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                // console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });

           
          }
        }
      </script>

    <?php elseif ($kategori1 == 'Kartu Nama'): ?>
      <script type="text/javascript">
        function proses(){
          var jenis_kertas = $('select[name="jenis_kertas"]').val();
          // var panjang_kertas = $('select[name="panjang_kertas"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama = $('input[name="nama"]').val();
          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;
          
          if (jenis_kertas == null || jenis_kertas == '') {
            // console.log(jenis_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jenis Kertas Harus Dipilih");
            $('select[name="jenis_kertas"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama == '' || nama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Harus Diisi");
            $('input[name="nama"]').focus();
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            // form_data.append('id_nya', <?=$this->uri->segment(3)?>);
            form_data.append('kategori_nya', 2);
            
            $.ajax({
              url: "<?=base_url()?>user/desain_sendiri/beli_produk",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                // console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });

            
          }
        }
      </script>

    <?php elseif ($kategori1 == 'Spanduk'): ?>
      <script type="text/javascript">
        $('#panjang').bind('change keyup',function (){
          // console.log($('#panjang').val());
          var panjang = $('#panjang').val();
          // console.log(panjang.length);
          if (panjang.length == 3) {
            panjang = panjang.replace(",", ".");
          }

          // console.log(panjang);
          if (panjang > 5 ) {
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }

        });

        $('#lebar').bind('change keyup',function (){
          // console.log($('#panjang').val());
          var panjang = $('#lebar').val();
          // console.log(panjang.length);
          if (panjang.length == 3) {
            panjang = panjang.replace(",", ".");
          }

          // console.log(panjang);
          if (panjang > 5 ) {
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="lebar"]').focus();
            $('input[name="lebar"]').val('');
          }

        });


        $('#panjang').click(function(e) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.info("<b>Info</b><br>Maksimal Panjang Spanduk = '<b><i>5</i></b>' Meter");
        });

         $('#lebar').click(function(e) {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.info("<b>Info</b><br>Maksimal Lebar Spanduk = '<b><i>5</i></b>' Meter");
        });


        function proses(){
          // var jenis_kertas = $('select[name="jenis_kertas"]').val();
          var panjang = $('input[name="panjang"]').val();
          var lebar = $('input[name="lebar"]').val();
          var jumlah_kertas = $('input[name="jumlah_kertas"]').val();
          var alamat = $('input[name="alamat"]').val();
          var deadline = $('select[name="deadline"]').val();


          var nama = $('input[name="nama"]').val();
          var tema = $('input[name="tema"]').val();



          var data = $('#ini_formnya').serializeArray();
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'files';
          });
          data = JSON.stringify(data);

          var form_data = new FormData();
          form_data.append('data', data);

          var totalfiles = document.getElementById('files').files.length;


          if (panjang == null || panjang == '') {
            // console.log(panjang_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Kertas Harus Diisi");
            $('input[name="panjang"]').focus();
          }else if (lebar == null || lebar == '') {
            // console.log(panjang_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Lebar Kertas Harus Diisi");
            $('input[name="lebar"]').focus();
          }else if (jumlah_kertas == '' || jumlah_kertas == null) {
            // console.log(jumlah_kertas);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Kertas Harus Diisi");
            $('input[name="jumlah_kertas"]').focus();
          }else if (alamat == '' || alamat == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Alamat Pengiriman Harus Diisi");
            $('input[name="alamat"]').focus();
          }else if (deadline == '' || deadline == null) {
            // console.log(alamat);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Deadline Pembuatan Harus Dipilih");
            $('select[name="deadline"]').focus();
          }else if (nama == '' || nama== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Nama Harus Diisi");
            $('input[name="nama"]').focus();
          }else if (tema == '' || tema== null) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Tema Harus Diisi");
            $('input[name="tema"]').focus();
          }else if (panjang > 5) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Panjang Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }else if (lebar > 5) {
            // console.log(nama_pertama);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Lebar Maksimal 5 Meter");
            $('input[name="panjang"]').focus();
            $('input[name="panjang"]').val('');
          }else if (totalfiles > 5) {
            // console.log(nama_ortu_kedua);
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            toastr.error("<b>Error</b><br>Jumlah Foto Maksimal 5");
            $("#files").val(null);
            document.getElementById('files').focus();
          }else {
            for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
            }
            form_data.append('data', data);
            // form_data.append('id_nya', <?=$this->uri->segment(3)?>);
            form_data.append('kategori_nya', 3);
            
            $.ajax({
              url: "<?=base_url()?>user/desain_sendiri/beli_produk",
              type: 'post',
              data: form_data,
              // dataType: 'json',
              contentType: false,
              processData: false,
              success: function (response) {
                response = JSON.parse(response);
                // console.log(response);
                if (response['error'] == 0 || response['error'] == 1) {
                  var mesej;
                  if (response['error'] == 0) {
                    mesej = "Ekstensi Foto Harus .jpg , .jpeg dan .png";
                  }else if (response['error'] == 1) {
                    mesej = "Ukuran Foto Maksimal 1.5 mb";
                  }
                  toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  toastr.error("<b>Error</b><br>"+mesej);
                  $("#files").val(null);
                  document.getElementById('files').focus();
                }else if (response['error'] == 3 ) {
                  // console.log('sini_ok');
                  window.location.replace(response['url']);
                }
                // alert(response);
                // window.location.replace(response);

              }
            });

            
          }
        }
      </script>
    <?php endif ?>
  <?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'user'): ?>
  <script type="text/javascript">
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
          textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
              this.oldValue = this.value;
              this.oldSelectionStart = this.selectionStart;
              this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
              this.value = this.oldValue;
              this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
              this.value = "";
            }
          });
        });
      }


    // Install input filters.
    setInputFilter(document.getElementById("no_telpon"), function(value) {
      return /^-?\d*$/.test(value); });
  </script>
<?php endif ?>

 
  


  <script src="<?=base_url()?>js/main.js"></script>