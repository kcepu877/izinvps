<?php
require '../RGShenn.php';
require _DIR_('library/session/user');
require 'action.php';
$page = isset($_SESSION['success']) ? 'Pembayaran Berhasil' : 'Token PLN';
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
                            <div class="in">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nomor Meter</label>
                                        <input type="number" class="form-control" placeholder="Masukkan Nomor Kartu" name="data" id="data"/>
                                        <br>
                                        <button type="button" class="btn btn-primary" id="check-subscribe-button">Check</button>
                                        <!--<i class="clear-input">-->
                                        <!--    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>-->
                                        <!--</i>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="kategori">
                        
                    </li>
                    <div id="check-pln-subscribe"></div>
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

<script>
function checkSubscribe() {
    $.ajax({
        url: "<?= ajaxlib('check-pln-subscribe.php') ?>",
        data:'data='+$("#data").val(),
        type: "POST",
        success:function(data){
            $("#check-pln-subscribe").html(data);
            getServiceKategori();
        },
        error:function ()  {}
    });
}

function getServiceKategori() {
    var data = $("#data").val();
    $.ajax({
        type: 'POST',
        data: 'data=' + data + '&type=token-pln&csrf_token=<?= $csrf_string ?>',
        url: '<?= ajaxlib('service-kategori.php') ?>',
        dataType: 'html',
        success: (msg) => {
            $("#kategori").html(msg);
            $(".rgs-list-layanan").hide();
        }
    });
}
$(document).ready(function() {
    const checkButton = document.getElementById('check-subscribe-button');
    checkButton.addEventListener("click", checkSubscribe);
})
</script>

<script type="text/javascript">
$(document).ready(function() {
    
    // $("#data").keyup(function() {
    //     var data = $("#data").val();
    //     $.ajax({
    //         type: 'POST',
    //         data: 'data=' + data + '&type=token-pln&csrf_token=<?= $csrf_string ?>',
    //         url: '<?= ajaxlib('service-kategori.php') ?>',
    //         dataType: 'html',
    //         success: (msg) => {
    //             $("#kategori").html(msg);
    //             $(".rgs-list-layanan").hide();
    //         }
    //     });
    // });
});
</script>