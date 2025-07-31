<?php
require '../RGShenn.php';
require _DIR_('library/session/user');
$page = 'Akun Saya';
$pengeluaran = $call->query("SELECT SUM(mutation.amount) AS total FROM mutation WHERE type = '-' AND user = '$sess_username' AND kategori IN ('Transaksi', 'Deposit', 'Lainnya', 'Tarik Komisi')")->fetch_assoc()['total'];
$pemasukkan  = $call->query("SELECT SUM(mutation.amount) AS total FROM mutation WHERE type = '+' AND user = '$sess_username' AND kategori IN ('Transaksi', 'Deposit', 'Lainnya', 'Tarik Komisi')")->fetch_assoc()['total'];
require _DIR_('library/header/user');
?>

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section rgs-bg-texture profile">
            <div class="profile-head">
                <? if( $data_user['status_photo'] == 'Yes' ): ?>
                <div class="avatar mr-0">
                    <img src="<?= assets('images/user/'.$data_user['photo'].'').'?'.time() ?>" class="imaged w64 rounded">
                </div>
                <? else: ?>
                <div class="avatar mr-0">
                    <img src="<?= assets('images/user/default.jpg').'?'.time() ?>" class="imaged w64 rounded">
                </div>
                <? endif ?>
                <div class="in mt-1">
                    <? if($data_user['level'] == 'Basic') : ?>
                    <h3 class="name text-light m-0 bold"><?= $data_user['name'] ?></h3>
                    <? endif; ?>
                    <? if($data_user['level'] == 'Admin') : ?> 
                    <h3 class="name text-light m-0 bold"><?= $data_user['name'] ?> <img src="<?= assets('images/user/pre.svg').'?'.time() ?> "width="10px" height="10px"></h3>
                    <? endif; ?>
                    <? if($data_user['level'] == 'Premium') : ?> 
                    <h3 class="name text-light m-0 bold"><?= $data_user['name'] ?> <img src="<?= assets('images/user/pre.svg').'?'.time() ?> "width="10px" height="10px"></h3>
                    <? endif; ?>
                    
                    <h5 class="subtext text-light"><?= explode(substr($data_user['phone'], '4', '4'), $data_user['phone'])['0'].'&bull;&bull;&bull;&bull;'.explode(substr($data_user['phone'], '4', '4'), $data_user['phone'])['1'] ?></h5>
                    <!--
                    <? if($data_user['level'] == 'Basic') : ?>
                    <a href="<?= base_url('account/upgrade.php') ?>" class="btn btn-success btn-sm mt-1">
                        <ion-icon name="rocket"></ion-icon>
                        Upgrade Ke Premium
                    </a>
                    <? endif; ?>
                    -->
                </div>
            </div>
        </div>
        
        <ul class="listview image-listview">
            <li class="profile-menu">
                <div class="money-info">
                    <a href="#" class="item">
                        <div class="icon-box bg-success">
                            <ion-icon name="trending-up"></ion-icon>
                        </div>
                        <div class="in">
                            <div class="title">Uang Masuk</div>
                            <div class="subtitle text-blue">Rp <?= currency($pemasukkan) ?></div>
                        </div>
                    </a>
                    <a href="#" class="item">
                        <div class="icon-box bg-danger">
                            <ion-icon name="trending-down-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div class="title">Uang Keluar</div>
                            <div class="subtitle text-blue">Rp <?= currency($pengeluaran) ?></div>
                        </div>
                    </a>
                </div>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('deposit/') ?>" class="item">
                    <div class="icon-box bg-transparent">
                        <ion-icon name="cash-outline" class="text-primary"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Saldo</div>
                        <span class="text-primary">Rp <?= currency($data_user['balance']) ?></span>
                    </div>
                </a>
            </li>
            <li>
                <!--
                <a href="<?= base_url('premium/') ?>" class="item">
                    <div class="icon-box bg-transparent">
                        <ion-icon name="ribbon-outline" class="text-success"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Level</div>
                        <span class="text-success"><?= $data_user['level'] ?></span>
                    </div>
                </a>
            </li>
            -->
            <li class="profile-menu">
                <a href="<?= base_url('account/card') ?>" class="item">
                    <div class="icon-box bg-transparent">
                        <ion-icon name="card" class="text-warning"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Kartu Saya</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="listview-title pb-0">Kemitraan</div>
        <ul class="listview image-listview">
            <li class="profile-menu">
                <a href="<?= base_url('deposit/transfer') ?>" class="item">
                    <div class="in">
                        <div>Transfer</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('deposit/voucher') ?>" class="item">
                    
                    <div class="in">
                        <div>Voucher</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('premium/') ?>" class="item">
                    
                    <div class="in">
                        <div>Referral</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('page/riwayat') ?>" class="item">
                    
                    <div class="in">
                        <div>Riwayat</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="listview-title pb-0">Pengaturan Aplikasi</div>
        <ul class="listview image-listview">
            <li class="profile-menu">
               <a href="<?= base_url('account/settings') ?>" class="item">
                    <div class="in">
                        <div>Pengaturan Profil</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <div class="item">
                    <div class="in">
                        <div>Versi App</div>
                        <span class="text-muted fs-normal">5.1.1</span>
                    </div>
                </div>
            </li>
        </ul>
         <div class="listview-title pb-0">Informasi Umum</div>
         <ul class="listview image-listview">
            <li class="profile-menu">
                <a href="<?= base_url('page/help-center.php') ?>" class="item">
                    <div class="in">
                        <div>Pusat Bantuan</div>
                    </div>
                </a>
            </li>
            <!--
            <li>
                <a href="<?= base_url('page/about-us.php') ?>" class="item">
                    <div class="in">
                        <div>Tentang Kami</div>
                    </div>
                </a>
            </li>
            -->
            <li class="profile-menu">
                <a href="<?= base_url('page/terms-conditions.php') ?>" class="item">
                    <div class="in">
                        <div>Syarat & Ketentuan</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('page/privacy-policy.php') ?>" class="item">
                    <div class="in">
                        <div>Kebijakan Privasi</div>
                    </div>
                </a>
            </li>
            <li class="profile-menu">
                <a href="<?= base_url('page/contact.php') ?>" class="item">
                    <div class="in">
                        <div>Hubungi Kami</div>
                    </div>
                </a>
            </li>
            <!--<? if( $data_user['level'] == 'Admin' ): ?>
            <li class="profile-menu">
                <a href="<?= base_url('admin/') ?>" class="item">
                    <div class="in">
                        <div>Halaman Admin</div>
                    </div>
                </a>
            </li>
            <? endif ?>-->
        </ul>
        <div class="m-2 mb-3">
            <div class="form-group">
                <a href="<?= base_url('auth/logout.php') ?>" class="btn rounded btn-danger btn-rounded btn-block btn-lg">Log Out</a>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

<?php require _DIR_('library/footer/user') ?>