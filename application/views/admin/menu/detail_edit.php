		<div class="row small-spacing">
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Form Detail Desain</h4>
					<!-- /.box-title -->
					<?php foreach ($data->result() as $key => $value);
						$ket = json_decode($value->keterangan);
						$kategori = $this->madmin->tampil_data_where('tb_kategori',array('no' => $value->kategori));
						foreach ($kategori->result() as $key1 => $value1);
						$kategori = $value1->nama;
					?>
					<div class="card-content">
						<form method="post" id="myform" name="myform" enctype="multipart/form-data">
							<div class="form-group" id="sini_foto_lama_div">
								<center><img src="<?=base_url($ket->img)?>" title="Foto Sekarang"></center>
							</div>

							<div id="sini_upload_foto_div" style="display: none">
								<div class="form-group">
									<center><img id="image-preview" alt="image preview" width="50%" style="display: none"></center>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Upload Foto</label>
									<input type="file"  name="foto_upload" id="imagesource11" onchange="previewImage();" class="form-control">
								</div>
							</div>
								

							<div class="form-group">
								<input type="radio" name="foto_pilih" value="tetap" style="display: inline;" checked="" onclick="klik_foto(1)"><label class="text-black" for="email">Kekalkan Foto</label> &nbsp &nbsp
                <input type="radio" name="foto_pilih" value="upload_baru" style="display: inline;" onclick="klik_foto(2)"><label class="text-black" for="email">Upload Foto Baru</label> 
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Kategori</label>
								<select class="form-control" name="kategori" onchange="changeKategori();" id="kategori">
									<option value="">-Sila Pilih Kategori</option>
									<?php foreach ($categori->result() as $key2 => $value2): ?>
									<option value="<?=$value2->no?>"<?php if ($value->kategori == $value2->no) {echo "selected";} ?>><?=$value2->nama?></option>

									<?php endforeach ?>
								</select>
							</div>

							<?php if ($value->kategori == 1){ 
								$undangan = $ket->undangan;
								if ($undangan == 1) {
									$aqiqah = 'selected';
									$nikah = '';
								}elseif ($undangan == 2) {
									$aqiqah = '';
									$nikah = 'selected';
								}
							?>
							<div class="form-group" id="jenis_undangan">
								<label for="exampleInputFile">Jenis Undangan</label>
								<select class="form-control" name="jenis_undangan" id="undangan" required="">
									<option value="">-Sila Pilih Jenis Undangan</option>
									<option value="1" <?=$aqiqah?>>Undangan Aqiqah</option>
									<option value="2" <?=$nikah?>>Undangan Nikah</option>
								</select>
							</div>
							<?php } ?>
							

							<div class="form-group">
								<label for="exampleInputEmail1">Harga</label>
								<input type="text"  class="form-control" name="harga" value="<?=number_format($ket->harga)?>" id="num" minlength="5" maxlength="6" required="">
							</div>
							<center><button type="button" class="btn btn-success btn-sm waves-effect waves-light" onclick="edit()">Simpan Perubahan</button><br><br>
							<input type="submit" id="ini_submit" style="display: none" name="edit_nya">
							<a href="<?=base_url()?>admin/detail/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Batal</button></a></center>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">List Pembelian</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Pembeli</th>
									<th>Status</th>				
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>20-02-2020</td>
									<td>Kicap Karan</td>
									<td>Telah Dihantar</td>
								</tr>
								<tr>
									<td>21-02-2020</td>
									<td>AAT</td>
									<td>Belum Mengirim Bukti Pembayaran</td>
								</tr>
							</tbody>
						</table>
					</div>				
				</div>
			</div>


			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Komentar</h4>
					<div class="card-content">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama 1</label>
							<p>"Komentar nama 1"</p>
						</div>
						<hr>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama 2</label>
							<p>"Komentar nama 2"</p>
						</div>
						<hr>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama 3</label>
							<p>"Komentar nama 3"</p>
						</div>
						<hr>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama 4</label>
							<p>"Komentar nama 4"</p>
						</div>
						<hr>
					</div>
					<div class="card-content" style="text-align: center;"> 
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">1</button>
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">2</button>
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">3</button>
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">4</button>
						
					</div>
		           



					

					
				</div>
			</div>

			
		</div>