<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if ($keranjang = $this->cart->contents())
				{
					foreach ($keranjang as $item)
					{
						$grand_total = $grand_total + $item['subtotal'];
					}

				echo "Total belanja anda: Rp. ".number_format($grand_total,0,',','.');
				  ?>
			</div><br><br>
			<h3 class="text-center">Input Pembayaran</h3>
			<form method="post" action="<?php echo base_url() ?>home/konfirmasi">

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="no_tlp" placeholder="Nomor Telepon Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Jasa pengiriman</label>
					<select class="form-control">
						<option>JNE</option>
						<option>TIKI</option>
						<option>KANTOR POS</option>
					</select>
				</div>

				<div class="form-group">
					<label>Pilih BANK</label>
					<select class="form-control">
						<option>BRI</option>
						<option>BNI</option>
						<option>BCA</option>
					</select>
				</div>

				<button type="submit" class="btn btn-sm btn-dark mb-4">PESAN</button>

			</form>
			<?php 
			}else{
				echo "Keranjang Belanja Anda Kosong";
			} ?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>