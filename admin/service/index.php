<?php 
require '../../connect.php';
require _DIR_('library/session/admin');

if(isset($_POST['add'])) {
    $post1 = filter($_POST['type']);
    $post2 = filter($_POST['code']);
    $post3 = filter($_POST['name']);
    $post4 = filter($_POST['note']);
    $post5 = filter($_POST['price']);
    $post6 = filter($_POST['status']);
    $post7 = filter($_POST['brand']);
    $post8 = filter($_POST['tipe-kategori']);
    $post9 = filter($_POST['provider']);
    
    if($result_csrf == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'System error, please try again later.'];
    } else if($data_user['level'] !== 'Admin') {
        $_SESSION['result'] = ['type' => false,'message' => 'You do not have permission to access this feature.'];
    } else if($sess_username == 'demo') {
        $_SESSION['result'] = ['type' => false,'message' => 'Demo accounts do not have permission to access this feature.'];
    } else if(!$post1 || !$post2 || !$post3 || !in_array($post6,['empty','available']) || !$post7 || !$post8 || !$post9) {
        $_SESSION['result'] = ['type' => false,'message' => 'There are still empty columns.'];
    } else if($call->query("SELECT code FROM category WHERE code = '$post7'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Category / Brand not found.'];
    } else if($call->query("SELECT code FROM provider WHERE code = '$post9'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Provider not found.'];
    } else if($call->query("SELECT code FROM srv WHERE code = '$post2'")->num_rows == true) {
        $_SESSION['result'] = ['type' => false,'message' => 'Service already exists.'];
    } else {
        $up = $call->query("INSERT INTO srv VALUES ('','$post1','$post2','$post3','$post4','0','0','0','$post5','$post6','$post7','$post8','$post9')");
        if($up == TRUE) {
            $_SESSION['result'] = ['type' => true,'message' => 'Service added successfully.'];
            unset($_SESSION['csrf']);
        } else {
            $_SESSION['result'] = ['type' => false,'message' => 'Our server is in trouble, please try again later.'];
        }
    }
} if(isset($_POST['edit'])) {
    $post_token = filter(base64_decode($_POST['web_token']));
    $post1 = filter($_POST['type']);
    $post2 = filter($_POST['code']);
    $post3 = filter($_POST['name']);
    $post4 = filter($_POST['note']);
    $post5 = filter($_POST['price']);
    $post6 = filter($_POST['status']);
    $post7 = filter($_POST['brand']);
    $post8 = filter($_POST['provider']);
  
    if($result_csrf == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'System error, please try again later.'];
    } else if($data_user['level'] !== 'Admin') {
        $_SESSION['result'] = ['type' => false,'message' => 'You do not have permission to access this feature.'];
    } else if($sess_username == 'demo') {
        $_SESSION['result'] = ['type' => false,'message' => 'Demo accounts do not have permission to access this feature.'];
    } else if(!$post1 || !$post2 || !$post3 || !in_array($post6,['empty','available']) || !$post7 || !$post8) {
        $_SESSION['result'] = ['type' => false,'message' => 'There are still empty columns.'];
    } else if($call->query("SELECT code FROM category WHERE code = '$post7'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Category / Brand not found.'];
    } else if($call->query("SELECT code FROM provider WHERE code = '$post8'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Provider not found.'];
    } else if($call->query("SELECT id FROM srv WHERE id = '$post_token'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Service not found.'];
    } else {
        $up = $call->query("UPDATE srv SET type = '$post1', code = '$post2', name = '$post3', note = '$post4', price = '$post5', status = '$post6', brand = '$post7', provider = '$post8' WHERE id = '$post_token'");
        if($up == TRUE) {
            $_SESSION['result'] = ['type' => true,'message' => 'Service updated successfully.'];
            unset($_SESSION['csrf']);
        } else {
            $_SESSION['result'] = ['type' => false,'message' => 'Our server is in trouble, please try again later.'];
        }
    }
} if(isset($_POST['delete'])) {
    $post_token = filter(base64_decode($_POST['web_token']));
    if($result_csrf == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'System error, please try again later.'];
    } else if($data_user['level'] !== 'Admin') {
        $_SESSION['result'] = ['type' => false,'message' => 'You do not have permission to access this feature.'];
    } else if($sess_username == 'demo') {
        $_SESSION['result'] = ['type' => false,'message' => 'Demo accounts do not have permission to access this feature.'];
    } else if($call->query("SELECT id FROM srv WHERE id = '$post_token'")->num_rows == false) {
        $_SESSION['result'] = ['type' => false,'message' => 'Service not found.'];
    } else {
        $up = $call->query("DELETE FROM srv WHERE id = '$post_token'");
        if($up == TRUE) {
            $_SESSION['result'] = ['type' => true,'message' => 'Service deleted successfully.'];
            unset($_SESSION['csrf']);
        } else {
            $_SESSION['result'] = ['type' => false,'message' => 'Our server is in trouble, please try again later.'];
        }
    }
}

require _DIR_('library/header/admin');
?>
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title" title="Click to Add" onclick="modal('New Data','<?= base_url('service/add') ?>','','lg')"><i class="fas fa-plus-circle mr-2"></i> Service </h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                            <? require _DIR_('library/session/result'); ?>
                           <form class="form-horizontal" method="GET">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Show</label>
                                        <select class="form-control" name="show">
                                            <option value="10">Default</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Search</label>
                                        <input type="text" class="form-control" name="search">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Submit</label>
                                        <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                    </div>
                                </div>
                           </form>
                           <div class="table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" >
                                 <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Operator</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Provider</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$no = 1;
if(isset($_GET['show'])) {
    $pt_show = filter_entities($_GET['show']);
    $pt_search = filter($_GET['search']);
    $search = "SELECT * FROM srv WHERE name LIKE '%$pt_search%' OR code LIKE '%$pt_search%' ORDER BY code ASC";
} else {
    $search = "SELECT * FROM srv ORDER BY code ASC";
}

if(isset($_GET['show'])) {
    $pt_show = filter_entities($_GET['show']);
    $records_per_page = $pt_show;
} else {
    $records_per_page = 10;
}
$starting_position = (isset($_GET['page'])) ? ((filter_entities($_GET['page'])-1) * $records_per_page) : 0;

$new_query = $call->query("$search LIMIT $starting_position, $records_per_page");
$no = $starting_position+1;

while ($row_query = $new_query->fetch_assoc()) {
?>
                                    <tr>
                                        <td><?= $row_query['code'] ?></td>
                                        <td><?= $row_query['brand'] ?></td>
                                        <td><?= $row_query['name'] ?></td>
                                        <td><?= 'Rp '.currency($row_query['price']) ?></td>
                                        <td><?= ucfirst($row_query['status']) ?></td>
                                        <td><?= $row_query['provider'] ?></td>
                                        <td align="center">
                                            <a href="javascript:;" onclick="modal('Detail Service','<?= base_url('service/detail?q='.base64_encode($row_query['id'])) ?>','','md')" class="btn btn-sm btn-primary">
                                                <i class="fas fa-list" title="Detail Service"></i>
                                            </a>
                                            <a href="javascript:;" onclick="modal('Edit Service','<?= base_url('service/edit?q='.base64_encode($row_query['id'])) ?>','','md')" class="btn btn-sm btn-warning text-white">
                                                <i class="fas fa-pencil-alt" title="Edit Service"></i>
                                            </a>
                                        </td>
                                    </tr>
<? } ?>
                                </tbody>
                              </table>
                           </div>
                           <nav aria-label="Page navigation example">
                              <ul class="pagination mb-0">
<?php
$pt_show = (isset($_GET['show'])) ? filter_entities($_GET['show']) : 10;
if(isset($_GET['show'])) {
    $pt_search = filter($_GET['search']);
    $pt_show = filter_entities($_GET['show']);
} else {
    $self = $_SERVER['PHP_SELF'];
}

$search = $call->query($search);
$total_records = $search->num_rows;
print '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Data : '.$total_records.'</a></li>';
if($total_records > 0) {
    $total_pages = ceil($total_records/$records_per_page);
    $current_page = 1;
    
    if(isset($_GET['page'])) {
        $current_page = filter_entities($_GET['page']);
        if($current_page < 1) $current_page = 1;
    }
    
    if($current_page > 1) {
        $previous = $current_page-1;
        
        if(isset($_GET['show'])) {
            $pt_search = filter($_GET['search']);
            $pt_show = filter_entities($_GET['show']);
            
            print '<li class="page-item"><a class="page-link" href="'.$self.'?page=1&show='.$pt_show.'&search='.$pt_search.'" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span></a></li>';
        } else {
            print '<li class="page-item"><a class="page-link" href="'.$self.'?page=1" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span></a></li>';
        }
    }
    
    $limit_page = $current_page+1;
    $limit_show_link = $total_pages-$limit_page;
    if($limit_show_link < 0) {
        $limit_show_link2 = $limit_show_link*2;
        $limit_link = $limit_show_link - $limit_show_link2;
        $limit_link = 1 - $limit_link;
    } else {
        $limit_link = 1;
    }
    $limit_page = $current_page+$limit_link;
    
    if($current_page == 1) {
        $start_page = 1;
    } else if($current_page > 1) {
        if($current_page < 2) {
            $min_page  = $current_page-1;
        } else {
            $min_page  = 1;
        }
        $start_page = $current_page-$min_page;
    } else {
        $start_page = $current_page;
    }
    
    for($i = $start_page; $i <= $limit_page; $i++) {
        if(isset($_GET['show'])) {
            $pt_search = filter($_GET['search']);
            $pt_show = filter_entities($_GET['show']);
            if($i == $current_page)  print '<li class="page-item"><a class="page-link" href="#">'.$i.'</a></li>';
            else print '<li class="page-item"><a class="page-link" href="'.$self.'?page='.$i.'&show='.$pt_show.'&search='.$pt_search.'">'.$i.'</a></li>';
        } else {
            if($i == $current_page) print '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
            else print '<li class="page-item"><a class="page-link" href="'.$self.'?page='.$i.'">'.$i.'</a></li>';
        }
    }
    
    if($current_page != $total_pages) {
        $next = $current_page+1;
        if(isset($_GET['show'])) {
            $pt_search = filter($_GET['search']);
            $pt_show = filter_entities($_GET['show']);
            
            print '<li class="page-item"><a class="page-link" href="'.$self.'?page='.$total_pages.'&show='.$pt_show.'&search='.$pt_search.'"><i class="fa fa-angle-double-right"></i></a></li>';
        } else {
            print '<li class="page-item"><a class="page-link" href="'.$self.'?page='.$total_pages.'"><i class="fa fa-angle-double-right"></i></a></li>';
        }
    }
}
?>                                  
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
<? require _DIR_('library/footer/admin'); ?>