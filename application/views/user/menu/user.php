    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            <?php foreach ($user->result() as $key => $value); ?>

            <form action="#" class="p-5 bg-white">
              
              <h2 class="h4 text-black mb-3">Detail Pembeli</h2>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Nama</label> 
                  <input type="text" class="form-control" disabled="" value="<?=$value->nama?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" class="form-control" disabled="" value="<?=$value->email?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">No Telepon</label> 
                  <input type="text" class="form-control" disabled="" value="<?=$value->no_telpon?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Alamat</label> 
                  <textarea cols="30" rows="7" class="form-control" disabled="" style="resize: none"><?=$value->alamat?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12" style="text-align: center;">
                  <a href="<?=base_url()?>user/user/edit"><button type="button"  class="btn btn-warning btn-md text-white" style="font-weight: bold;">Edit Profile</button></a> &nbsp &nbsp <a href="<?=base_url()?>user/"><button type="button"  class="btn btn-primary btn-md text-white" style="font-weight: bold;">Kembali</button></a>
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            <div class="p-5 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Info</h3>
              <p style="text-align: justify;">Berikut Merupakan Maklumat Yang Anda Berikan. Anda Bisa Mengganti Maklumat Peribadi Anda Dengan Menekan Tombol Edit Profile</p>
            </div>

          </div>
        </div>
      </div>
    </div>