<?php
require 'RGShenn.php';
if(!isset($_SESSION['user']) && !isset($_COOKIE['token']) && !isset($_COOKIE['ssid'])) {
        $ShennID = $_COOKIE['ssid'];
        $ShennUID = str_replace(['SHENN-A','AIY'],'',$ShennID) + 0;
        $ShennKey = $_COOKIE['token'];
        $ShennUser = $call->query("SELECT * FROM users WHERE id = '$ShennUID'")->fetch_assoc();

        $ShennCheck = $call->query("SELECT * FROM users_cookie WHERE cookie = '$ShennKey' AND username = '".$ShennUser['username']."'");
        if($ShennCheck->num_rows == 1) {
            $_SESSION['user'] = $ShennUser;
            redirect(0,visited());
            $call->query("UPDATE users_cookie SET active = '$date $time' WHERE cookie = '$ShennKey'");
        } else {
            redirect(0,base_url('auth/login'));
        }
} else {
    if((time() - $_SESSION['last_login_time']) > 3600000000000000000000007656755353429008898989543345678) {
        redirect(0,base_url('auth/logout'));
    } else {
    $_SESSION['last_login_time'] = time();
    require _DIR_('library/session/user');
    $page = 'Dashboard';
    require _DIR_('library/header/user');
?>
    <!-- App Capsule -->
    <style>
        .urgent-alert {
            color: #FFF;
            background: #135b8f5e;
            width: 100%;
            border-radius: 3px;
            padding: 6px 12px 6px 0;
            margin-bottom: 8px;
            display: none;
        }
        .urgent-alert.show {
            display: inline-flex;
        }
        .urgent-alert .icon{
            font-size: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 6px;
        }
        .marquee {
          width: 100%;
          overflow: hidden;
        }
        .urgent-alert .marquee {
            font-size: 13px;
        }
        .urgent-alert .marquee span:not(:last-child) {
            padding-right: 18px 
        }
        .infinite-menu .card:not(:last-child) {
            padding-right: 12px
        }
        .infinite-menu .card:last-child {
            padding-right: 1rem
        }
        .inifite-menu {
            margin-left: 16px;
        }
        .card.reward-poin {
            display: inline-flex;
        }
        .app-list {
            display: block;
            align-items: center;
            width: 100%;
            padding: 0 20px;
        }
        .app-list .sort-menu .menu {
            display: flex;
            padding-right: 5px;
        }
        .app-list > .menu {
            border-right: 2px solid #e1e1e1;
            padding-right: 5px
        }
        .app-list .btn {
            padding: 8px;
            font-size: 10px;
            height: 24px;
            font-weight: 600;
            width: 70px;
        }
        .app-list .sort-menu .menu:not(:first-child) {
            border-left: 2px solid #e1e1e1;
        }
        .app-list .sort-menu .menu .in {
            line-height: 16px;
        }
        .app-list .sort-menu .menu img {
            max-height: 20px;
            margin: 0 5px;

        }
        .app-list .sort-menu .menu .in .title {
            font-size: 12px;
            font-weight: 600;
        }
        .app-list .sort-menu .menu .in .subtitle {
            font-size: 11px;
            color: #909090;
        }
        .app-list .sort-menu {
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .app-menu .item .col {
            max-height: 56px

        }
        .rewards-bg {
            background-image: url("/library/assets/images/background/blue-flat.jpg") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        .section.home {
            background-image: url("/library/assets/images/background/20230227_021204.png") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            padding: 115px 0px 0px;
            margin-bottom: -10px;
        }
        .section-home, .top-left {
            position: absolute;
            top: 68px;
            left: 16px;
            font-size: 11px;
            font-weight: bold;
        }
        .section-home, .top-right {
            position: absolute;
            top: 68px;
            right: 16px;
            font-size: 11px;
            font-weight: bold;
        }
        .section-home, .top-balance {
            position: absolute;
            top: 90px;
            left: 16px;
            font-size: 17px;
            font-weight: bold;
        } 
        .section-home, .top-coin {
            position: absolute;
            top: 90px;
            right: 16px;
            font-size: 17px;
            font-weight: bold;
        }
        .section-home, span {
            position: absolute;
            top: 7px;
            left: 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .container {
            position: relative;
            text-align: center;
            color: white;
        }
        .listview {
            border:0px;
        }
        .card .listview > li:last-child .item {
            border-radius:0px;
        }
        
        .csdow {
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
        }
        .shadowproduk {
box-shadow: -5px -5px 9px rgba(255,255,255,0.45), 5px 5px 9px rgba(94,104,121,0.3);
}
    </style>
         <div class="section home">
            <div class="top-left text-muted text-light">
              <font style="font-size: 15px; color: #fff;">Saldo</font>
            </div>
            <div class="top-balance text-muted text-light">
               <font style="font-size: 15px; color: #fff;"> Rp. </font> <font style="font-size: 15px; color: #fff;"><b><?= currency($data_user['balance']) ?></b></font>
            </div>
            
            <div class="top-right text-muted text-light">
              <font style="font-size: 15px; color: #fff;">Poin</font>
            </div>
            <div class="top-coin text-muted text-light">
               <font style="font-size: 10px; color: #fff;"></font> <font style="font-size: 15px; color: #fff;"><b><?= currency($data_user['point']) ?></b></font>
            </div>
            <!--
            <div class="top-right text-muted text-light" style="font-size: 15px;">
                POIN <font style="color: #fff; font-size: 15px;"><?= currency($data_user['point']) ?></font>
            </div>
            -->
            <div class="card csdow" style="background : #4fb8b1; border-radius: 20px !important; margin: 15px !important; padding:13px;box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%); ">
                <div class="menu-list" style="border-top: 0; !important; color: white;">
                    <div class="app-menu mt-0">
                        <a href="/deposit" class="item">
                          <div class="col" style="font-size:10px">
                            <img src="/library/assets/images/header-new/top.png" style="width: 47px;height: 47px;"><strong style="color : white;">Top Up</strong>
                          </div>
                        </a>
                        <a href="/deposit/transfer" class="item">
                           <div class="col" style="font-size:10px">
                            <img src="/library/assets/images/icon/transfer.png" style="width: 47px;height: 47px;"><strong style="color : white;">Transfer</strong>
                           </div>
                       </a>
                       <a href="/page/riwayat" class="item">
                           <div class="col" style="font-size:10px">
                            <img src="library/assets/images/icon/mutasi.png" style="width: 47px;height: 47px;"><strong style="color : white;">Mutasi</strong>
                           </div>
                       </a>
                       <a href="/page/riwayat" class="item">
                           <div class="col" style="font-size:10px">
                            <img src="/library/assets/images/icon/riwayat.png" style="width: 47px;height: 47px;"><strong style="color : white;">Riwayat</strong>
                        </div>
                       </a>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <?php if($data_user['level'] === 'Admin'): ?>
            <a href="<?= base_url('account/premium') ?>">
                <div class="alert mt-2 mr-1 ml-1" role="alert" style="background: #c9b6f2; border-radius: 8px; text-decoration: none">
                    <div style="display: inline-flex; justify-content: space-between; align-items: center; width: 100%;">
                        <div style="display: inline-flex; justify-content: space-between; align-items: center;">
                            <ion-icon name="rocket-outline" style="font-size: 26px; padding-right: 12px;"></ion-icon>
                            <div class="in">
                                <div style="font-size: 14px; font-weight: 600;">Upgrade ke Akun Premium</div>
                                <div>Dapatkan keuntungan lebih banyak!</div>
                            </div>
                        </div>
                        <div style="position: absolute; right: 6px; font-size: 26px;"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                    </div>
                </div>
                </a>
                <?php endif; ?> 
                -->       
        <div id="appCapsule" class="bg-white" style="border-radius: 30px; padding:1px 10px 24px 10px;">
            <div class="section mb-2 mt-1">
                <? require _DIR_('library/session/result-mobile') ?>
            </div>
            
            <a href="#">
                <div class="alert alert-outline p-1 mt-2 mr-2 ml-2 pb-1 text-white" role="alert" style="border-radius: 50px; text-decoration: none;">
                    <div style="display: inline-flex; justify-content: space-between; align-items: center; width: 100%; backgroud: white;">
                        <div style="display: inline-flex; justify-content: space-between; align-items: center;">
                            <div class="icon">
                                <ion-icon name="notifications" style="font-size: 26px; padding-right: 12px; color: #4fb8b1;"></ion-icon>
                            </div>
                            <div class="in">
                                <marquee scrollamount="10">
                             <font style = " font-size: 15px; color: #4fb8b1;"> <?= conf('text-marquee',c1) ?>  </font> 
	                            </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <div class="menu-list mt-1" style="border-top: 0 !important; border-radius: 20px !important;">
                <div class="app-menu">
                    <a href="<?= base_url('order/pulsa-reguler') ?>" class="item">
                        <div class="col"> 
                        <span class="btn btn-danger btn-status rounde">Promo</span>
                            <img src="<?= assets('mobile/iconhome/pulsa.png') ?>" width="60px" height="60px">
                            <strong style="color: #444444">Pulsa Reguler</strong>
                        </div>
                    </a>
                  
                    <a href="<?= base_url('order/pulsa-transfer') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/pulsatf.png') ?>" width="60px" height="60px">
                            <strong>Pulsa Transfer</strong>
                        </div>
                    </a>
                    
                    <a href="<?= base_url('order/paket-internet') ?>" class="item">
                        <div class="col"> 
                            <span class="btn btn-danger btn-status rounde">Promo</span>
                            <img src="<?= assets('mobile/iconhome/data.png') ?>" width="60px" height="60px">
                            <strong style="color: #444444;">Paket Data</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/token-pln') ?>" class="item">
                        <div class="col"> 
                        <span class="btn btn-danger btn-status rounde text-center">Promo</span>
                            <img src="<?= assets('mobile/iconhome/pln.png') ?>" width="60px" height="60px">
                            <strong>Token PLN</strong>
                        </div>
                    </a>
                
                 <!---   <a href="<?= base_url('order/games') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/game.png') ?>" width="60px" height="60px">
                            <strong>Games</strong>
                        </div>
                    </a> ---!>
                    
                </div>
                <div class="app-menu mt-4 mb-2">
                    <a href="<?= base_url('order/ewallet') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/wallet.png') ?>" width="60px" height="60px">
                        <strong>E-Money</strong>
                    </div>
                    </a>
                       <a href="/order/paket-telp" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/smstelp.png') ?>" width="60px" height="60px">
                            <strong>Sms & Telp</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/voucher') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/vc.png') ?>" width="60px" height="60px">
                            <strong>Voucher Data</strong>
                        </div>
                    </a> <!--
                    <a href="<?= base_url('order/pascabayars/hp-pascabayar') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/icon/png/pascabayar.png') ?>" width="60px" height="60px">
                            <strong>Pascabayar</strong>
                        </div>
                    </a> -->
                    <div class="item"  data-toggle="modal" data-target="#menu">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/menu.png') ?>" width="60px" height="60px">
                            <strong>Lainnya</strong>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        <div class="modal fade action-sheet" id="menu" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="pr-5"></div>
                        <h5 class="modal-title">Pilih Produk</h5>
                    </div>
                    <div class="modal-body">
                                <div class="menu-list mt-1" style="border-top: 0 !important; border-radius: 20px !important;">
                <div class="app-menu">
                    <a href="<?= base_url('order/pulsa-reguler') ?>" class="item">
                        <div class="col"> 
                        <span class="btn btn-danger btn-status rounde">Promo</span>
                            <img src="<?= assets('mobile/iconhome/pulsa.png') ?>" width="60px" height="60px">
                            <strong style="color: #444444">Pulsa Reguler</strong>
                        </div>
                    </a>
                  <!--
                    <a href="<?= base_url('order/pulsa-transfer') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/icon/png/pulsa-transfer.png') ?>" width="60px" height="60px">
                            <strong>Pulsa Transfer</strong>
                        </div>
                    </a>
                    -->
                    <a href="<?= base_url('order/paket-internet') ?>" class="item">
                        <div class="col"> 
                            <span class="btn btn-danger btn-status rounde">Promo</span>
                            <img src="<?= assets('mobile/iconhome/data.png') ?>" width="60px" height="60px">
                            <strong style="color: #444444;">Paket Data</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/pulsa-transfer') ?>" class="item">
                        <div class="col"> 
                        <span class="btn btn-danger btn-status rounde text-center">Promo</span>
                            <img src="<?= assets('mobile/iconhome/pulsatf.png') ?>" width="60px" height="60px">
                            <strong>Pulsa Transfer</strong>
                        </div>
                    </a>
                
                 <a href="<?= base_url('order/paket-telp') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/smstelp.png') ?>" width="60px" height="60px">
                            <strong>Sms & Telp</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="app-menu mt-4 mb-2">
                    <a href="<?= base_url('order/token-pln') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/pln.png') ?>" width="60px" height="60px">
                        <strong>Token PLN</strong>
                    </div>
                    </a>
                       <a href="/order/ewallet" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/wallet.png') ?>" width="60px" height="60px">
                            <strong>E-Money</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/voucher') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/vc.png') ?>" width="60px" height="60px">
                            <strong>Voucher Data</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/games') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/game.png') ?>" width="60px" height="60px">
                            <strong>Game</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="app-menu mt-4 mb-2">
                    <a href="<?= base_url('order/pascabayars/pln-pascabayar') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/pln.png') ?>" width="60px" height="60px">
                        <strong>PLN Pascabayar</strong>
                    </div>
                    </a>
                       <a href="/order/pascabayars/pdam" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/pdam.png') ?>" width="60px" height="60px">
                            <strong>PDAM</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/pascabayars/gas-negara') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/gas.png') ?>" width="60px" height="60px">
                            <strong>Gas</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/pascabayars/pbb') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/pbb.png') ?>" width="60px" height="60px">
                            <strong>PBB</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="app-menu mt-4 mb-2">
                    <a href="<?= base_url('order/pascabayars/bpjs-kesehatan') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/bpjs.png') ?>" width="60px" height="60px">
                        <strong>BPJS Kesehatan</strong>
                    </div>
                    </a>
                       <a href="/order/pascabayars/internet-pascabayar" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/internetpasca.png') ?>" width="60px" height="60px">
                            <strong>Internet Pascabayar</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/pascabayars/multifinance') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/multif.png') ?>" width="60px" height="60px">
                            <strong>Multifinance</strong>
                        </div>
                    </a> 
                    <a href="<?= base_url('order/pascabayars/hp-pascabayar') ?>" class="item">
                        <div class="col">
                            <img src="<?= assets('mobile/iconhome/hppasca.png') ?>" width="60px" height="60px">
                            <strong>HP Pascabayar</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="app-menu mt-4 mb-2">
                    <a href="<?= base_url('order/voucher') ?>" class="item">
                    <div class="col">
                        <img src="<?= assets('mobile/iconhome/vc.png') ?>" width="60px" height="60px">
                        <strong>Voucher Lainnya</strong>
                    </div>
                    </a>
                    
                    <a href="#" class="item"></a>
                <a href="#" class="item"></a>
                <a href="#" class="item"></a>
                </div>
            </div>
            </div><br>
                  </br>  </div>
                </div>
            </div>
        </div>            
            
    
        <div class="section full mb-1 bg-white mt-1 pt-1 pb-2" style="padding-left: 10px;padding-right: 10px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="section-title" style="padding:6px;">Info & Promo Spesial</div>
            <a href="<?= base_url('page/info') ?>" class="text-primary" style="font-weight:600;padding:6px;">Lihat Semua</a>
            <!-- <a href="<?= base_url('page/news') ?>" class="text-primary" style="font-weight:600;padding:6px;">Lihat Semua</a> -->
        </div>
        <?php 
        $slider = $call->query("SELECT * FROM news_promo ORDER BY id ASC LIMIT 5");
        if($slider->num_rows !== 0):
        ?>
            <!--<div class="carousel-single owl-carousel owl-theme">-->
            <div class="carousel-full owl-carousel owl-theme">
                <?php while($slide = $slider->fetch_assoc()): ?>
                <div class="item" style="margin-left: 6px;margin-right: 6px;">
                    <img src="<?= $slide['banner'] ?>" alt="Mauaja Image" class="imaged w-70">
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
        <?php $rewards = $call->query("SELECT * FROM modules_point_rewards WHERE available = '1' ORDER by point ASC LIMIT 10"); ?>
        <?php if($rewards->num_rows > 0): ?>
        <div class="section full bg-white mt-1 pb-1">
            <div class="d-flex justify-content-between align-items-center pr-2">
            
                <a href="<?= base_url('premium/tukar-poin') ?>" class="text-primary" style="font-weight: 600;"> </a></a>
            </div>
            <div class="card mt-1 rewards-bg bg-primary">
                <div class="card-body p-2 pb-0">
                    <div class="card-title text-white" style="font-size: 14px; display: inline-flex;">
                        <div style="text-transform: uppercase;">Poin Anda</div>
                        <div class="ml-1" style="background: var(--color-theme-secondary); padding: 0px 7px; border-radius: 30px;">
                            <?= currency($data_user['point']) ?>
                        </div>
                    </div>
                    <div class="card-subtitle text-white" style="text-transform: none; line-height: 16px">
                        Tukarkan Poin Anda dengan Hadiah Menarik berikut :
                    </div>
                </div>
                <div class="infinite-menu p-2 pt-0 pl-0 ml-2 mt-1">
                    <?php while($data_rewards = $rewards->fetch_assoc()): ?>
                    <a href="<?= base_url('premium/tukar-poin') ?>" class="card reward-poin bg-transparent no-border m-0" style="color: #FFF !important">
                        <div class="card-body p-0" style="max-width: 100px">
                            <div>
                                <img src="<?= assets('images/rewards-icon/'.$data_rewards['photo']); ?>" alt="Rewards Icon" style="min-height: 70px; max-height: 70px; max-width: 100px; width: 100px; border-radius: 6px">
                            </div>
                            <div style="padding-top: 4px">
                                <div style="font-size: 14px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $data_rewards['name']; ?></div>
                                <div style="background: var(--color-theme-secondary); border-radius: 80px; margin-top: 4px; padding: 0px 7px; width: max-content; font-size: 12px;"><?= currency($data_rewards['point']); ?> Poin</div>
                            </div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    
    <div class="section full mb-1 bg-white mt-1 pt-1 pb-2" style="padding-left: 10px;padding-right: 10px;">
            <div class="section-title"><h4>Hanya Untukmu<b></b></h4> <a href="/referral" class="text-orange" style="font-weight:600;padding:6px;">Lihat</a></div>
            <p class="text-dark" style="font-size: 12px; position: absolute; left: 23px; margin-top: -20px;">Masih butuh lebih? Cari aja di sini!</p>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-12">
                        <a class="text-decoration-none" href="/referral">
                        <div class="table-responsive" style="height: 88%;">
                            <table class="table table-borderless bg-primary">
                                <tr>
                                    <th style="max-width: 115px;"><img src="<?= assets('mobile/img/svg/had.svg') ?>" style="width:110px;"></th>
                                    <td>
                                        <p style="font-size:16px; font-weight:bold;margin-top: 10px;margin-bottom:3px;color:white;">Kode Referral</p>
                                        <p style="font-size:14px; color:white;">Bagikan kode referral supaya untung bareng teman-temanmu!</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        
        <div class="section full mb-1 bg-white mt-1">
        <div class="section-title"style="font-size: 14px;">Kenali Keunggulan <?= $_CONFIG['title'] ?> Lebih Dekat</div>
        <?php 
        $slider = $call->query("SELECT * FROM slider WHERE status = '1' AND type = 'Vertical' ORDER BY id ASC LIMIT 10");
        if($slider->num_rows !== 0):
        ?>
            <div class="carousel-multiple owl-carousel owl-theme">
                <?php while($slide = $slider->fetch_assoc()): ?>
                <div class="item">
                    <img src="<?= assets('images/slider/'.$slide['img']) ?>" alt="Mau Banner" class="imaged w-100">
                </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>
        </div>
        
        <div class="section full rgs-info bg-white" style="padding-bottom: 80px; margin-top: 29px"></div>
            <!--
            <div class="section-title">Informasi Terbaru</div>
            <?php
            $search = $call->query("SELECT * FROM information ORDER BY id DESC LIMIT 5");
            if($search->num_rows == false) {
                print '<div class="alert alert-primary text-left fade show mt-2 mb-2 mr-2 ml-2" role="alert">Belum Ada Informasi Terbaru</div>';
            } else {
            while($row = $search->fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <ion-icon name="megaphone-outline" class="text-warning"></ion-icon>
                    <span class="title"><?= $row['title'] ?></span>
                    <span class="date"><?= format_date('en',$row['date']) ?></span>
                    <span class="content"><?= nl2br(substr($row['content'],0,+100).'.') ?> <a href="<?= base_url('page/news-detail/'.$row['id']) ?>">Selengkapnya.</a> </span>
                </div>
            </div>
            <? } ?>

            <div class="text-center">
                <a href="<?= base_url('page/info') ?>" class="btn btn-primary">Lihat Semua Informasi</a>
            </div>
            <? } ?>

        </div>
        -->

    </div>
    <div class="modal fade action-sheet inset" id="komisiModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Total Komisi</h5>
                </div>
                <div class="modal-body">
                    <div style="padding: 1rem; text-align: center;">
                        <div class="alert alert-outline-primary" role="alert">
                            <div style="font-weight: 500; padding-bottom: 6px;">Komisi Anda</div>
                            <div style="font-size: 18px; font-weight: 600;">Rp <?= currency($data_user['komisi']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <script>
        $(document).ready(function() {
            $('.urgent-alert').addClass('show');
        });
    </script>
<?php } } require _DIR_('library/footer/user') ?>