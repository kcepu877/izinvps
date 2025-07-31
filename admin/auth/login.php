<?php
require '../../RGShenn.php';
require _DIR_('library/session/auth');

if(isset($_POST['login'])) {
    $data = array('user_login', 'pin');
    $ip = client_ip();
    if (check_input($_POST, $data) == false) {
    	$_SESSION['result'] = ['type' => false,'message' => 'Input tidak sesuai.'];
    } else {
        $input_post = array(
    		'user_login' => mysqli_real_escape_string($call, trim($_POST['user_login'])),
    		'pin' => mysqli_real_escape_string($call, trim($_POST['pin'])),
    	);
    	if (check_empty($input_post) == true) {
    	    $_SESSION['result'] = ['type' => false,'message' => 'Input tidak boleh kosong.'];
    	} else if($result_csrf == false) {
            $_SESSION['result'] = ['type' => false,'message' => 'System error, please try again later.'];
    	} else {     
    	    if ($call->query("SELECT * FROM users WHERE phone = '".$input_post['user_login']."'")->num_rows == 1) {
    	        $data_user = $call->query("SELECT * FROM users WHERE phone = '".$input_post['user_login']."'")->fetch_assoc();
                $_SESSION['pin'] = ['data' => $data_user];
    	        if (check_bcrypt($input_post['pin'], $data_user['pin']) == true) {
    	            setcookie('ssid', 'SHENN-A'.$data_user['id'].'AIY', $cookie_time, '/', $_SERVER['HTTP_HOST']);
                    setcookie('token', $ShennCookie, $cookie_time, '/', $_SERVER['HTTP_HOST']);
    	            $_SESSION['user'] = $data_user;
    	            $call->query("INSERT INTO logs VALUES ('', '".$data_user['username']."', 'login', '$ip', '$datetime')");
    	            $_SESSION['last_login_time'] = time();
    	            redirect(0, base_url());
    	        } else {
    	            $_SESSION['result'] = ['type' => false,'message' => 'PIN Keamanan Tidak Valid'];
    	        }
    	    } else {
    	        $_SESSION['result'] = ['type' => false,'message' => 'No.HP Salah'];
    	    }
    	}
    }
}
require _DIR_('library/header/admin-login');
?>
                <div class="col-lg-8 offset-lg-2">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><i class="fas fa-cogs text-primary mr-2"></i> Login Admin</h4>
                           </div>
                        </div>
                        <form method="POST">
                            <div class="iq-card-body">
                                <div id="sess-result-modal"></div>
                                <? require _DIR_('library/session/result'); ?>
                                <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $csrf_string ?>">
                                <div class="form-group">
                                    <label>No.HP</label>
                                    <input type="text" class="form-control" name="user_login">
                                </div>
                                <div class="form-group">
                                    <label>PIN</label>
                                    <input type="password" class="form-control" name="pin">
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" name="login" class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="reset" name="shenn_reset" class="btn btn-block btn-danger">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<? require _DIR_('library/footer/footer-login'); ?>