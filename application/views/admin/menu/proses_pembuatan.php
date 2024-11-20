		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Proses Pembuatan</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Bulan</th>
									<th>Tahun</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $array = null; foreach ($data_pembelian->result() as $key => $value){ 
									$tanggal = date('m-Y', strtotime($value->waktu_pembelian));
									$i = 0;
									if ($array == null) {
										$array = array(array('tanggalnya' => $tanggal));
									}else{
										// if (condition) {
										// 	# code...
										// }
										// $array = array_merge($array,array(array('tanggalnya' => $tanggal)));
										foreach ($array as $key => $value) {
											if ($value['tanggalnya'] == $tanggal) {
												$i = 1;
												break;
											}
										}

										if ($i == 0) {
											 $array = array_merge(array(array('tanggalnya' => $tanggal)),$array);
										}
									}}

									foreach ($array as $key => $value) { 
										// print_r($value);
										$ini = explode("-",$value['tanggalnya']);
										$bulan = $this->madmin->cari_nama_bulan($ini[0]);
										$no = $key+1;
										?>
										<tr>
											<td><?=$no?></td>
											<td><?=$bulan?></td>
											<td><?=$ini[1]?></td>
											<td align="center">
												<a href="<?=base_url()?>admin/proses_pembuatan/tanggalnya/<?=$ini[0]?>/<?=$ini[1]?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Daftar Tunggu Bulan <?=$ini[0]?>, Tahun <?=$ini[1]?>"><i class="ico fa fa-file-text-o"></i></button></a>
											</td>
										</tr>
										<?php
									}
								?>

							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>