    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            <?php foreach ($user->result() as $key => $value); ?>

            <form class="p-5 bg-white" method="post">
              
              <h2 class="h4 text-black mb-3">Detail Pembeli</h2>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Nama</label> 
                  <input type="text" class="form-control" name="nama" value="<?=$value->nama?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" class="form-control" name="email" value="<?=$value->email?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">No Telepon</label> 
                  <input type="text" class="form-control" minlength="11" maxlength="13" name="no_telpon" value="<?=$value->no_telpon?>" id='no_telpon'>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Alamat</label> 
                  <textarea cols="30" rows="7" class="form-control" name="alamat" style="resize: none"><?=$value->alamat?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12" style="text-align: center;">
                  <input type="submit"  class="btn btn-warning btn-md text-white" style="font-weight: bold;" name="edit" value="Ganti Maklumat Diri"> &nbsp &nbsp <a href="<?=base_url()?>user/user/"><button type="button"  class="btn btn-primary btn-md text-white" style="font-weight: bold;">Kembali</button></a>
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            <div class="p-5 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Info</h3>
              <p style="text-align: justify;">Berikut Merupakan Maklumat Yang Anda Berikan. Isikan Semua Form Kemudian Menekan Tombol <b>"Ganti Maklumat Diri"</b> Untuk Menyimpan Maklumat Diri Anda Yang Baru</p>
            </div>

          </div>
        </div>
      </div>
    </div>