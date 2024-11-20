		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Daftar Pembeli</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>No Telepon</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i =1; foreach ($data_pembeli->result() as $key => $value): 
								?>
								<tr>
									<td><?=$i?></td>
									<td><?=$value->nama?></td>
									<td><?=$value->email?></td>
									<td><?=$value->no_telpon?></td>
									<td><?=$value->alamat?></td>
									<td align="center">
										<a href="<?=base_url()?>admin/daftar_pembeli/<?=$value->id?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>	
									</td>
								</tr>
								<?php $i++; endforeach ?>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>