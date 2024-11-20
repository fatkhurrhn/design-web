    <section class="site-section">
      <div class="container">
        <div class="row">
          <?php  
            foreach ($data_pembelian->result() as $key => $value) ;
            $ket_pembelian = json_decode($value->ket);
            if ($value->waktu_penerimaan != null) {
              $date=DateTime::createFromFormat('Y-m-d H:i:s', $value->waktu_penerimaan );
              $tanggal_penerimaan=$date->format('d-m-Y');

              if ($date->format('H') > 12) {
                $jam = number_format($date->format('H')) -12;
                $jam_penerimaan = $date->format($jam.':i').' PM';
              }else{
                 $jam_penerimaan = $date->format('H:i').' AM';
              }
            }
                        
            $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
            foreach ($cekkategori->result() as $key2 => $value2) ;
            $kategori = $value2->nama;
            $cek_status = $this->muser->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
            foreach ($cek_status->result() as $key3 => $value3) ;
            $status = $value3->ket_user;
            if ($value->kategori == 1) {
              if ($ket_pembelian->undangan == 1) {
                $kategori = $kategori . ' Aqiqah';
              }elseif ($ket_pembelian->undangan == 2) {
                $kategori = $kategori . ' Nikah';
              }
            }else{
              $kategori = $kategori;
            }
          ?>
          <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
              <div class="h-entry">
                <center>
                  <a class="example-image-link" href="<?=base_url()?>images/pembelian/foto_desain_selesai/<?=$this->uri->segment(3)?>.jpg" data-lightbox="example-set" ><img class="example-image" src="<?=base_url()?>images/pembelian/foto_desain_selesai/<?=$this->uri->segment(3)?>.jpg" width="240px" height="240px" alt=""/></a>
                  <div class="meta mb-4"><span class="mx-2"></span><b></b> Pesanan / <?=$value->waktu_pembelian?> &bullet;<span class="mx-2">&bullet;</span><br><b>Kategori</b> : <b><i><?=$kategori?></i></b> <br><b>Status</b> : <b><i><?=$status?></i></b></div>
                </center>
              </div> 
            </div>
          </div> 
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2 class="h4 text-black mb-3">Form Pembayaran</h2> 

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="email">No Rekening Toko</label> 
                <input type="Text" id="email" class="form-control" value="784513542" disabled="">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="email">Bank Rekening</label> 
                <input type="Text" id="email" class="form-control" value="BNI" disabled="">
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Nama Rekening Toko</label> 
                <input type="Text" id="email" class="form-control" value="Kicap Karan" disabled="">
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Harga Desain</label>
                <?php if ($value->kategori != 3): ?>
                <input type="Text" id="email" class="form-control" value="Rp. <?=number_format($ket_pembelian->jenis_kertas)?> / 1 pcs" disabled=""> 
                <?php endif ?> 
                <?php if ($value->kategori == 3): ?>
                <input type="text" id="email" class="form-control" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500))?> / 1 pcs" disabled="">   
                <?php endif ?>
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Harga Cetak</label> 
                <?php if ($value->kategori == 3): ?>
                <input type="Text" id="email" class="form-control" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500))?> / <?=$ket_pembelian->jumlah_kertas?> pcs" disabled=""> 
                <?php endif ?>
                <?php if ($value->kategori != 3): ?>
                <input type="Text" id="email" class="form-control" value="Rp. <?=number_format(($ket_pembelian->jenis_kertas) * $ket_pembelian->jumlah_kertas)?> / <?=$ket_pembelian->jumlah_kertas?> pcs" disabled="">   
                <?php endif ?>
                
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Kode Unik</label> 
                <input type="Text" id="email" class="form-control" value="Rp. <?=substr($data_pembeli['no_telpon'], -3)?>" disabled="">
              </div>
            </div>

             <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Total Harga</label>
                <?php if ($value->kategori == 3): ?>
                <input type="Text" id="email" class="form-control" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500) + substr($data_pembeli['no_telpon'], -3))?>" disabled="">   
                <?php endif ?> 
                <?php if ($value->kategori != 3): ?>
                <input type="Text" id="email" class="form-control" value="Rp. <?=number_format(($ket_pembelian->jenis_kertas) * $ket_pembelian->jumlah_kertas + substr($data_pembeli['no_telpon'], -3))?>" disabled="">  
                <?php endif ?>
                
              </div>
            </div>

          </div>

          <?php if ($value->id_transaksi ==  7 or $value->id_transaksi == 8): ?>
          <div class="col-md-5">
            <?php if ($value->id_transaksi == 8): 
              foreach ($data_foto->result() as $key9 => $value9) ;
              $ket_foto = json_decode($value9->foto_pengembalian);
              $foto_pengembalian  = $ket_foto->foto;
              
            ?>
            <h2 class="h4 text-black mb-5" onclick="myFunction()" style="cursor: pointer;">Foto Bukti Kerusakan</h2> 
            <div class="row form-group" id="myDIV" style="display: none;">
              <div class="col-md-12" style="text-align: center;">
                <?php $i =1; foreach ($foto_pengembalian as $key8 => $value8): 
                  if ($i == 1) {
                    $style = "";
                  }else{
                    $style = 'style="display: none"';
                  }
                ?>
                <a <?=$style?>  class="example-image-link" href="<?=base_url($value8->img)?>" data-lightbox="example-set" ><img class="example-image" src="<?=base_url($value8->img)?>" width="20%" alt=""/></a>
                <?php $i++; endforeach ?>
              </div>
            </div> 
           
            
            <?php endif ?>
            


            <form class="p-5 bg-white" enctype="multipart/form-data" method="post">
              <?php if ($value->id_transaksi == 8): ?>
              <h2 class="h4 text-black mb-5">Upload Kembali Bukti Kerusakan</h2>   
              <?php endif ?>
              <?php if ($value->id_transaksi == 7): ?>
              <h2 class="h4 text-black mb-5">Upload Bukti Kerusakan</h2> 
              <?php endif ?>
              
              <div id="ubah_sini"></div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Upload Foto Kerusakan</label> 
                  <input type="file" name="my_file[]" multiple class="form-control" id="imagesource" onchange="previewImage();" required="">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Jumlah Desain Yang Rusak</label>
                  <input type="hidden" name="id_pembelian" value="<?=$this->uri->segment(3)?>">
                  <?php if ($value->id_transaksi == 8): ?>
                  <input type="Text" id="jumlah" class="form-control" name="jumlah" required="" value="<?=$ket_foto->jumlah_rusak?>">  
                  <?php endif ?>
                  <?php if ($value->id_transaksi == 7): ?>
                  <input type="Text" id="jumlah" class="form-control" name="jumlah" required="">  
                  <?php endif ?>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Keterangan Kerusakan</label> 
                  <?php if ($value->id_transaksi == 8): ?>
                  <textarea name="keterangan" id="keterangan" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Kerusakan"  required=""><?=$ket_foto->keterangan?></textarea>  
                  <?php endif ?>
                  <?php if ($value->id_transaksi == 7): ?>
                  <textarea name="keterangan" id="keterangan" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Kerusakan"  required=""></textarea>  
                  <?php endif ?>
                  
                </div>
              </div>
              <input type="submit" value="Kirim Bukti Pengembalian" class="btn btn-primary btn-md text-white" name="prosesdulu">
            </form>

            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Info Penting Pengembalian Desain</h3>
              <p style="text-align: justify;">Pengembalian Hanya Bisa Dilakukan Sebelum Waktu Lebih Dari 6 Jam Penerimaan. Lewat Dari 6 Jam Maka Dikira Telah Menerima Pesanan Dengan Ikhlas</p>
            </div>
          </div>  
          <?php endif ?>

          <?php if ($value->id_transaksi ==  9): ?>
          <div class="col-md-5">
            <h2 class="h4 text-black mb-3">Pesanan Pengembalian Sedang Dicetak</h2>  
            <p style="text-align: justify;">Proses Pengesahan Pengembalian Diterima. Sekarang Tim Kami Dalam Proses Mencetak Pesanan Pengembalian Yang Diajukan Oleh Anda. Mohon Bersabar<br><br>

            <i>Terima Kasih telah berbelanja di Website kami</i></p></p>
            <div class="form-group" style="text-align: center;">
              <a href="<?=base_url()?>user/pengembalian"><button type="button" class="btn btn-primary btn-md text-white" ><b>Kembali Ke Halaman <i>Pengembalian</i></b></button></a>
            </div>
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi ==  10): ?>
          <div class="col-md-5">
            <h2 class="h4 text-black mb-3">Pesanan Gantian Dapat Diambil</h2>  
            <p style="text-align: justify;">Pesanan Gantian Anda Dapat Diambil Ditoko Kami. Jika Telah Menerima Pesanan. Mohon Menekan Tombol <i><b>"Pesanan Gantian Diterima"</b></i>. Mohon Maaf Atas Kesalahannya<br><br>

            <i>Terima Kasih telah berbelanja di Website kami</i></p></p>
            <div class="form-group" style="text-align: center;">
              <a href="<?=base_url()?>user/pengembalian/pesanan_diterima/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-success btn-md text-white" ><b>Pesanan Gantian <i>Diterima</i></b></button></a><br><br>
              <a href="<?=base_url()?>user/pengembalian"><button type="button" class="btn btn-primary btn-md text-white" ><b>Kembali Ke Halaman <i>Pengembalian</i></b></button></a>
            </div>
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi ==  11): ?>
          <div class="col-md-5">
            <h2 class="h4 text-black mb-3">Pesanan Gantian Telah Diterima</h2>  
            <p style="text-align: justify;">Pihak Kami Hanya Menyediakan Satu Kali Saja Pengembalian Untuk Semua Pelanggan. Jika Masih Ada Kerusakan, Kami Mohon Maaf Atas Kesalahannya<br><br>

            <i>Terima Kasih telah berbelanja di Website kami</i></p></p>
            <div class="form-group" style="text-align: center;">
              <a href="<?=base_url()?>user/pengembalian"><button type="button" class="btn btn-primary btn-md text-white" ><b>Kembali Ke Halaman <i>Pengembalian</i></b></button></a>
            </div>
          </div>
          <?php endif ?>
          

        </div>
      </div>
    </section>

