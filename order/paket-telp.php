<?php
require '../RGShenn.php';
require _DIR_('library/session/user');
require 'action.php';
$page = isset($_SESSION['success']) ? 'Pembayaran Berhasil' : 'Paket SMS&Telepon';
require _DIR_('library/header/user');
?>

<? if(isset($_SESSION['success'])) :  ?>

    <? require _DIR_('order/result') ?>

<? unset($_SESSION['success']); else: ?>

    <!-- App Capsule -->
    <div id="appCapsule" class="rgs-order">
        <div class="section service">
            <div class="wide-block-service">

                <ul class="listview image-listview no-line no-space flush">
                    <li>
                        <div class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="create-outline"></ion-icon>
                            </div>
                        <div class="item">
                            <div class="in">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nomor Tujuan</label>
                                        <input type="number" class="form-control" placeholder="Masukkan Nomor Tujuan" name="data" id="data">
                                        <i class="input">
                                            <img src="<?= assets('images/operator-icon/transparan.png').'?'.time() ?>" class="input-image" id="RGSLogo">
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="kategori">
                        
                    </li>
                </ul>

            </div>
        </div>

        <div class="section rgs-list-layanan" id="service">
            <? require _DIR_('library/session/result-mobile') ?>
        </div>
    </div>
    <!-- * App Capsule -->
<? endif ?>   
<?php require _DIR_('library/footer/user') ?>
<script type="text/javascript">
$(document).ready(function() {
    $("#data").keyup(function() {
        var target = $("#data").val();
        $.ajax({
            type: 'POST',
            data: 'phone=' + target + '&type=paket-telepon&csrf_token=<?= $csrf_string ?>',
            url: '<?= ajaxlib('service-simcard.php') ?>',
            dataType: 'json',
            success: function(msg) {
                $("#service").html(msg.service);
                $("#RGSLogo").attr('src', msg.image);
            }
        });
    });
});
</script>