    <section class="site-section">
      <div class="container">
        <div class="row">
          <?php foreach ($data->result() as $key => $value);
            $ket = json_decode($value->keterangan);
          ?>
          <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
              <div class="h-entry">
                <center><img src="<?=base_url($ket->img)?>" alt="Image" class="img-fluid">
                <!-- <h2 class="font-size-regular"><a href="#">Warehousing Your Packages</a></h2> -->
                <div class="meta mb-4"><span class="mx-2"></span>Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> </div></center>
                

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="email">Harga</label> 
                    <input type="text" id="email" class="form-control" value="Rp. <?=number_format($ket->harga)?> / pcs" disabled="">
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="subject">Kertas</label> 
                    <select class="form-control">
                      <option>Art Paper</option>
                      <option>Jasmin</option>
                      <option>Cartoon</option>
                    </select>
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="subject">Panjang X Lebar</label> 
                    <select class="form-control">
                      <option>Panjang X Lebar 1</option>
                      <option>Panjang X Lebar 2</option>
                      <option>Panjang X Lebar 3</option>
                    </select>
                  </div>
                </div>
                <center><a href="<?=base_url()?>home/project"><button type="button" class="btn btn-warning btn-md text-white"><b>Kembali</b></button></a></center>

              </div> 
            </div>
             
            
          </div> 

          

        </div>
      </div>
    </section>