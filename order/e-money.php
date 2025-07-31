<?php
require '../RGShenn.php';
require _DIR_('library/session/user');
$page = 'E-Money';
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
 <!---       <div id="appCapsule" class="pb-0">
        <div class="section service">
        <div class="wide-block-service">
            <div class="p-2 pb-2">
                <div class="title">Isi Ulang</div>
                <div style="font-size: 12px; opacity: .576">Dengan <?= $_CONFIG['title']; ?> isi ulang menjadi lebih mudah</div>
            </div>
            <div class="app-menu mt-0">
                <a href="<?= base_url('order/pulsa-reguler') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/pulsa.png') ?>" width="55px" height="55px">
                        <strong>Pulsa Reguler</strong>
                    </div>
                </a>
            </div>
           </div>
          </div>
          </div> ---!>

    <!-- App Capsule -->
    <div id="appCapsule" class="rgs-game extra-header-active">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Semua" role="tabpanel">
                <ul class="listview image-listview">
                    <?php 
                    $search = $call->query("SELECT * FROM category WHERE type = 'e-money' ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['code'])));
                    ?>
                    <li>
                        <a href="<?= base_url('order/emoney/'.$code) ?>"class="item">
                            <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" class="image">
                            <div class="in">
                                <div><?= $row['code'] ?></div>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="EMoney" role="tabpanel">
                <ul class="listview image-listview">
                    <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND kategori = 'Umum' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace('.', '=', str_replace(' ', '-', strtolower($row['brand'])));
                    ?>
                    <li>
                        <a href="<?= base_url('order/emoney/'.$code) ?>"class="item">
                            <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" class="image">
                            <div class="in">
                                <div><?= $row['brand'] ?></div>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="Driver" role="tabpanel">
                <ul class="listview image-listview">
                    <?php 
                    $search = $call->query("SELECT * FROM srv WHERE type = 'e-money' AND kategori = 'Driver' GROUP BY brand ORDER BY name ASC");
                    if($search->num_rows == FALSE) { 
                        print '<div class="alert alert-danger text-left fade show mr-2 ml-2 mt-2" role="alert">Tidak Ada Layanan Yang Tersedia!</div>';
                    }
                    while($row = $search->fetch_assoc()) { 
                    $code = str_replace(' ','-',strtolower($row['brand']));
                    ?>
                    <li>
                        <a href="<?= base_url('order/emoney/'.$code) ?>"class="item">
                            <img src="<?= assets('images/emoney-icon/'.$code.'.jpg').'?'.time() ?>" alt="<?= $code ?>" class="image">
                            <div class="in">
                                <div><?= $row['brand'] ?></div>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->
    
<?php require _DIR_('library/footer/user') ?>