<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('home/head') ?>
  <body>
  
  <div class="site-wrap">

    <?php $this->load->view('home/site_mobile') ?>
   
    <?php $this->load->view('home/top_bar') ?>

    <?php $this->load->view('home/header') ?>

  

    <?php 
      if ($this->uri->segment(2) == '' or $this->uri->segment(2) == null) {
        $this->load->view('home/foto_pengenalan');
      }else{
        $this->load->view('home/foto_pengenalan_project');
      }
    ?> 


    <?php $this->load->view($main) ?>

   
    <?php $this->load->view('home/footer') ?>
      
  </div>

  <?php $this->load->view('home/script') ?>
    
  </body>
</html>