<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('user/head') ?>
  <body>
  
  <div class="site-wrap">

    <?php $this->load->view('user/site_mobile') ?>
   
    <?php $this->load->view('user/top_bar') ?>

    <?php $this->load->view('user/header') ?>

  

    <?php $this->load->view('user/foto_pengenalan')?> 


    <?php $this->load->view($main) ?>

   
    <?php $this->load->view('user/footer') ?>
      
  </div>

  <?php $this->load->view('user/script') ?>
    
  </body>
</html>