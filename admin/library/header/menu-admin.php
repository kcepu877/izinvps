               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a href="<?= base_url('') ?>" class="iq-waves-effect"><i class="fa fa-home iq-arrow-left"></i><span>Halaman Admin</span></a>
                     </li>
                     <li>
                        <a href="#services" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-archive iq-arrow-left"></i><span>Layanan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="services" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('service/') ?>">• Home</a></li>
                           <li><a href="<?= base_url('service/category') ?>">• Kategori</a></li>
                           <li><a href="<?= base_url('service/voucher') ?>">• Voucher</a></li>
                           <li><a href="<?= base_url('service/profit') ?>">• Profit</a></li>
                           <li><a href="<?= base_url('shop/') ?>">• Produk Shop</a></li>
                           <li><a href="<?= base_url('service/biaya-trx') ?>">• Biaya Admin</a></li>
                           <li><a href="<?= base_url('donasi/category') ?>">• Kategori Donasi</a></li>
                           <li><a href="<?= base_url('donasi/') ?>">• Layanan Donasi</a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#pengguna" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-user iq-arrow-left"></i><span>Pengguna</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="pengguna" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('users') ?>">• List Pengguna</a></li>
                           <li><a href="<?= base_url('users-blacklist') ?>">• Blacklist Pengguna</a></li>
                           <li><a href="<?= base_url('users/verify') ?>">• Kelola Verifikasi Premium</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Deposit" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-wallet iq-arrow-left"></i><span>Deposit</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Deposit" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('deposit/') ?>">• Home</a></li>
                           <li><a href="<?= base_url('deposit/method') ?>">• Metode Deposit</a></li>
                           <li><a href="<?= base_url('payment/account_bank') ?>">• Account Deposit</a></li>
                           <li><a href="<?= base_url('deposit/report') ?>">• Laporan</a></li>
                           <li><a href="<?= base_url('deposit/transfer') ?>">• Transfer</a></li>
                           <li><a href="<?= base_url('deposit/voucher') ?>">• Voucher</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Transaction" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-receipt iq-arrow-left"></i><span>Transaksi</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Transaction" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('order/') ?>">• Transaksi</a></li>
                           <li><a href="<?= real_base_url('page/ranking') ?>">• Ranking</a></li>
                           <li><a href="<?= base_url('order/manual') ?>">• Transaksi Manual</a></li>
                           <li><a href="<?= base_url('order/report') ?>">• Laporan</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#tournament-game" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-trophy iq-arrow-left"></i><span>Tournament Game</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="tournament-game" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('events/tournament-game/') ?>">• Publish Event</a></li>
                           <li><a href="<?= base_url('events/tournament-game/game') ?>">• Buat Tournament Game</a></li>
                           <li><a href="<?= base_url('events/tournament-game/data') ?>">• Data Tournament Game</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#point-rewards" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-gift iq-arrow-left"></i><span>Hadiah Point</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="point-rewards" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('point-rewards/rewards') ?>">• Data Hadiah</a></li>
                           <li><a href="<?= base_url('point-rewards/claimed') ?>">• Data Klaim</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Log" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-history iq-arrow-left"></i><span>Log</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Log" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('log/account') ?>">• Pengguna</a></li>
                           <li><a href="<?= base_url('log/mutation') ?>">• Mutasi</a></li>
                           <li><a href="<?= base_url('log/komisi') ?>">• Komisi</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#provider" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-server iq-arrow-left"></i><span>Provider</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="provider" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('service/provider') ?>">• Provider</a></li>
                           <li><a href="<?= base_url('service/action-provider') ?>">• Action Provider</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Bank" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-credit-card iq-arrow-left"></i><span>Bank Mutasi</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Bank" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('payment/bca') ?>">• BCA</a></li>
                           <li><a href="<?= base_url('payment/bni') ?>">• BNI</a></li>
                           <li><a href="<?= base_url('payment/ovo') ?>">• OVO</a></li>
                           <li><a href="<?= base_url('payment/gopay') ?>">• GOPAY</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#setting-api" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-cog iq-arrow-left"></i><span>Setting Api</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="setting-api" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?= base_url('payment/payment') ?>">• Payment Gateway</a></li>
                           <li><a href="<?= base_url('other/whatsapp') ?>">• WhatsApp Gateway</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#Other" class="iq-waves-effect" data-toggle="collapse"><span class="ripple rippleEffect"></span><i class="fas fa-network-wired iq-arrow-left"></i><span>Lainnya</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="Other" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                         <!--  <li><a href="<?= base_url('payment/atlantic') ?>">• Atlantic Group</a></li> -->
                           <li><a href="<?= base_url('other/premium') ?>">• Pengaturan Premium & Basic</a></li>
                           <li><a href="<?= base_url('news/') ?>">• Informasi</a></li>
                           <li><a href="<?= base_url('news-promo/') ?>">• Berita And Promo</a></li>
                           <li><a href="<?= base_url('other/slider') ?>">• Fitur</a></li>
                           
                           <li><a href="<?= base_url('other/text') ?>">• Notifikasi</a></li>
                           <li><a href="<?= base_url('other/website') ?>">• Website</a></li>
                           <li><a href="<?= base_url('other/mailer') ?>">• Mailer</a></li>
                           <li><a href="<?= base_url('contact/') ?>">• Contact</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card bg-primary rounded">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <div class="image"><img src="<?= assets('images/page-img/side-bkg.png') ?>" alt=""></div>
                           <a href="<?= base_url('auth/logout') ?>" class="btn btn-white w-100  mt-4 text-primary viwe-more">Logout</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mt-4"></div>
               