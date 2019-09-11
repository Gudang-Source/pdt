<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card-box">
				<h4 style="margin-top:-10px">Pencarian</h4>
				<hr>
				<?php echo $this->load->view('home/side') ?>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card-box">
				<h4 style="margin-top:-10px">Data Peraturan</h4>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Instansi</th>
								<th>Nomor</th>
								<th>Tentang</th>
								<th>
									<center><i class="fa fa-download"></i></center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($rules)) {
								$i = $jlhpage + 1;
								foreach ($rules as $row) :
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row['uke_2_name'] ?></td>
										<td><?php echo $row['rule_no'] ?></td>
										<td><a href="<?php echo page_url($row) ?>" class="text-danger"><?php echo $row['rule_about'] ?></a></td>
										<td>
											<?php if(isset($row['rule_file'])): ?>
											<a href="<?php echo upload_url('publish/' . $row['rule_file']) ?>" class="text-danger"><i class="mdi mdi-file-pdf" style="font-size:25px"></i></a>
											<?php endif ?>
										</td>
									</tr>
								<?php endforeach;
								} else {
									?>
								<tr id="row">
									<td colspan="5" align="center">Data Kosong</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</div>