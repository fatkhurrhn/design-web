    <section class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="col-md-12 col-lg-12">
              <div class="card-content" style="overflow-x: auto">
                <div class="form-horizontal">
                  <table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                      <tr align="center">
                        <th>No</th>
                        <th>Waktu Pembelian</th>
                        <th width="12%" align="center">Desain</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($data_pembelian->result() as $key => $value): 
                        $data_produk = $this->muser->tampil_data_where('tb_produk',array('no' => $value->id_produk));
                        $ket_pembelian = json_decode($value->ket);
                        
                        if ($value->desain == 0) {
                          foreach ($data_produk->result() as $key1 => $value1);
                          $ket_produk = json_decode($value1->keterangan);
                          if ($value1->kategori != 3) {
                            $jumlah_harga = ($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas ) + $ket_produk->harga + substr($data_pembeli['no_telpon'], -3);
                          }elseif ($value1->kategori == 3){
                            $jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang *12500 * $ket_pembelian->jumlah_kertas) + $ket_produk->harga + substr($data_pembeli['no_telpon'], -3);
                          }
                        }elseif ($value->desain == 1) {
                          if ($value->kategori != 3) {
                            $jumlah_harga = $ket_pembelian->jenis_kertas  * $ket_pembelian->jumlah_kertas + substr($data_pembeli['no_telpon'], -3) ;
                          }elseif ($value->kategori == 3){
                            $jumlah_harga =($ket_pembelian->lebar  * $ket_pembelian->panjang * 12500)  * $ket_pembelian->jumlah_kertas + substr($data_pembeli['no_telpon'], -3) ;
                          }
                        }
                        
                       

                        $data_status = $this->muser->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
                        foreach ($data_status->result() as $key2 => $value2) ;
                        $status = $value2->ket_user;

                      ?>
                      <tr align="center">
                        <td><?=$i;$i++?></td>
                        <td><?=$value->waktu_pembelian?></td>
                        <td>
                          <?php if ($value->desain == 0){ ?>
                          <img src="<?=base_url($ket_produk->img)?>" id="img<?=$value->no?>"> 
                          <?php }else{ 

                              if ($value->kategori == 1) {
                                if ($ket_pembelian->undangan == 1) {
                                  $nama_kategori = 'Undangan Aqiqah';
                                }elseif ($ket_pembelian->undangan == 2) {
                                  $nama_kategori = 'Undangan Nikah';
                                }
                              }elseif ($value->kategori == 2) {
                                $nama_kategori = 'Kartu Nama';
                              }elseif ($value->kategori == 3) {
                                $nama_kategori = 'Spanduk';
                              }
                            ?>
                            Desain Sendiri <br> <i><?=$nama_kategori?></i>
                            <?php
                          } ?>
                        </td>
                        <td valign="center">Rp. <?=number_format($jumlah_harga)?> / <?=$ket_pembelian->jumlah_kertas?> pcs</td>
                        <td><?=$status?></td>
                        <td align="center">
                          <center>
                          <a href="<?=base_url()?>user/pesanan/<?=$value->no?>"><button type="button"  class="btn btn-success text-white" title="Detail Pemesanan"> Detail </button></a> <br>
                          <a href="<?=base_url()?>user/pesanan/detail/<?=$value->no?>"><button type="button"  class="btn btn-warning text-white" title="Aksi Selanjutnya"> Aksi </button></a>  
                          <!-- <a href="<?=base_url()?>user/pesanan/hapus/1"><button type="button"  class="btn btn-danger text-white" title="Hapus Pemesanan"> Hapus </button></a> -->
                          </center>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>

               
                
              </div>
                 
            </div>
             
            
          </div> 

          

        </div>
      </div>
    </section>