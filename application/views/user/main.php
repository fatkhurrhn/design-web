    <section class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="form-group">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'undangan')" id="defaultOpen">Undangan</button>
                <button class="tablinks" onclick="openCity(event, 'kartu_nama')">Kartu Nama</button>
                <button class="tablinks" onclick="openCity(event, 'spanduk')">Spanduk</button>
                 <a href="<?=base_url()?>user/desain_sendiri"><button>Desain Sendiri</button></a>
              </div>
            </div>
          </div>


          <div class="col-md-12 tabcontent" id="undangan">
            <div class="row mb-5">
              <?php  
              $nomor = 0;
              $data = $this->muser->tampil_data_gambar($nomor,1);

              if (count($data->result())>0) {
                foreach ($data->result() as $key => $value) { 
                  $keterangan = json_decode($value->keterangan);
                  ?>
              <div class="col-md-6 col-lg-3 mb-4 mb-lg-4">
                <div class="h-entry">
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><img src="<?=base_url($keterangan->img)?>" alt="Image" class="img-fluid"></a>

                  <center><div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div>
                  <p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs</p>
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><button type="button"  class="btn btn-warning btn-md text-white"> Detail </button></a></center>
                </div> 
              </div> 
                <?php }
              }
              ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-pagination text-center">
                  <?php  
                    $jumlah = $this->muser->jumlah_halaman(count($undangan->result()));
                    $ii = 0;
                    for ($i=1; $i <= $jumlah ; $i++) { ?> 
                  <span style="cursor: pointer;" onclick="tukar_halaman(<?=$ii?>,1)"><?=$i?></span>
                    <?php $ii+=12;}
                  ?>                 
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-12 tabcontent" id="kartu_nama">
            <div class="row mb-5">
              <?php  
              $nomor = 0;
              $data = $this->muser->tampil_data_gambar($nomor,2);

              if (count($data->result())>0) {
                foreach ($data->result() as $key => $value) { 
                  $keterangan = json_decode($value->keterangan);
                  ?>
              <div class="col-md-6 col-lg-3 mb-4 mb-lg-4">
                <div class="h-entry">
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><img src="<?=base_url($keterangan->img)?>" alt="Image" class="img-fluid"></a>

                  <center><div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div>
                  <p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs</p>
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><button type="button"  class="btn btn-warning btn-md text-white"> Detail </button></a></center>
                </div> 
              </div> 
                <?php }
              }
              ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-pagination text-center">
                  <?php  
                    $jumlah = $this->muser->jumlah_halaman(count($kartu_nama->result()));
                    $ii = 0;
                    for ($i=1; $i <= $jumlah ; $i++) { ?> 
                  <span style="cursor: pointer;" onclick="tukar_halaman(<?=$ii?>,2)"><?=$i?></span>
                    <?php $ii+=12;}
                  ?>                 
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 tabcontent" id="spanduk">
            <div class="row mb-5">
              <?php  
              $nomor = 0;
              $data = $this->muser->tampil_data_gambar($nomor,3);

              if (count($data->result())>0) {
                foreach ($data->result() as $key => $value) { 
                  $keterangan = json_decode($value->keterangan);
                  ?>
              <div class="col-md-6 col-lg-3 mb-4 mb-lg-4">
                <div class="h-entry">
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><img src="<?=base_url($keterangan->img)?>" alt="Image" class="img-fluid"></a>

                  <center><div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div>
                  <p>Harga : Rp. <?=number_format($keterangan->harga)?> / pcs</p>
                  <a href="<?=base_url()?>user/detail/<?=$value->no?>"><button type="button"  class="btn btn-warning btn-md text-white"> Detail </button></a></center>
                </div> 
              </div> 
                <?php }
              }
              ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-pagination text-center">
                  <?php  
                    $jumlah = $this->muser->jumlah_halaman(count($spanduk->result()));
                    $ii = 0;
                    for ($i=1; $i <= $jumlah ; $i++) { ?> 
                  <span style="cursor: pointer;" onclick="tukar_halaman(<?=$ii?>,3)"><?=$i?></span>
                    <?php $ii+=12;}
                  ?>                 
                </div>
              </div>
            </div>
          </div>

          

        </div>
      </div>
    </section>