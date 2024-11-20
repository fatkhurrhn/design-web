    <head>
      <title>Pemesanan Desain Grafis</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
      <link rel="stylesheet" href="<?=base_url()?>fonts/icomoon/style.css">

      <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url()?>css/magnific-popup.css">
      <link rel="stylesheet" href="<?=base_url()?>css/jquery-ui.css">
      <link rel="stylesheet" href="<?=base_url()?>css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?=base_url()?>css/owl.theme.default.min.css">

      <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-datepicker.css">

      <link rel="stylesheet" href="<?=base_url()?>fonts/flaticon/font/flaticon.css">

      <link rel="stylesheet" href="<?=base_url()?>css/aos.css">

      <link rel="stylesheet" href="<?=base_url()?>css/style.css">

      <link rel="stylesheet" href="<?=base_url()?>assets/plugin/sweet-alert/sweetalert.css">

      <script src="<?=base_url()?>assets/plugin/sweet-alert/sweetalert.min.js"></script>

      <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugin/datatables/jquery.dataTables.min.css">

      <style>
          /*body {font-family: Arial;}*/

          /* Style the tab */
          .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
          }

          /* Style the buttons inside the tab */
          .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
          }

          /* Change background color of buttons on hover */
          .tab button:hover {
            background-color: #ddd;
          }

          /* Create an active/current tablink class */
          .tab button.active {
            background-color: #ccc;
          }

          /* Style the tab content */
          .tabcontent {
            display: none;
            padding: 6px 12px;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
            /*border: 1px solid #ccc;*/
          }

          /* Fade in tabs */
          @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
          }

          @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
          }
      </style>

      <?php if ($this->uri->segment(2) == 'beli'): ?>
      <link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">  
      <?php elseif ($this->uri->segment(2) == 'pesanan'): ?>
        <?php if ($this->uri->segment(3) == ''): ?>
          <style>
            <?php foreach ($data_pembelian->result() as $key => $value): ?>
            #img<?=$value->no?> {
            width: 100%;
            height: auto;
            }
            <?php endforeach ?>
            
          </style>    
        <?php elseif (is_numeric($this->uri->segment(3))): ?>
          <link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">     
        <?php elseif ($this->uri->segment(3) == 'detail'): ?>
          <link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">      
        <?php endif ?>
        
        <style>
          #image-preview{
            display:none;
            width : 100%;
            height : 100%;
          }
        </style>
        <style>
          /*body {font-family: Arial, Helvetica, sans-serif;}*/

          #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
          }

          #myImg:hover {opacity: 0.7;}

          /* The Modal (background) */
          .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
          }

          /* Modal Content (image) */
          .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
          }

          /* Caption of Modal Image */
          #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
          }

          /* Add Animation */
          .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
          }

          @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
          }

          @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
          }

          /* The Close Button */
          .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
          }

          .close:hover,
          .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
          }

          /* 100% Image Width on Smaller Screens */
          @media only screen and (max-width: 700px){
            .modal-content {
              width: 100%;
            }
          }
        </style> 

      <?php elseif ($this->uri->segment(2) == 'pengembalian'): ?>
        <?php if ($this->uri->segment(3) == ''): ?>
          <style>
            <?php foreach ($data_pembelian->result() as $key => $value): ?>
            #img<?=$value->no?> {
            width: 100%;
            height: auto;
            }
            <?php endforeach ?>
            
          </style>     
        <?php elseif (is_numeric($this->uri->segment(3))): ?>
          <style>
            #image-preview{
              display:none;
              width : 100%;
              height : 100%;
            }
          </style> 
          <link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">   
        <?php endif ?>
         

      <?php elseif ($this->uri->segment(2) == 'desain_sendiri'): ?>
        <?php if ($this->uri->segment(3) == 'pengisian'): ?>
           <link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css"> 
        <?php endif ?>
      <?php endif ?>
          
        
    </head>
    