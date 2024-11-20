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

        <!-- <link rel="stylesheet" href="<?=base_url()?>assets/plugin/sweet-alert/sweetalert.css">

        <script src="<?=base_url()?>assets/plugin/sweet-alert/sweetalert.min.js"></script> -->

        <link rel="stylesheet" href="<?php echo base_url() ?>sweet-alert/sweetalert.css">   

        <?php if ($this->uri->segment(2) == 'project'): ?>
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
        <?php endif ?>
            
        
    </head>
    