    <header class="site-navbar py-4 bg-white" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0"><?=$header?></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li <?php if ($this->uri->segment(2) == '') { echo 'class="active"'; } ?>><a href="<?=base_url()?>user">Halaman Utama</a></li>
                <li <?php if ($this->uri->segment(2) == 'pesanan') { echo 'class="active"'; } ?>><a href="<?=base_url()?>user/pesanan">Pesanan</a></li>
                <li <?php if ($this->uri->segment(2) == 'pengembalian') { echo 'class="active"'; } ?>><a href="<?=base_url()?>user/pengembalian">Pengembalian</a></li>
               
                <li <?php if ($this->uri->segment(2) == 'user') { echo 'class="active"'; } ?>><a href="<?=base_url()?>user/user">Pembeli</a></li>

                <li ><a href="<?=base_url()?>user/logout">Logout</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>