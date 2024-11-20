		<div class="row small-spacing">
			<div class="col-xs-12">
				<?php //print_r(count($data_pembelian->result())) ?>
				<div class="box-content card" id="printJS-form">
					<h4 class="box-title">Form Daftar Tunggu Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?></h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Pembelian</th>
									<th>Nama</th>
									<th>Kode Produk</th>
									<th>Harga</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_pembelian->result() as $key => $value): 
									$no = $key +1;
									$ket_pembelian = json_decode($value->ket);
									$cek_produk = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
									

									if ($value->desain == 0) {
										foreach ($cek_produk->result() as $key1 => $value1) ;
										$ket_produk = json_decode($value1->keterangan);
										if ($value1->kategori == 1) {
											if ($ket_produk->undangan == 1) {
												$kategori = "UA".$value1->no;
											}elseif ($ket_produk->undangan == 2) {
												$kategori = "UN".$value1->no;
											}
										}elseif ($value1->kategori == 2) {
											$kategori = "KN".$value1->no;
										}elseif ($value1->kategori == 3) {
											$kategori = "SP".$value1->no;
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori == 1) {
											if ($ket_pembelian->undangan == 1) {
												$kategori = "UA / Desain sendiri";
											}elseif ($ket_pembelian->undangan == 2) {
												$kategori = "UN / Desain Sendiri";
											}
										}elseif ($value->kategori == 2) {
											$kategori = "KN / Desain Sendiri";
										}elseif ($value->kategori == 3) {
											$kategori = "SP / Desain Sendiri";
										}
									}

									

									$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' =>$value->id_pembeli));
									foreach ($cek_pembeli->result() as $key2 => $value2) ;

									if ($value->desain == 0) {
										if ($value1->kategori != 3) {
											$jumlah_harga = ($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas )+ $ket_produk->harga  + substr($value2->no_telpon, -3);
										}elseif ($value1->kategori == 3) {
											$jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas)  + $ket_produk->harga  + substr($value2->no_telpon, -3);
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori != 3) {
											$jumlah_harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
										}elseif ($value->kategori == 3) {
											$jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang * 12500) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3) ;
										}
									}
									
									

									$cek_transaksi = $this->madmin->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
									foreach ($cek_transaksi->result() as $key3 => $value3) ;
									$status_transaksi = $value3->ket_admin;
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$value->waktu_pembelian?></td>
									<?php  

									?>
									<td><?=$value2->nama?></td>
									<td><?=$kategori?></td>
									<td>Rp <?=number_format($jumlah_harga)?> / <?=number_format($ket_pembelian->jumlah_kertas)?> pcs </td>
									<td>
										<!-- <button type="button" class="btn btn-danger btn-circle btn-xs waves-effect waves-light" title="Belum Mengirim Bukti Pembayaran"><i class="ico fa fa-close"></i></button> -->
										<?=$status_transaksi?>
									</td>
									<td align="center">
										<a href="<?=base_url()?>admin/daftar_tunggu/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>
									</td>
								</tr>	
								<?php endforeach ?>
								
							</tbody>
						</table>
						<!-- <div class="form-group" style="text-align: center">
							<button type="submit" class="btn btn-info waves-effect waves-light">Print Laporan Daftar Tunggu Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?></button>
						</div> -->
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>