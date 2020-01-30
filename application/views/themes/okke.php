<div class="navbar">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <?php
            $keranjang = '<i class="fas fa-shopping-cart fa-2x"></i>' . $this->cart->total_items() . ''
            ?>

            <?php echo anchor('home/detail_keranjang', $keranjang) ?>
        </li>
    </ul>
    <div class="topbar-divider d-none d-sm-block"></div>
    <ul class="nav navbar-nav navbar-right">
        <?php if ($this->session->userdata('username')) { ?>
            <li>
                <div>Selamat Datang <?= $this->session->userdata('username') ?></div>
            </li>

            <li class="ml-2"><?= anchor('auth/logout', 'logout'); ?></li>
        <?php } else { ?>
            <li><?= anchor('auth/login', 'login'); ?></li>
        <?php } ?>

    </ul>
</div>

</ul>

</nav>