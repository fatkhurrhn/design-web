		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Proses Pembuatan</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<td>No</td>
									<th>Tanggal Pembelian</th>
									<th>Kode Produk</th>
									<th>Nama</th>
									<th>Harga</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_pembelian->result() as $key => $value): 
									$ket_pembelian = json_decode($value->ket);
									$cek_produk = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
									foreach ($cek_produk->result() as $key1 => $value1) ;
									

									if ($value->desain == 0) {
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
											// $jumlah_harga = ($ket_pembelian->jenis_kertas + $ket_produk->harga) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
											$jumlah_harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + $ket_produk->harga + substr($value2->no_telpon, -3);
										}elseif ($value1->kategori == 3) {
											$jumlah_harga = $ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas + $ket_produk->harga  + substr($value2->no_telpon, -3);
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori != 3) {
											$jumlah_harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3) ;
										}elseif ($value->kategori == 3) {
											$jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang * 12500) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3) ;
										}
									}
									

									$cek_transaksi = $this->madmin->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
									foreach ($cek_transaksi->result() as $key3 => $value3) ;
									$status_transaksi = $value3->ket_admin;
								?>

								<tr>
									<td><?=$value->no?></td>
									<td><?=$value->waktu_pembelian?></td>
									<td><?=$kategori?></td>
									<td><?=$value2->nama?></td>
									<td>Rp <?=number_format($jumlah_harga)?> / <?=number_format($ket_pembelian->jumlah_kertas)?> pcs  </td>
									<td align="center"><?=$status_transaksi?></td>
									<td align="center">
										<a href="<?=base_url()?>admin/proses_pembuatan/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>
									</td>
								</tr>	
								<?php endforeach ?>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>