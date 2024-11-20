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

  <script src="<?php echo base_url() ?>sweet-alert/sweetalert.js"></script>

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
<?php endif ?>

<?php if ($this->session->flashdata('error')): ?>
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
    var typed = new Typed('.typed-words', {
    strings: [" Spanduk"," Kartu Nama"," Undangan"],
    typeSpeed: 80,
    backSpeed: 80,
    backDelay: 4000,
    startDelay: 1000,
    loop: true,
    showCursor: true
    });
  </script>
<?php endif ?>
  

<?php if ($this->uri->segment(2) == 'project'): ?>
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
        url: "<?=base_url()?>home/tukar_halaman/",
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
<?php endif ?>

<?php if ($this->uri->segment(2) == 'prelogin' ): ?>
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
    setInputFilter(document.getElementById("no_tel"), function(value) {
       return /^-?\d*$/.test(value); });
  </script>


  <?php if ($this->session->flashdata('pendaftaran')): 
    $data = $this->session->flashdata('pendaftaran');
  ?>
  <script type="text/javascript">
     swal({
        title: "Anda Berhasil Terdaftar",
        text: "Username = <?=$data['username']?> \n Password = <?=$data['username']?>",
        icon: "success",
        buttons: false,
      });
  </script>
  <?php endif ?>


  
<?php endif ?>
  


  <script src="<?=base_url()?>js/main.js"></script>