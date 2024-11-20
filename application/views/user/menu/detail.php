    <section class="site-section">
      <div class="container">
        <div class="row">
          <?php foreach ($data->result() as $key => $value);
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
          <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
              <div class="h-entry">
                <center><img src="<?=base_url($ket->img)?>" alt="Image" class="img-fluid">
                <!-- <h2 class="font-size-regular"><a href="#">Warehousing Your Packages</a></h2> -->
                <div class="meta mb-4"><span class="mx-2"></span><b><?=$kategori?></b> / Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div></center>
              </div> 
            </div>
          </div> 
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">
            <form method="post" class="p-4 bg-white">
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Harga</label> 
                  <input type="text" id="email" class="form-control" value="Rp. <?=number_format($ket->harga)?> / pcs" disabled="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Jenis Kertas</label> 
                  <?php if ($value->kategori !=3): ?>
                  <select class="form-control">
                    <?php  
                        if ($value->kategori == 1) { ?>
                    <option value="4000">Art Paper | Rp. 4,000 / 1 pcs</option>
                    <option value="3000">Jasmine | Rp. 3,000 / 1 pcs</option>
                    <option value="1000">Cartoon | Rp. 1,000 / 1 pcs</option>      
                        <?php }elseif ($value->kategori == 2) { ?>
                    <option value="25000">PVC | Rp. 25,000 / 1 pcs</option>
                    <option value="3000">Photopaper | Rp. 1,000 / 1 pcs</option>
                    <option value="1000">Cartoon | Rp. 500 / 1 pcs</option>      
                        <?php }
                      ?>
                  </select> 
                  <?php endif ?>
                  <?php if ($value->kategori == 3): ?>
                  <input type="text" class="form-control" value="Vinyl" disabled="">  
                  <?php endif ?>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Panjang X Lebar</label> 
                  <?php  
                    if ($value->kategori == 1) { ?>
                  <input type="text" value="15.3 cm X 20.3 cm" class="form-control" title="15.3 cm X 20.3 cm" disabled="">   
                      <?php
                    }elseif ($value->kategori == 3){ ?>
                  <input type="text" value="1m x 1m = Rp. 25,000" class="form-control" title="1m x 1m = Rp. 25,000" disabled="">
                      <?php
                    }elseif($value->kategori == 2){ ?>
                  <input type="text" value="5.3 cm X 8.8 cm" class="form-control" title="5.3 cm X 8.8 cm" disabled="">
                      <?php
                    }
                  ?>
                  
                </div>
              </div>
              <center><a href="<?=base_url()?>user/"><button type="button" class="btn btn-warning btn-md text-white"><b>Kembali</b></button></a> &nbsp &nbsp<a href="<?=base_url()?>user/beli/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-info btn-md text-white"><b>Beli</b></button></a></center>
            </form>
          </div>

          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <?php if (count($komentar->result()) > 0): ?>
                <h2 class="h4 text-black mb-5">Komentar</h2> 
                <?php  
                  foreach ($komentar->result() as $key => $value) ;
                  $komen = json_decode($value->komen);
                  foreach ($komen as $key1 => $value1) { 
                    $cari_data_user = $this->muser->tampil_data_where('tb_pembeli',array('id' => $value1->id_pembeli));
                    foreach ($cari_data_user->result() as $key2 => $value2) ;
                    // print_r($value1);
                    ?>
                    <p class="mb-0 font-weight-bold"><?=$value2->nama?></p>
                    <p class="mb-4"><?=$value1->komen?></p>
                    <hr>
                    <?php
                  }
                ?>
              <?php else: ?>
                <h2 class="h4 text-black mb-5">Belum Ada Komentar</h2> 
              <?php endif ?>
            </div>


            <?php if (count($komentar->result()) > 0): ?>
              <div class="row">
                <div class="col-11">
                  <div class="custom-pagination text-center">
                    <span>1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <span class="more-page">...</span>
                    <a href="#">10</a>
                  </div>
                </div>
              </div>
            <?php else: ?>

            <?php endif ?>
            
            
            

          </div>
        </div>
      </div>
    </section>