<?php 
require '../../connect.php';
require _DIR_('library/session/admin');
if(isset($_POST['add'])) {
    $post1 = filter($_POST['name']);
    $post3 = filter($_POST['type']);
    
    if($result_csrf == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'System error, please try again later.'];
        redirect(0,base_url('shop/'));
    } else if($data_user['level'] !== 'Admin') {
        $_SESSION['result'] = ['type' => false,'message' => 'You do not have permission to access this feature.'];
        redirect(0,base_url('shop/'));
    } else if($sess_username == 'demo') {
        $_SESSION['result'] = ['type' => false,'message' => 'Demo accounts do not have permission to access this feature.'];
        redirect(0,base_url('shop/'));
    } else if(!$post1 || !in_array($post3,['shop'])) {
        $_SESSION['result'] = ['type' => false,'message' => 'There are still empty columns.'];
        redirect(0,base_url('shop/'));
    } else {
        $up = $call->query("INSERT INTO category VALUES ('','$post1','$post1','$post3','".strtoupper($post3)."','manual','-')");
        if($up == TRUE) {
            $_SESSION['result'] = ['type' => true,'message' => 'Category Shop added successfully.'];
            unset($_SESSION['csrf']);
            redirect(0,base_url('shop/'));
        } else {
            $_SESSION['result'] = ['type' => false,'message' => 'Our server is in trouble, please try again later.'];
            redirect(0,base_url('shop/'));
        }
    }
}
require _DIR_('library/header/admin');
?>
<div class="col-lg-8 offset-lg-2">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><i class="fas fa-cogs text-primary mr-2"></i> Tambah Category Shop </h4>
                           </div>
                        </div>
<form method="POST">
    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $csrf_string ?>">
    <div class="form-group">
        <label class="col-md-12 control-label">Name</label>
        <div class="col-md-12">
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12 control-label">Type</label>
        <div class="col-md-12">
            <select name="type" class="form-control">
                <option value="">- Select One -</option>
                <option value="shop">Shop</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" name="add" class="btn btn-primary btn-block">Add</button>
        </div>
    </div>
</form>
</div>
</div>
<? require _DIR_('library/footer/admin'); ?>