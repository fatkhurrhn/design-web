    <section class="site-section">
      <div class="container">
        <div class="row">
          <?php 
            foreach ($data_pembelian->result() as $key1 => $value1) ;
            $cek_status = $this->muser->tampil_data_where('tb_transaksi',array('no' => $value1->id_transaksi));
            $id_transaksi = $value1->id_transaksi;
            foreach ($cek_status->result() as $key2 => $value2) ;
            $status = $value2->ket_user;
            $ket_pembelian = json_decode($value1->ket);
            $data_pembeli = $this->session->userdata('pembeli');
            $cekkategori = $this->muser->tampil_data_where('tb_kategori',array('no' =>$value1->kategori));
            foreach ($cekkategori->result() as $key4 => $value4) ;
            $kategori = $value4->nama;
            
            if ($value1->kategori == 1) {
              if ($ket_pembelian->undangan == 1) {
                $kategori = $kategori . ' Aqiqah';
              }elseif ($ket_pembelian->undangan == 2) {
                $kategori = $kategori . ' Nikah';
              }
              if ($ket_pembelian->jenis_kertas == '4000') {
                $jenis_kertas = "Art Paper | Rp. 4,000 / 1 pcs";
              }elseif ($ket_pembelian->jenis_kertas == '3000') {
                $jenis_kertas = "Jasmine | Rp. 3,000 / 1 pcs";
              }elseif ($ket_pembelian->jenis_kertas == '1000') {
                $jenis_kertas = "Cartoon | Rp. 1,000 / 1 pcs";
              }

              $harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + 10000 + substr($data_pembeli['no_telpon'], -3);
            }else if ($value1->kategori == 2) {
              if ($ket_pembelian->jenis_kertas == '25000') {
                $jenis_kertas = "PVC | Rp. 25,000 / 1 pcs";
              }elseif ($ket_pembelian->jenis_kertas == '1000') {
                $jenis_kertas = "Photopaper | Rp. 1,000 / 1 pcs";
              }elseif ($ket_pembelian->jenis_kertas == '500') {
                $jenis_kertas = "Cartoon | Rp. 500 / 1 pcs";
              }
              $harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas;
              $kategori = $kategori;
            }else if ($value1->kategori == 3) {
              $jenis_kertas = "Vinyl | 1m * 1m = Rp. 25,000";
              $harga = $ket_pembelian->lebar * $ket_pembelian->panjang  * 12500 * $ket_pembelian->jumlah_kertas + 10000 + substr($data_pembeli['no_telpon'], -3);
              $kategori = $kategori;
            }
          ?>


          <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
              <div class="h-entry">
                <center>
                  <a class="example-image-link" href="<?=base_url()?>images/pembelian/foto_desain_selesai/<?=$this->uri->segment(3)?>.jpg" data-lightbox="example-set" ><img class="example-image" src="<?=base_url()?>images/pembelian/foto_desain_selesai/<?=$this->uri->segment(3)?>.jpg" width="240px" height="240px" alt=""/></a>
                  <div class="meta mb-4"><span class="mx-2"></span><b></b> Pesanan / <?=$value1->waktu_pembelian?> &bullet;<span class="mx-2">&bullet;</span><br><b>Kategori</b> : <b><i><?=$kategori?></i></b> <br><b>Status</b> : <b><i><?=$status?></i></b></div>
                </center>
              </div> 
            </div>
          </div> 
        </div>
      </div>

      <div class="container">
        <div class="row">
          <form class="col-md-8 mb-5" id="ini_formnya" method="post">
            <div class="p-4 bg-white">
              <h2 class="h4 text-black mb-3" onclick="myFunction(0)" style="cursor: pointer;">Form Pembelian</h2> 
              <div id="myDIV" style="display: none;">
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Jenis Kertas</label> 
                    <input type="text" class="form-control" value="<?=$jenis_kertas?>" disabled>
                  </div>
                </div>

                <?php if ($value1->kategori != 3): ?>
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Panjang X Lebar</label> 
                    <input type="text" class="form-control" value="15,3cm x 20,3cm" disabled>
                  </div>
                </div>  
                <?php endif ?>
                <?php if ($value1->kategori == 3): ?>
                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Panjang</label>
                    <input type="text" title="" class="form-control" disabled="" value="<?=$ket_pembelian->panjang?> m">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="fname">Lebar</label>
                    <input type="text" class="form-control" disabled="" value="<?=$ket_pembelian->lebar?> m">
                  </div>
                </div>  
                <?php endif ?>
                

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Jumlah</label> 
                    <input type="text" class="form-control" value="<?=$ket_pembelian->jumlah_kertas?>" disabled>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Alamat Pengiriman</label><input type="text" class="form-control" value="<?=$ket_pembelian->alamat?>" disabled>
                  </div>
                </div>

                 <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="email">Harga</label> 
                    <input type="Text" class="form-control" id="jumlah_harga" value="Rp. <?=number_format($harga)?>" disabled="">
                  </div>
                </div>
              </div>
            </div>

            <div class="p-4 bg-white">
              <h2 class="h4 text-black mb-3" onclick="myFunction(1)" style="cursor: pointer;">Form Pengisian Informasi Desain</h2>
              <div id="myDIV1" style="display: none;">
                <div class="row form-group" id="foto_upload_lama">
                  <div class="col-md-12">
                  <?php  
                    $dir = 'images/pembelian/foto_upload_user/'.$this->uri->segment(3).'/'; 
                    $files1 = glob($dir.'*');
                    foreach($files1 as $file){ // iterate files
                      if(is_file($file)) ?>
                      <center> <a class="example-image-link" href="<?=base_url().$file?>" data-lightbox="example-set" ><img class="example-image" src="<?=base_url().$file?>" width="240px" height="240px" alt=""/></a></center>
                      <?php
                    }
                  ?>
                  </div>
                </div>
                <?php  
                  if ($value1->kategori == 1 and $ket_pembelian->undangan == 2) { ?>
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Pertama</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->nama_pertama?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->ket_nama_pertama?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Kedua</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->nama_kedua?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->ket_nama_kedua?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="date"  class="form-control" value="<?=$ket_pembelian->tanggal?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Akad</label> 
                        <input type="text" class="form-control" value="<?=$ket_pembelian->akad?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Resepsi</label> 
                        <input type="text" class="form-control" value="<?=$ket_pembelian->resepsi?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Pertama</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->nama_ortu_pertama?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->ket_ortu_pertama?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua Kedua</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->nama_ortu_kedua?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->ket_ortu_kedua?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->nama_keluarga_mengundang?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" class="form-control" value="<?=$ket_pembelian->ket_keluarga_mengundang?>" disabled>
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea cols="30" rows="7" class="form-control" disabled><?=$ket_pembelian->penambahan_ket?></textarea>
                      </div>
                    </div>    
                  <?php  
                  }elseif ($value1->kategori == 1 and $ket_pembelian->undangan == 1) { ?>
                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Anak</label>
                        <input type="text"  title="Nama Anak" class="form-control" disabled="" value="<?=$ket_pembelian->nama_anak?>">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text"  title="Keterangan Anak" class="form-control" value="<?php if($ket_pembelian->ket_anak != ''){ echo $ket_pembelian->ket_anak;}else{ echo "-";} ?>" disabled>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="date"   title="Tanggal Aqiqah Berlangsung" class="form-control"  disabled="" value="<?=$ket_pembelian->tanggal?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Waktu</label>
                        <input type="time"  title="Waktu Berlangsung Aqiqah" class="form-control" value="<?=$ket_pembelian->waktu?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Tempat</label>
                        <input type="text" title="Tempat Berlangsung Aqiqah" class="form-control" disabled="" value="<?=$ket_pembelian->tempat?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Orang Tua</label>
                        <input type="text"  title="Isi Nama Orang Tua" class="form-control" disabled="" value="<?=$ket_pembelian->nama_ortu?>">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text" title="Keterangan Untuk Orang Tua/" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_ortu != ''){ echo $ket_pembelian->ket_ortu;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Nama Keluarga Yang Mengundang</label>
                        <input type="text" title="Nama Keluarga Mengundang" class="form-control" disabled="" value="<?php if($ket_pembelian->nama_keluarga_mengundang != ''){ echo $ket_pembelian->nama_keluarga_mengundang;}else{ echo "-";} ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="text-black" for="lname">Keterangan</label>
                        <input type="text"  title="Keterangan Keluarga Mengundang " class="form-control" disabled="" value="<?php if($ket_pembelian->ket_keluarga_mengundang != ''){ echo $ket_pembelian->ket_keluarga_mengundang;}else{ echo "-";} ?>">
                      </div>
                    </div> 

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea  id="message" cols="30" rows="7" class="form-control"  title="Keterangan yang ingin ditambah pada desain" disabled><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
                      </div>
                    </div>    
                    <?php
                  }elseif ($value1->kategori == 2 ) { ?>
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text"  title="Nama" class="form-control" disabled="" value="<?=$ket_pembelian->nama?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" title="No Telepon" class="form-control" disabled="" value="<?php if($ket_pembelian->no_telpon != ''){ echo $ket_pembelian->no_telpon;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Pekerjaan</label> 
                        <input type="text"  title="Pekerjaan" class="form-control" disabled="" value="<?php if($ket_pembelian->pekerjaan != ''){ echo $ket_pembelian->pekerjaan;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" title="Alamat" class="form-control" disabled="" value="<?php if($ket_pembelian->alamat_data != ''){ echo $ket_pembelian->alamat_data;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Media Sosial</label> 
                        <input type="text" title="Media Sosial" class="form-control" disabled="" value="<?php if($ket_pembelian->media_sosial != ''){ echo $ket_pembelian->media_sosial;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea cols="30" rows="7" class="form-control" title="Keterangan yang ingin ditambah pada desain" disabled><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
                      </div>
                    </div>      
                    <?php
                  }elseif ($value1->kategori == 3) { ?>
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Nama</label> 
                        <input type="text" name="nama" title="Nama" class="form-control" disabled="" value="<?=$ket_pembelian->nama?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tema</label> 
                        <input type="text" title="Tema Spanduk" class="form-control"  disabled="" value="<?=$ket_pembelian->tema?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Tanggal</label> 
                        <input type="date" title="Tanggal" class="form-control" disabled="" value="<?php if($ket_pembelian->tanggal != ''){ echo $ket_pembelian->tanggal;}else{} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Waktu</label> 
                        <input type="time"  title="Waktu" class="form-control" disabled="" value="<?php if($ket_pembelian->waktu != ''){ echo $ket_pembelian->waktu;}else{} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Alamat</label> 
                        <input type="text" title="Alamat" class="form-control" disabled="" value="<?php if($ket_pembelian->alamat != ''){ echo $ket_pembelian->alamat;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">No Telepon</label> 
                        <input type="text" title="No Telepon" class="form-control"  disabled="" value="<?php if($ket_pembelian->no_telpon != ''){ echo $ket_pembelian->no_telpon;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="email">Email / Media Sosial</label> 
                        <input type="text" title="Email / Media Sosial" class="form-control" disabled="" value="<?php if($ket_pembelian->media_sosial != ''){ echo $ket_pembelian->media_sosial;}else{ echo "-";} ?>">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <label class="text-black" for="message">Penambahan Keterangan</label> 
                        <textarea cols="30" rows="7" class="form-control" placeholder="Keterangan Yang Ingin Ditambah Pada Desain" title="Keterangan yang ingin ditambah pada desain" disabled><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
                      </div>
                    </div>      
                    <?php
                  }
                ?>
              </div> 
            </div>
          </form>


          <div class="col-md-4">
            <h2 class="h4 text-black mb-1">Komentar</h2> 

            <?php if ($id_transaksi == 7 or $id_transaksi == 8 or $id_transaksi == 9 or $id_transaksi == 10 or $id_transaksi == 11): ?>
            <div class="p-4 mb-1 bg-white">
              <form method="post">  
                <div class="row form-group">
                  <div class="col-md-12">
                    <textarea cols="30" rows="5" class="form-control" placeholder="Tambahkan Komentar Pada Desain Ini" title="Komentar Pada Desain Ini"  style="resize: none;" required="" name="komen"></textarea>
                  </div>
                </div> 
                <div class="form-group" style="text-align: center;">
                  <input type="submit" name="tambah_komentar" class="btn btn-info btn-md text-white" value="Tambah Komentar" style="font-weight: bolder;">
                </div> 
              </form> 
            </div>
            <?php endif ?>


            <?php  foreach ($komen->result() as $key5 => $value5);  ?>
            <div id="sini_komen">
              <div class="p-4 mb-1 bg-white">
                <?php 
                  if (count($komen->result())>0) {
                    $komentar = json_decode($value5->komen);
                    // echo count($komentar);
                    foreach ($komentar as $key6 => $value6) { 
                      $cek_nama = $this->muser->tampil_data_where('tb_pembeli',array('id' => $value6->id_pembeli));
                      foreach ($cek_nama->result() as $key7 => $value7) ;
                      $nama = $value7->nama;
                      ?>
                      <p class="mb-0 font-weight-bold"><?=$nama?></p>
                      <p class="mb-4"><?=$value6->komen?></p>
                      <hr>
                      <?php
                    }
                  }else{ ?>
                    <p class="mb-0 font-weight-bold">Belum Ada Komentar Pada Desain Ini</p>
                    <?php
                  }
                  
                ?>
              </div>

              <?php if (count($komen->result())>0): ?>
              <div class="row">
                <div class="col-11">
                  <div class="custom-pagination text-center">
                    <?php if (count($komentar)>10){ ?>
                      <span style="background-color: blue;color: white;cursor: pointer;">1</span>
                      <span style="cursor: pointer;" title="Halaman Selanjutnya"><b>>></b></span>
                    <?php }else{ ?>
                      <span style="background-color: blue;color: white;cursor: pointer;">1</span>

                      <?php } 
                    ?>
                  </div>
                </div>
              </div>
 
              <?php endif ?>
              
            </div>

          </div>
        </div>
      </div>
    </section>

