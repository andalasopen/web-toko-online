<div class="container-fluid">
	<div class="card">
		<div class="card-header">Detail Produk</div>
		<div class="card-body">

			<?php
			if (!empty($barang));
			foreach ($barang as $brg) : ?>
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo base_url() . '/gambar/' . $brg->gambar ?>" class="card-img-top">
					</div>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<td>Harga</td>
								<td><strong>
										<div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></div>
									</strong></td>
							</tr>

							<tr>
								<td>Nama Produk</td>
								<td><strong><?php echo $brg->nama_brg ?></strong></td>
							</tr>

							<tr>
								<td>Keterangan</td>
								<td><strong><?php echo $brg->keterangan ?></strong></td>
							</tr>

							<tr>
								<td>Kategori</td>
								<td><strong><?php echo $brg->kategori ?></strong></td>
							</tr>

							<tr>
								<td>Stok</td>
								<td><strong><?php echo $brg->stok ?></strong></td>
							</tr>

							<tr>
								<td>Size</td>
								<td><strong>L M S</strong></td>
							</tr>
						</table>
						<?php echo anchor('home/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary mb-4"><i class="fad fa-cart-plus"></i> Add</div>') ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>