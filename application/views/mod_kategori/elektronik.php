<div class="container-fluid">
  <div class="row">
    <?php foreach ($elektronik as $brg) : ?>
      <div class="card mb-2 ml-2" style="width: 10rem;">
        <a href="<?= base_url() . 'home/detail/' . $brg->slug ?>"><img src="<?php echo base_url() . '/gambar/' . $brg->gambar ?>" class="card-img-top" style="height:10rem;"></a>
        <div class="card-body">
          <h6 class="card-title"><?php echo $brg->nama_brg ?></h6>
        </div>
        <div class="card-foter text-center">
          <span class="badge badge-success mb-2">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></span><br>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>