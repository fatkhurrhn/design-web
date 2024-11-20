    <section class="site-section">
     <div class="container">
        <div class="row">
          <?php  
            foreach ($data_pembelian->result() as $key => $value) ;
            $ket_pembelian = json_decode($value->ket);
            // print_r($ket_pembelian);
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
            
            
            // foreach ($data_produk->result() as $key1 => $value1) ;
            // $ket_produk = json_decode($value1->keterangan);
            $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value->kategori));
            foreach ($cekkategori->result() as $key2 => $value2) ;
            // $kategori = $value2->nama;
            $cek_status = $this->muser->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
            foreach ($cek_status->result() as $key3 => $value3) ;
            $status = $value3->ket_user;
            if ($value2->no == 1) {
              if ($ket_pembelian->undangan == 1) {
                $kategori = $value2->nama . ' Aqiqah';
              }elseif ($ket_pembelian->undangan == 2) {
                $kategori = $value2->nama . ' Nikah';
              }
            }else{
              $kategori = $value2->nama;
            }
            // print_r($value1->kategori);
          ?>
          
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2 class="h4 text-black mb-3">Form Pembayaran</h2> 

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Harga Desain</label>
                <?php if ($value->kategori != 3): ?>
                <input type="Text" class="form-control" value="Rp. <?=number_format(10000)?> " disabled=""> 
                <?php endif ?> 
                <?php if ($value->kategori == 3): ?>
                <input type="text"  class="form-control" value="Rp. <?=number_format(10000)?>" disabled="">   
                <?php endif ?>
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Harga Cetak</label> 
                <?php if ($value->kategori == 3): ?>
               
                <input type="Text"  class="form-control" value="Rp. <?=number_format($ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas )?> / <?=$ket_pembelian->jumlah_kertas?> pcs" disabled=""> 
                <?php endif ?>
                <?php if ($value->kategori != 3): ?>
                
                <input type="Text"  class="form-control" value="Rp. <?=number_format(($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas ) )?> / <?=$ket_pembelian->jumlah_kertas?> pcs" disabled="">   
                <?php endif ?>
                
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Kode Unik</label> 
                <input type="Text"  class="form-control" value="Rp. <?=substr($data_pembeli['no_telpon'], -3)?>" disabled="">
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Total Harga</label>
                <?php if ($value->kategori == 3): ?>
                <input type="Text"  class="form-control" value="Rp. <?=number_format($ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas  + substr($data_pembeli['no_telpon'], -3))?>" disabled="">   
                <?php endif ?> 
                <?php if ($value->kategori != 3): ?>
                <input type="Text"  class="form-control" value="Rp. <?=number_format(($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas ) + substr($data_pembeli['no_telpon'], -3))?>" disabled="">  
                <?php endif ?>
                
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black">Deadline Pembuatan</label>
                <input type="text" class="form-control" value="<?=$value->deadline?> Hari" disabled="">
              </div>
            </div>

            <br><br>
            <form  method="post" id="ini_formnya">
              <h2 class="h4 text-black mb-3">Form Detail Pembelian</h2> 
              <?php  
                if ($value->kategori == 1) {?>
                  <?php if ($ket_pembelian->undangan == 1): ?>
                    <input type="hidden" name="undangan" value="1">
                  <?php elseif ($ket_pembelian->undangan == 2): ?>
                    <input type="hidden" name="undangan" value="2">
                  <?php endif ?>
                  <?php
                }
              ?>
              <?php 
                $dir = 'images/pembelian/foto_upload_user/'.$this->uri->segment(4).'/'; 
                if( is_dir($dir) === true )
                { ?>
                  <div class="row form-group" id="foto_upload_lama">
                    <div class="col-md-12">
                    <?php  
                      $files1 = glob($dir.'*');
                      foreach($files1 as $file){ // iterate files
                        if(is_file($file)) ?>
                        <center> <a class="example-image-link" href="<?=base_url().$file?>" data-lightbox="example-set" ><img class="example-image" src="<?=base_url().$file?>" width="240px" height="240px" alt=""/></a></center>
                        <?php
                      }
                    ?>
                    </div>
                  </div>
                  <div class="row form-group" <?php if ($value->id_transaksi >= 2): ?> style="display: none" <?php endif ?>>
                    <div class="col-md-12">

                      <input type="radio" name="foto_pilih" value="tetap" style="display: inline;" checked="" onclick="klik_foto(1)"><label class="text-black" for="email">Kekalkan Foto</label> &nbsp &nbsp
                      <input type="radio" name="foto_pilih" value="upload_baru" style="display: inline;" onclick="klik_foto(2)"><label class="text-black" for="email">Upload Foto Baru</label> 
                    </div>
                  </div>
                  <?php
                }
              ?>
              <div class="row form-group">
                <div class="col-md-12">
                  <div id="ubah_sini1"></div>
                  <label class="text-black">Upload Foto</label>
                  <input class="form-control"  type="file" id='files' name="files" onchange="previewImage1();"  <?php if ( is_dir($dir) === true): ?>disabled=""<?php endif ?>>
                </div>
              </div>

              <?php  
                if ($value->kategori != 3) { ?>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Jenis Kertas</label> 
                      <select class="form-control" name="jenis_kertas" id="jenis_kertas" required>
                        <option value="" disabled="">-Silahkan Pilih Jenis Kertas</option>
                          <?php  
                            if ($value->kategori == 1) { ?>
                        <option value="4000" <?php if ($ket_pembelian->jenis_kertas == "4000"): ?> selected="" <?php endif ?>>Art Paper | Rp. 4,000 / 1 pcs</option>
                        <option value="3000" <?php if ($ket_pembelian->jenis_kertas == "3000"): ?> selected="" <?php endif ?>>Jasmine | Rp. 3,000 / 1 pcs</option>
                        <option value="1000" <?php if ($ket_pembelian->jenis_kertas == "1000"): ?> selected="" <?php endif ?>>Cartoon | Rp. 1,000 / 1 pcs</option>      
                            <?php }elseif ($value->kategori == 2) { ?>
                        <option value="25000" <?php if ($ket_pembelian->jenis_kertas == "25000"): ?> selected="" <?php endif ?>>PVC | Rp. 25,000 / 1 pcs</option>
                        <option value="1000" <?php if ($ket_pembelian->jenis_kertas == "1000"): ?> selected="" <?php endif ?>>Photopaper | Rp. 1,000 / 1 pcs</option>
                        <option value="500" <?php if ($ket_pembelian->jenis_kertas == "500"): ?> selected="" <?php endif ?>>Cartoon | Rp. 500 / 1 pcs</option>      
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
                }elseif($value->kategori == 3){ 
                  $panjang_nya = str_replace('.', ',',$ket_pembelian->panjang);
                  $lebar_nya = str_replace('.', ',',$ket_pembelian->lebar);
                  ?>
                  <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Panjang</label>
                      <input type="text" name="panjang" placeholder="Isikan Panjang Kertas | Ukuran Meter" title="Cth : 2 (2 meter panjang) / 2.5 (2.5 meter panjang)" class="form-control" required="" id="panjang" minlength="1" maxlength="3" value="<?=$panjang_nya?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="text-black" for="fname">Lebar</label>
                      <input type="text" name="lebar" placeholder="Isikan Lebar Kertas | Ukuran Meter" title="Cth : 2 (2 meter lebar) / 2.5 (2.5 meter lebar)" class="form-control" required="" id="lebar" minlength="1" maxlength="3" value="<?=$lebar_nya?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
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
                  <?php if ($value->id_transaksi >= 2): ?>
                    <input type="text" name="jumlah_kertas" class="form-control" minlength="1" maxlength="3" required="" id="jumlah_kertas" value="<?=$ket_pembelian->jumlah_kertas?>" disabled="">
                  <?php else: ?>
                    <input type="text" name="jumlah_kertas" class="form-control" minlength="1" maxlength="3" required="" id="jumlah_kertas" value="<?=$ket_pembelian->jumlah_kertas?>" >
                  <?php endif ?> 
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
                  <input type="text" class="form-control" name="alamat" required="" value="<?=$ket_pembelian->alamat?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black">Deadline Pembuatan</label>
                  <select class="form-control" name="deadline" required="" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                    <option value="" disabled="">-Pilih Deadline Pembuatan</option>
                    <option value="3" <?php if ($value->deadline == 3): ?>selected=""<?php endif ?>> 3 Hari</option>
                    <option value="4" <?php if ($value->deadline == 4): ?>selected=""<?php endif ?>> 4 Hari</option>
                    <option value="5" <?php if ($value->deadline == 5): ?>selected=""<?php endif ?>> 5 Hari</option>
                    <option value="6" <?php if ($value->deadline == 6): ?>selected=""<?php endif ?>> 6 Hari</option>
                    <option value="7" <?php if ($value->deadline == 7): ?>selected=""<?php endif ?>> 7 Hari</option>
                  </select>
                </div>
              </div>

                
              <br><br>

              <?php  
                if ($kategori == 'Undangan Nikah') { ?>
                  <div style="display: none;">
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Pertama</label>
                        <input type="text" name="nama_pertama" placeholder="Isi Nama Mempelai Pertama" title="Isi Nama Pengantin Pertama" class="form-control" required="" value="<?=$ket_pembelian->nama_pertama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_nama_pertama" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Pertama / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_nama_pertama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Kedua</label>
                        <input type="text" name="nama_kedua" placeholder="Isi Nama Mempelai Kedua" title="Isi Nama Pengantin Kedua" class="form-control" required="" value="<?=$ket_pembelian->nama_kedua?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_nama_kedua" placeholder="cth : nama panggilan / pekerjaan , dll" title="Keterangan Untuk Pengantin Kedua / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_nama_kedua?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="text" name="tanggal" title="tanggal pernikahan berlangsung" class="form-control"  required="" value="<?=$ket_pembelian->tanggal?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Akad</label> 
                        <input type="text" name="akad" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya akad nikah" class="form-control"  required="" value="<?=$ket_pembelian->akad?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Resepsi</label> 
                        <input type="text" name="resepsi" placeholder="cth : pukul 09:00 di gedung/rumah" title="waktu dan tempat berlangsungnya resepsi pernikahan" class="form-control"  required="" value="<?=$ket_pembelian->resepsi?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Pertama</label>
                        <input type="text" name="nama_ortu_pertama" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Pertama" class="form-control" required="" value="<?=$ket_pembelian->nama_ortu_pertama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu_pertama" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Pertama / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_ortu_pertama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Kedua</label>
                        <input type="text" name="nama_ortu_kedua" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" required="" value="<?=$ket_pembelian->nama_ortu_kedua?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu_kedua" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua Kedua / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_ortu_kedua?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" value="<?=$ket_pembelian->nama_keluarga_mengundang?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_keluarga_mengundang?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>><?=$ket_pembelian->penambahan_ket?></textarea>
                      </div>
                    </div>    
                  </div>
                  <?php  
                }elseif ($kategori == 'Undangan Aqiqah') { ?>
                  <div style="display: none;">
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Anak</label>
                        <input type="text" name="nama_anak" placeholder="Isi Nama Anak" title="Isi Nama Anak" class="form-control" required="" value="<?=$ket_pembelian->nama_anak?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_anak" placeholder="cth : nama panggilan / anak keberapa , dll" title="Keterangan Untuk Anak / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_anak?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="text" name="tanggal" placeholder="Tanggal Aqiqah Berlangsung" title="Tanggal Aqiqah Berlangsung" class="form-control"  required="" value="<?=$ket_pembelian->tanggal?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Waktu</label>
                        <input type="text" name="waktu" placeholder="Waktu Berlangsung Aqiqag" title="Waktu Berlangsung Aqiqah" class="form-control" required="" value="<?=$ket_pembelian->waktu?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Tempat</label>
                        <input type="text" name="tempat" placeholder="cth : rumah , dll" title="Tempat Berlangsung Aqiqah" class="form-control" required="" value="<?=$ket_pembelian->tempat?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" placeholder="Isi Nama Orang Tua " title="Isi Nama Orang Tua Kedua" class="form-control" required="" value="<?=$ket_pembelian->nama_ortu?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_ortu" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Orang Tua/ Bisa Dikosongkan" class="form-control"  value="<?=$ket_pembelian->ket_ortu?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" name="nama_keluarga_mengundang" placeholder="Isi Nama Orang Tua Pertama" title="Isi Nama Orang Tua Kedua" class="form-control" value="<?=$ket_pembelian->nama_keluarga_mengundang?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" name="ket_keluarga_mengundang" placeholder="cth : pekerjaan , dll" title="Keterangan Untuk Keluarga Mengundang / Bisa Dikosongkan" class="form-control" value="<?=$ket_pembelian->ket_keluarga_mengundang?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>><?=$ket_pembelian->penambahan_ket?></textarea>
                      </div>
                    </div> 
                  </div>   
                  <?php
                }elseif ($kategori == 'Kartu Nama') { ?>
                  <div style="display: none;">
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="" value="<?=$ket_pembelian->nama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control"  required="" minlength="11" maxlength="13" id="no_telpon" value="<?=$ket_pembelian->no_telpon?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Pekerjaan</label> 
                        <input type="text" name="pekerjaan" placeholder="Isikan Pekerjaan | Bisa Dikosongkan" title="Isikan Pekerjaan | Bisa Dikosongkan" class="form-control"  required="" value="<?=$ket_pembelian->pekerjaan?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control"  required="" value="<?=$ket_pembelian->alamat_data?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Media Sosial</label> 
                        <input type="text" name="media_sosial" placeholder="Cth Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Media SOsial | Bisa Dikosongkan" class="form-control"  required="" value="<?=$ket_pembelian->media_sosial?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>><?=$ket_pembelian->penambahan_ket?></textarea>
                      </div>
                    </div>    
                  </div>
                  <?php
                }elseif ($kategori == 'Spanduk') { ?>
                  <div style="display: none">
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text" name="nama" placeholder="Isikan Nama" title="Isikan Nama" class="form-control"  required="" value="<?=$ket_pembelian->nama?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tema</label> 
                        <input type="text" name="tema" placeholder="Isikan Tema Spanduk" title="Isikan Tema Spanduk" class="form-control"  required=""  value="<?=$ket_pembelian->tema?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="date" name="tanggal"  title="Isikan Tanggal | Bisa Dikosongkan" class="form-control"  value="<?=$ket_pembelian->tanggal?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Waktu</label> 
                        <input type="time" name="waktu"  title="Isikan Waktu | Bisa Dikosongkan" class="form-control"  value="<?=$ket_pembelian->waktu?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" name="alamat_data" placeholder="Isikan Alamat | Bisa Dikosongkan" title="Isikan Alamat | Bisa Dikosongkan" class="form-control"  required=""  value="<?=$ket_pembelian->alamat_data?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" name="no_telpon" placeholder="Isikan No Telepon | Bisa Dikosongkan" title="Isikan No Telepon | Bisa Dikosongkan" class="form-control"  required=""  value="<?=$ket_pembelian->no_telpon?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Email / Media Sosial</label> 
                        <input type="text" name="media_sosial" placeholder="Cth Email,Facebook, Instagram, dll | Bisa Dikosongkan" title="Isikan Email / Media Sosial | Bisa Dikosongkan" class="form-control"  required=""  value="<?=$ket_pembelian->media_sosial?>" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea name="penambahan_ket" id="message" cols="30" rows="7" class="form-control" placeholder="Tuliskan Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain / bisa dikosongkan" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>><?=$ket_pembelian->penambahan_ket?></textarea>
                      </div>
                    </div> 
                  </div>   
                  <?php
                }
              ?>

              <div class="row form-group">
                <div class="col-md-12">
                  <center>
                    <!-- <input type="submit" value="Pesan" class="btn btn-primary btn-md text-white" name="pesan"> -->
                    <button type="button" onclick="proses()" class="btn btn-primary btn-md text-white" <?php if ($value->id_transaksi >= 2): ?> disabled="" <?php endif ?>>Ubah Detail Pesanan</button>
                  </center>
                </div>
              </div>
            </form>
          </div>

          <?php if ($value->id_transaksi == 1 or $value->id_transaksi == 2): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              
              <?php if ($value3->no == 1): ?>
              <h3 class="h4 text-black mb-3">Perhatian</h3>
              <p style="text-align: justify;">Diharap melakukan transaksi pemesanan paling lambat 24 jam setelah melakukan pemesanan.  Dibawah merupakan rekening bank kami untuk transaksi pembayaran. Jika ada ketidaksamaan pada <b>Nama Rekening</b>, maka jangan melakukan transaksi pengiriman, Terima Kasih.  <br><hr>
              <p style="text-align: justify;"><b>Penting</b> : Saat melakukan transaksi harus disesuaikan dengan pembayaran yang telah tertera disana, jika pembeli membayar kurang dari apa yang harus dibayar pesanan tidak akan diproses dan menunggu hingga pembeli membayar sisa dari apa yang harus dibayar. Sedangkan pembeli yang membayar melebihi apa yang seharusnya dibayar, kami tidak akan mengembalikan pembayaran yang lebih tersebut. Terima Kasih  <br><hr>
                <?php foreach ($rekening->result() as $key77 => $value77): ?>
                  
                  <b>Jenis Bank : <?=$value77->jenis_bank?></b><br>
                  <b>Nama Rekening: <?=$value77->nama_bank?></b><br>
                  <b>Nomor Rekening: <?=$value77->nomor_bank?></b><br><hr>
                <?php endforeach ?>

                <b>Deadline</b> berlaku setelah admin melakukan pengesahan transaksi pengiriman<br><br>


              <i>Terima Kasih telah berbelanja di Website kami</i></p>  
              <?php endif ?>

              <?php if ($value3->no == 2): ?>
              <h3 class="h4 text-black mb-3">Bukti Pembayaran Sedang Diproses</h3>
              <p style="text-align: justify;">Proses Pengesahan Pembayaran Akan Dilakukan Oleh Tim Kami. Anda Dapat Mengupload Kembali Bukti Pembayaran Jika Sebelumnya Kurang Jelas . Mohon Bersabar, Terima Kasih. <br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>  
              <?php endif ?>
              
            </div>

            <?php if ($value3->no == 2): 
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>
            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Foto Bukti Pembayaran</h2> 
              <center><img src="<?=base_url($value4->foto_transaksi)?>" width="50%"></center>
            </div>  
            <?php endif ?>
            
            <div class="p-4 mb-3 bg-white">
              <?php if ($value3->no == 2): ?>
              <h2 class="h4 text-black mb-3">Upload Kembali Pembayaran</h2>  
              <?php endif ?>
              <?php if ($value3->no == 1): ?>
              <h2 class="h4 text-black mb-3">Upload Bukti Pembayaran</h2>  
              <?php endif ?>
               
              <div class="row form-group">
                <div class="col-md-12">
                  
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <center><img id="image-preview" alt="image preview"/></center>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Upload Foto</label>
                      <input type="file"  name="foto_upload" id="imagesource" onchange="previewImage();" class="form-control">
                    </div>
                  </form>

                  <div class="form-group" style="text-align: center;">
                    <button type="button" class="btn btn-primary btn-md text-white" onclick="upload()">Upload Bukti Pembayaran</button>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <?php endif ?>

          <?php if ($value->id_transaksi == 3 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Desain Sedang Dalam Proses</h3>
              <p style="text-align: justify;">Kami Sedang Membuat Desain <b><?=$kategori?></b> Berdasarkan Dari Informasi Yang Diinput Oleh Anda. Informasi Akan Diberikan Setelah Desain Selesai. Mohon Bersabar, Terima Kasih. <br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              <center><a href="<?=base_url()?>user/pesanan/"><button type="button"  class="btn btn-info text-white" title="Kembali"> Kembali Ke Halaman <i>Pesanan</i> </button></a></center>
            </div>
          </div> 
          <?php endif ?>

          <?php if ($value->id_transaksi == 4 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Desain Selesai Dibuat</h3>
              <p style="text-align: justify;">Dibawah Merupakan Foto Desain Yang Telah Dibuat Oleh Kami Berdasarkan Informasi Yang Diberikan Oleh Anda. Jika Ada Kekurangan, Bisa Mengisi Form <i><b>"Penambahan Keterangan"</b></i> Yang Berada Pada Bagian Bawah. Jika Berpuas Hati, Silahkan Klik <i><b>"Cetak Pesanan"</b></i>  Agar Tim Kami Bisa Mencetak Pesanan Anda Dan Anda Dapat Mengambil Pesanan Anda Di Toko Kami, Terima Kasih.<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              
            </div>
            <?php  
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>

            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Desain <?=$kategori?></h2> 
              <center><img src="<?=base_url($value4->foto_desain_selesai)?>" width="100%" id="myImg" alt="Foto Desain Yang Dibuat TIM"></center>
              <div class="row form-group">
                <div class="col-md-12">
                  <form method="post" >
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Penambahan Keterangan</label>
                      <textarea cols="30" rows="7" class="form-control" style="resize: none" placeholder="Isikan Jika Ada Yang Ingin Ditambahkan Pada Desain Yang DIbuat Tim Kami, Jika Tiada, Bisa Menekan Tombol 'Cetak Pesanan' "></textarea>
                    </div> -->
                    <div class="form-group" style="text-align: center;">
                     <!--  <button type="submit" class="btn btn-warning btn-md text-white" >Tambah Keterangan</button> --> <!-- <br><br> -->  <a href="<?=base_url()?>user/pesanan/cetak_pesanan/<?=$this->uri->segment(4)?>"><button type="button" class="btn btn-primary btn-md text-white" ><i>Cetak Pesanan</i></button></a>
                    </div>
                  </form>
                  
                </div>
              </div>
            </div> 

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div> 
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi == 5 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Desain Dalam Proses Pencetakan</h3>
              <p style="text-align: justify;">Tim Kami Dalam Proses Mencetak Desain <?=$kategori?> Yang Anda Inginkan, Notifikasi Akan Diterima Jika Proses Pencetakan Selesai Dan Anda Dapat Langsung Mengambil Pesanan Anda. Mohon Bersabar. Terima Kasih<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              
            </div>
            <?php  
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>

            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Desain <?=$kategori?></h2> 
              <div class="form-group" style="text-align: center;">
                <img src="<?=base_url($value4->foto_desain_selesai)?>" width="100%" id="myImg" alt="Foto Desain Yang Dibuat TIM">
              </div>
              <div class="form-group" style="text-align: center;">
                <a href="<?=base_url()?>user/pesanan"><button type="button" class="btn btn-info btn-md text-white" >Kembali Ke Halaman <b><i>Pesanan</i></b></button></a>
              </div>
            </div> 

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div> 
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi == 6 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Pesanan Desain Dalam Pengambilan</h3>
              <p style="text-align: justify;">Cetakan Desain Anda Telah Selesai. Sekarang Anda Dapat Mengambil Pesanan Anda di Toko Kami, Terima Kasih. Silahkan Klik Tombol <i><b>"Pesanan Diterima"</b></i>  Jika Pesanan Telah Diterima .<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              
            </div>
            <?php  
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>

            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Desain <?=$kategori?></h2> 
              <div class="form-group" style="text-align: center;">
                <img src="<?=base_url($value4->foto_desain_selesai)?>" width="100%" id="myImg" alt="Foto Desain Yang Dibuat TIM">
              </div>
              <div class="form-group" style="text-align: center;">
                 <a href="<?=base_url()?>user/pesanan/pesanan_diterima/<?=$this->uri->segment(4)?>"><button type="button" class="btn btn-success btn-md text-white" ><b><i>Pesanan Diterima</i></b></button></a><br><br>
                <a href="<?=base_url()?>user/pesanan"><button type="button" class="btn btn-info btn-md text-white" >Kembali Ke Halaman <b><i>Pesanan</i></b></button></a>
              </div>
            </div> 

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div> 
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi == 7 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Pesanan Desain Telah Diterima</h3>
              <p style="text-align: justify;">Desain Yang Dipesan Telah Diterima Oleh Pembeli Pada Tanggal <i><?=$tanggal_penerimaan?></i> Jam <i><?=$jam_penerimaan?></i>. Jika Ada Kerusakkan, Bisa Melaporkan Pada Menu <i><b>"Pengembalian"</b></i> Paling Lambat 6 Jam Setelah Menerima Pesanan<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              
            </div>
            <?php  
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>

            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Desain <?=$kategori?></h2> 
              <div class="form-group" style="text-align: center;">
                <img src="<?=base_url($value4->foto_desain_selesai)?>" width="100%" id="myImg" alt="Foto Desain Yang Dibuat TIM">
              </div>
              <div class="form-group" style="text-align: center;">
                <a href="<?=base_url()?>user/pesanan"><button type="button" class="btn btn-info btn-md text-white" >Kembali Ke Halaman <b><i>Pesanan</i></b></button></a>
              </div>
            </div> 

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div> 
          </div>
          <?php endif ?>

          <?php if ($value->id_transaksi == 8 ): ?>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h4 text-black mb-3">Proses Pengembalian Dalam Pengesahan</h3>
              <p style="text-align: justify;">Proses Pengembalian Yang Anda Ajukan Sedang Dalam Pengesahan Tim Kami, Mohon Maaf Sekiranya Ada Kerusakan Pada Pesanan Yang Diambil. Mohon Bersabar, Terima Kasih<br><br>

              <i>Terima Kasih telah berbelanja di Website kami</i></p>
              
            </div>
            <?php  
              $cek_foto_pembelian = $this->muser->tampil_data_where('tb_foto_pembelian', array('no' => $value->no));
              foreach ($cek_foto_pembelian->result() as $key4 => $value4) ;
            ?>

            <div class="p-4 mb-3 bg-white">
              <h2 class="h4 text-black mb-3">Desain <?=$kategori?></h2> 
              <div class="form-group" style="text-align: center;">
                <img src="<?=base_url($value4->foto_desain_selesai)?>" width="100%" id="myImg" alt="Foto Desain Yang Dibuat TIM">
              </div>
              <div class="form-group" style="text-align: center;">
                <a href="<?=base_url()?>user/pengembalian/<?=$value->no?>"><button type="button" class="btn btn-danger btn-md text-white" >Ke Halaman <b><i>Pengembalian</i></b></button></a><br><br>
                <a href="<?=base_url()?>user/pesanan"><button type="button" class="btn btn-info btn-md text-white" >Kembali Ke Halaman <b><i>Pesanan</i></b></button></a>
              </div>
            </div> 

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div> 
          </div>
          <?php endif ?>
        </div>
      </div>
    </section>

