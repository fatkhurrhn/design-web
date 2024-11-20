    <section class="site-section">

      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">
            <form method="post" class="p-4 bg-white">
              <h2 class="h4 text-black mb-3">Pilih Kategori</h2> 
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Kategori</label> 
                  <select class="form-control" name="kategori" onchange="changeKategori()" id="kategori" required="">
                    <option selected="" disabled="" value="">-Pilih Kategori</option>
                    <option value="1">Undangan</option>
                    <option value="2">Kartu Nama</option>
                    <option value="3">Spanduk</option>      
                  </select> 
                </div>
              </div>
              <div class="row form-group" id="jenis_undangan" style="display: none">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Jenis Undangan</label> 
                  <select class="form-control" name="undangan" id="undangan">
                    <option selected="" disabled="" value="">-Pilih Jenis Undangan</option>
                    <option value="1">Undangan Aqiqah</option>
                    <option value="2">Undangan Nikah</option>
                  </select>    
                </div>
              </div>
              <center><a href="<?=base_url()?>user/"><button type="button" class="btn btn-warning btn-md text-white"><b>Kembali</b></button></a> &nbsp &nbsp<input type="submit" value="Lanjut" name="lanjut" class="btn btn-info btn-md text-white" style="font-weight: bold;"></center>
            </form>
          </div>

          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Informasi</h2> 
              <p style="text-align: justify;">Halaman ini khusus untuk mereka yang ingin membuat sendiri desain mereka. Pada tampilan sebelah kiri terdapat pemilihan <b>"Kategori"</b> . Selepas pembeli memilih kategori dan menekan tombol <b>"Lanjut"</b>, sistem akan membawa pembeli ke halaman desain dimana pembeli akan mengupload foto-foto yang ingin dimasukkan ke dalam desain serta mengisi beberapa form untuk tim kami mengerti proses pembuatan desain yang diinginkan oleh pembeli <br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>  
          </div>
        </div>
      </div>
    </section>