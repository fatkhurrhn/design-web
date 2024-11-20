    <section class="site-section">
      <div class="container">
        <div class="row">
          <?php foreach ($data->result() as $key => $value);
            $data_pembeli = $this->session->userdata('pembeli');
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
                <div class="meta mb-4"><span class="mx-2"></span><b><?=$kategori?></b> / Upload &bullet; <?=$value->tanggal_upload?><span class="mx-2">&bullet;</span> <br><b>Harga Per Desain</b> : Rp. <?=number_format($ket->harga)?></div></center>
              </div> 
            </div>
          </div> 
        </div>
      </div>

      <div class="container">
        <div class="row">
          <form class="col-md-8 mb-5" id="ini_formnya" method="post">
            <div class="p-4 bg-white">
              <h2 class="h4 text-black mb-3">Form Pembelian</h2>
              <div class="row form-group">
                <div class="col-md-12">
                  <div id="ubah_sini"></div>
                  <label class="text-black" for="email">Upload Foto</label> 
                  <input class="form-control"  type="file" id='files' name="files[]"onchange="previewImage();" multiple>
                </div>
              </div> 
              
              <?php  
                if ($value->kategori != 3) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Jenis Kertas</label> 
                      <select class="form-control" name="jenis_kertas" id="jenis_kertas" required>
                        <option selected="" value="" disabled="">-Silahkan Pilih Jenis Kertas</option>
                          <?php  
                            if ($value->kategori == 1) { ?>
                        <option value="4000">Art Paper | Rp. 4,000 / 1 pcs</option>
                        <option value="3000">Jasmine | Rp. 3,000 / 1 pcs</option>
                        <option value="1000">Cartoon | Rp. 1,000 / 1 pcs</option>      
                            <?php }elseif ($value->kategori == 2) { ?>
                        <option value="25000">PVC | Rp. 25,000 / 1 pcs</option>
                        <option value="1000">Photopaper | Rp. 1,000 / 1 pcs</option>
                        <option value="500">Cartoon | Rp. 500 / 1 pcs</option>      
                            <?php }
                          ?>
                        
                      </select>
                    </div>
                  </div>    
                      <?php
                    }elseif ($value->kategori == 3) { ?>
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
                if ($value->kategori == 1) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Panjang X Lebar</label> 
                      <input type="text" name="panjangxlebar" value="15.3 cm X 20.3 cm"  class="form-control" disabled="">
                    </div>
                  </div>    
                      <?php
                }elseif($value->kategori == 3){ ?>
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
                }elseif ($value->kategori == 2) { ?>
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
              <h2 class="h4 text-black mb-3">Form Pengisian Informasi Desain</h2> 
              <?php  
                if ($kategori == 'Undangan Nikah') { ?>
                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Pertama</label>
                      <input type="text" name="nama_pertama" placeholder="Isi Nama Mempelai Pertama" title="Isi Nama Pengantin Pertama" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_nama_pertama" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Pertama / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Kedua</label>
                      <input type="text" name="nama_kedua" placeholder="Isi Nama Mempelai Kedua" title="Isi Nama Pengantin Kedua" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_nama_kedua" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Kedua / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Tanggal</label> 
                      <input type="date" name="tanggal" title="tanggal pernikahan berlangsung" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Akad</label> 
                      <input type="text" name="akad" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya akad nikah" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Resepsi</label> 
                      <input type="text" name="resepsi" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya resepsi pernikahan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Orang Tua Pertama</label>
                      <input type="text" name="nama_ortu_pertama" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Pertama" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_ortu_pertama" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Pertama / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Orang Tua Kedua</label>
                      <input type="text" name="nama_ortu_kedua" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_ortu_kedua" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Kedua / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                      <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div> 

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message">Penambahan Keterangan</label> 
                      <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan"></textarea>
                    </div>
                  </div>    
                  <?php  
                }elseif ($kategori == 'Undangan Aqiqah') { ?>
                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Anak</label>
                      <input type="text" name="nama_anak" placeholder="Isi Nama Anak" title="Isi Nama Anak" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_anak" placeholder="cth : nama panggilan / anak keberapa , dll" title="Keterangan Untuk Anak / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Tanggal</label> 
                      <input type="date" name="tanggal" placeholder="Tanggal Aqiqah Berlangsung" title="Tanggal Aqiqah Berlangsung" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Waktu</label>
                      <input type="time" name="waktu" placeholder="Waktu Berlangsung Aqiqag" title="Waktu Berlangsung Aqiqah" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Tempat</label>
                      <input type="text" name="tempat" placeholder="cth : rumah , dll" title="Tempat Berlangsung Aqiqah" class="form-control" required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Orang Tua</label>
                      <input type="text" name="nama_ortu" placeholder="Isi Nama Orang Tua " title="Isi Nama Orang Tua Kedua" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_ortu" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua/ Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                      <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="lname">Keterangan</label>
                      <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control">
                    </div>
                  </div> 

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message">Penambahan Keterangan</label> 
                      <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan"></textarea>
                    </div>
                  </div>    
                  <?php
                }elseif ($kategori == 'Kartu Nama') { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Nama</label> 
                      <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">No Telepon</label> 
                      <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control"  required="" minlength="11" maxlength="13" id="no_telpon">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Pekerjaan</label> 
                      <input type="text" name="pekerjaan" placeholder="Isikan Pekerjaan | Bisa Dikosongkan" title="Isikan Pekerjaan | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Alamat</label> 
                      <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Media Sosial</label> 
                      <input type="text" name="media_sosial" placeholder="Cth Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Media SOsial | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message">Penambahan Keterangan</label> 
                      <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan"></textarea>
                    </div>
                  </div>    
                  <?php
                }elseif ($kategori == 'Spanduk') { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Nama</label> 
                      <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Tema</label> 
                      <input type="text" name="tema" placeholder="Isikan Tema Spanduk" title="Isikan Tema Spanduk" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Tanggal</label> 
                      <input type="date" name="tanggal"  title="Isikan Tanggal | Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Waktu</label> 
                      <input type="time" name="waktu"  title="Isikan Waktu | Bisa Dikosongkan" class="form-control">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Alamat</label> 
                      <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">No Telepon</label> 
                      <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Email / Media Sosial</label> 
                      <input type="text" name="media_sosial" placeholder="Cth Email,Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Email / Media Sosial | Bisa Dikosongkan" class="form-control"  required="">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message">Penambahan Keterangan</label> 
                      <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan"></textarea>
                    </div>
                  </div>    
                  <?php
                }
              ?>

             <div class="row form-group">
                <div class="col-md-12">
                  <center>
                    <!-- <input type="submit" value="Pesan" class="btn btn-primary btn-md text-white" name="pesan"> -->
                    <button type="button" onclick="proses()" class="btn btn-primary btn-md text-white">Pesan</button>
                  </center>
                </div>
              </div>
            </div>
          </form>


          <div class="col-md-4">
            
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

