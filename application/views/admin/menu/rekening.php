		<div class="row small-spacing">
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Form Penambahan Rekening Bank</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post">

							<div class="form-group">
								<label for="exampleInputPassword1">Jenis Bank</label>
								<select class="form-control" name="jenis_bank"  id="jenis_bank" required="">
									<option value="">-Silahkan Pilih Jenis Bank</option>
									<option value="Bank Mandiri">Bank Mandiri</option>
									<option value="BNI">BNI</option>
									<option value="BRI">BRI</option>
									<option value="BCA">BCA</option>
								</select>
							</div>
							

							<div class="form-group">
								<label for="exampleInputEmail1">Nama Rekening</label>
								<input type="text"  class="form-control" placeholder="Masukkan Nama Pemilik Rekening" name="nama" required="">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Nomor Rekening</label>
								<input type="text"  class="form-control" placeholder="Masukan Nomor Rekening" name="nomor" id="nomor" required="" minlength="8" maxlength="16">
							</div>

							<input type="submit" id="submit_form" style="display: none" name="tambah_rekening">
							<center><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="tambah()">Tambah Rekening</button></center>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-8 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">List Rekening Bank</h4>
					<div class="card-content">
						<div class="form-group">
							<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Bank</th>
										<th>Nama Rekening</th>
										<th>Nomor Rekening</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rekening->result() as $key => $value): $no = $key + 1; ?>
										<tr>
										<td><?=$no?></td>
										<td><?=$value->jenis_bank?></td>
										<td><?=$value->nama_bank?></td>
										<td><?=$value->nomor_bank?></td>
										<td align="center">
											<a href="<?=base_url()?>admin/rekening/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Edit Rekening"><i class="ico fa fa-file-text-o"></i></button></a>
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