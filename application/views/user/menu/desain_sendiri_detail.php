    <section class="site-section">
      <?php  
        $kategori = $this->uri->segment(4);
        $undangan = $this->uri->segment(5);
        if ($kategori == 1) {
          if ($undangan == 1) {
            $kategori1 = 'Undangan Aqiqah';
          }elseif ($undangan == 2) {
            $kategori1 = 'Undangan Nikah';
          }
        }elseif ($kategori == 2) {
          $kategori1 = 'Kartu Nama';
        }elseif($kategori == 3){
          $kategori1 = 'Spanduk';
        }
      ?>
      <div class="container">
        <div class="row">
          <form class="col-md-7 mb-5" id="ini_formnya">
            <div class="p-4 bg-white">
              <h2 class="h4 text-black mb-3">Form Pembelian (<i><?=$kategori1?></i>)</h2>
              <?php  
                if ($kategori == 1) {?>
                  <?php if ($undangan == 1): ?>
                    <input type="hidden" name="undangan" value="1">
                  <?php elseif ($undangan == 2): ?>
                    <input type="hidden" name="undangan" value="2">
                  <?php endif ?>
                  <?php
                }
              ?>
               
              <div class="row form-group">
                <div class="col-md-12">
                  <div id="ubah_sini"></div>
                  <label class="text-black" for="email">Upload Foto</label> 
                  <input class="form-control"  type="file" id='files' name="files"onchange="previewImage();" >
                </div>
              </div> 
              
              <?php  
                if ($kategori != 3) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Jenis Kertas</label> 
                      <select class="form-control" name="jenis_kertas" id="jenis_kertas" required>
                        <option selected="" value="" disabled="">-Silahkan Pilih Jenis Kertas</option>
                          <?php  
                            if ($kategori == 1) { ?>
                              <option value="4000">Art Paper | Rp. 4,000 / 1 pcs</option>
                              <option value="3000">Jasmine | Rp. 3,000 / 1 pcs</option>
                              <option value="1000">Cartoon | Rp. 1,000 / 1 pcs</option>      
                            <?php }elseif ($kategori == 2) { ?>
                              <option value="25000">PVC | Rp. 25,000 / 1 pcs</option>
                              <option value="1000">Photopaper | Rp. 1,000 / 1 pcs</option>
                              <option value="500">Cartoon | Rp. 500 / 1 pcs</option>      
                            <?php }
                          ?>
                        
                      </select>
                    </div>
                  </div>    
                      <?php
                    }elseif ($kategori == 3) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Jenis Kertas</label> 
                      <input type="text" name="" disabled="" value="Vinyl" class="form-control">
                    </div>
                  </div>    
                  <?php
                }
              ?>
              

              <?php  
                if ($kategori == 1) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Panjang X Lebar</label> 
                      <input type="text" name="panjangxlebar" value="15.3 cm X 20.3 cm"  class="form-control" disabled="">
                    </div>
                  </div>    
                      <?php
                }elseif($kategori == 3){ ?>
                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Panjang</label>
                      <input type="text" name="panjang" placeholder="Isikan Panjang Kertas | Ukuran Meter" title="Cth : 2 (2 meter panjang) / 2.5 (2.5 meter panjang)" class="form-control" required="" id="panjang" minlength="1" maxlength="2">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="fname">Lebar</label>
                      <input type="text" name="lebar" placeholder="Isikan Lebar Kertas | Ukuran Meter" title="Cth : 2 (2 meter lebar) / 2.5 (2.5 meter lebar)" class="form-control" required="" id="lebar" minlength="1" maxlength="2">
                    </div>
                    <div class="col-md-12">
                      <p style="font-style: 3px;"><i>Keterangan : Panjang X Lebar Permeter = <b>Rp . 25,000</b></i></p>
                    </div>
                  </div>
                      <?php
                }elseif ($kategori == 2) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Panjang X Lebar</label> 
                      <input type="text" name="panjangxlebar" value="5.3 cm X 8.8 cm"  class="form-control" disabled="">
                    </div>
                  </div>      
                  <?php
                }
              ?>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Jumlah</label> 
                  <input type="text" name="jumlah_kertas" class="form-control" minlength="1" maxlength="3" required="" id="jumlah_kertas">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Harga</label> 
                  <input type="Text" class="form-control" id="jumlah_harga" value="-Pilih Jenis Kertas Dan Isi Jumlah Kertas" disabled="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Alamat Pengiriman</label>
                  <input type="text" class="form-control" name="alamat" required="" value="<?=$data_pembeli['alamat']?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black">Deadline Pembuatan</label>
                  <select class="form-control" name="deadline" required="">
                    <option value="" selected="" disabled="">-Pilih Deadline Pembuatan</option>
                    <option value="3"> 3 Hari</option>
                    <option value="4"> 4 Hari</option>
                    <option value="5"> 5 Hari</option>
                    <option value="6"> 6 Hari</option>
                    <option value="7"> 7 Hari</option>
                  </select>
                </div>
              </div>

              
            </div>

            <div class="p-4 bg-white">
              <!-- <h2 class="h4 text-black mb-3">Form Pengisian Informasi Desain</h2> 
              <div id="ubah_sini"></div> -->
              

              <?php  
                $undangan = $this->uri->segment(5);
                if ($undangan == 2) { ?>
                  <div style="display: none;">
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Pertama</label>
                        <input type="text" name="nama_pertama" placeholder="Isi Nama Mempelai Pertama" title="Isi Nama Pengantin Pertama" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_nama_pertama" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Pertama / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Kedua</label>
                        <input type="text" name="nama_kedua" placeholder="Isi Nama Mempelai Kedua" title="Isi Nama Pengantin Kedua" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_nama_kedua" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Kedua / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="text" name="tanggal" title="tanggal pernikahan berlangsung" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Akad</label> 
                        <input type="text" name="akad" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya akad nikah" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Resepsi</label> 
                        <input type="text" name="resepsi" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya resepsi pernikahan" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Pertama</label>
                        <input type="text" name="nama_ortu_pertama" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Pertama" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu_pertama" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Pertama / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Kedua</label>
                        <input type="text" name="nama_ortu_kedua" placeholder="Isi Nama Orang Tua Kedua" title="Isi Nama Orang Tua Kedua" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu_kedua" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Kedua / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Desain" title="Keterangan yang ingin ditambah pada desain" required="">-</textarea>
                      </div>
                    </div>   
                  </div> 
                <?php  
                }elseif ($undangan == 1) { ?>
                  <div style="display: none">
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Anak</label>
                        <input type="text" name="nama_anak" placeholder="Isi Nama Anak" title="Isi Nama Anak" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_anak" placeholder="cth : nama panggilan / anak keberapa , dll" title="Keterangan Untuk Anak / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="text" name="tanggal" placeholder="Tanggal Aqiqah Berlangsung" title="Tanggal Aqiqah Berlangsung" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Waktu</label>
                        <input type="text" name="waktu" placeholder="Waktu Berlangsung Aqiqag" title="Waktu Berlangsung Aqiqah" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Tempat</label>
                        <input type="text" name="tempat" placeholder="cth : rumah , dll" title="Tempat Berlangsung Aqiqah" class="form-control" required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" placeholder="Isi Nama Orang Tua " title="Isi Nama Orang Tua Kedua" class="form-control" required="" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua/ Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" value="-">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Desain" title="Keterangan yang ingin ditambah pada desain " required="">-</textarea>
                      </div>
                    </div>    
                  </div>
                  <?php
                }elseif ($kategori == 2) { ?>
                  <div style="display: none;">
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control"  required="" minlength="11" maxlength="13" id="no_telpon" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Pekerjaan</label> 
                        <input type="text" name="pekerjaan" placeholder="Isikan Pekerjaan | Bisa Dikosongkan" title="Isikan Pekerjaan | Bisa Dikosongkan" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Media Sosial</label> 
                        <input type="text" name="media_sosial" placeholder="Cth Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Media SOsial | Bisa Dikosongkan" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Desain" title="Keterangan yang ingin ditambah pada desain" required="">-</textarea>
                      </div>
                    </div>    
                  </div>
                  <?php
                }elseif ($kategori == 3) { ?>
                  <div style="display: none">
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tema</label> 
                        <input type="text" name="tema" placeholder="Isikan Tema Spanduk" title="Isikan Tema Spanduk" class="form-control"  required="" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="date" name="tanggal"  title="Isikan Tanggal | Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Waktu</label> 
                        <input type="time" name="waktu"  title="Isikan Waktu | Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control" value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Email / Media Sosial</label> 
                        <input type="text" name="media_sosial" placeholder="Cth Email,Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Email / Media Sosial | Bisa Dikosongkan" class="form-control"  value="-">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Desain" title="Keterangan yang ingin ditambah pada desain" required="">-</textarea>
                      </div>
                    </div>
                  </div>    
                  <?php
                }
              ?>

             <div class="row form-group">
                <div class="col-md-12">
                  <center>
                    <!-- <input type="submit" value="Pesan" class="btn btn-primary btn-md text-white" name="pesan" style="font-weight: bolder;"> -->
                    <button type="button" onclick="proses()" class="btn btn-primary btn-md text-white">Pesan</button>
                  </center>
                </div>
              </div>
            </div>
          </form>

          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Informasi</h2> 
              <p style="text-align: justify;">&emsp; Halaman ini khusus untuk mereka yang ingin membuat sendiri desain mereka. Pada <b>"Form Pembelian"</b>, pembeli akan mengisi informasi pembelian desain yang mencakup jenis kertas, panjang dan lebar kertas, jumlah kertas, serta alamat pengiriman. <br> &emsp; Pada <b>"Form Pengisian Informasi Desain",</b> pembeli akan mengisi desain yang ingin dibuat oleh tim kami sesuai keinginan pembeli. Anda bisa mengupload sehingga 5 foto pada <b>"Upload Foto Desain"</b> untuk kami masukkan pada desain anda. Usahakan beri penamaan foto yang mudah dimengerti tim kami agar tim kami bisa mendesain sesuai keinginan anda. Pada input <b>"Penambahan Keterangan"</b>, jelaskan dengan terperinci desain yang anda inginkan agar tim kami bisa mengerti<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>  
          </div>
        </div>
      </div>
    </section>