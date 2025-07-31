<?php
require '../RGShenn.php';
require _DIR_('library/session/user');
$page = 'Daftar Layanan';
require _DIR_('library/header/user');
?>
<style>
    .app-menu .item strong {
        margin-top: 8px
    }
    a {
        color:#4F5050;
    }
    .title-bills {
        font-size:13.5px;
        font-weight:600;
    }
    .sub-bills {
        font-size:9px;
    }
    .plus-bills {
        font-size:20px;
        font-weight:600;
    }
    .title {
        font-size:14px;
        font-weight:bold;
    }
    .image-listview > li .item .in {
        display: block;
        align-items: normal;
        width: 100%;
        color:#4F5050;
    }
</style>
    <!-- App Capsule -->
        <div id="appCapsule" class="pb-0">
        <div class="section service">
        <div class="wide-block-service">
            <div class="p-2 pb-2">
                <div class="title">Uang Elektronik</div>
                <div style="font-size: 12px; opacity: .576">Beli semua kebutuhan Uang Elektronik, hanya di <?= $_CONFIG['title']; ?></div>
            </div>
            <div class="app-menu mt-0">
                    <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('BRI BRIZZI') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                    <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('MANDIRI E TOLL') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('TAPCASH BNI') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <a href="#" class="item"></a>
            </div>
        </div>
        <div class="section full bg-white pl-1 pr-1 pb-3 mb-1">
            <div class="p-2 pb-2">
                <div class="title">Dompet Digital</div>
                <div style="font-size: 12px; opacity: .576">Solusi semua pembayaran Elektronik, hanya di <?= $_CONFIG['title']; ?></div>
            </div>
            <div class="app-menu mt-0">
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('SHOPEE PAY') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('MITRA SHOPEE') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('GO PAY') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('GO PAY DRIVER') AND kategori = 'Driver' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                </div>
                <div class="app-menu mt-3">
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('GRAB') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('GRAB DRIVER') AND kategori = 'Driver' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('OVO') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('DANA') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
            </div>
            <div class="app-menu mt-3">
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('SAKUKU') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('LINKAJA') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('I.SAKU') AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
                <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND brand IN ('MAXIM DRIVER') AND kategori = 'Driver' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                <a href="<?= base_url('order/emoney/'.$code) ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" width="50px">
                        <strong><?= $row['brand'] ?></strong>
                    </div>
                </a>
                    <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- * App Capsule -->

<?php require _DIR_('library/footer/user') ?>
