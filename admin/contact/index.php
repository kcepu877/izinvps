<?php 
require '../../connect.php';
require _DIR_('library/session/admin');
require _DIR_('contact/action');
require _DIR_('library/header/admin');
?>
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title" title="Click to Add" onclick="modal('New Data','<?= base_url('contact/add') ?>','','lg')"><i class="fas fa-plus-circle mr-2"></i> Contact </h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <? require _DIR_('library/session/result'); ?>
                           <div class="table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" >
                                 <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>URL Foto</th>
                                        <th>Facebook</th>
                                        <th>Whatsapp</th>
                                        <th>LINE</th>
                                        <th>Instagram</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$search = $call->query("SELECT * FROM contact ORDER BY id ASC");
while($row = $search->fetch_assoc()) {
?>
                                        <tr>
                                            <td><span class="badge badge-dark"><?= $row['name'] ?></span></td>
                                            <td><span class="badge badge-success"><?= str_replace('Ceo & Founder','CEO & Founder',ucwords(strtolower($row['level']))) ?></span></td>
                                            <td><?= $row['url_foto'] ?></td>
                                            <td><span class="badge badge-primary"><?= $row['facebook'] ?></span></td>
                                            <td><span class="badge badge-primary"><?= $row['whatsapp'] ?></span></td>
                                            <td><span class="badge badge-primary"><?= $row['line'] ?></span></td>
                                            <td><span class="badge badge-primary"><?= $row['instagram'] ?></span></td>
                                            <td><span class="badge badge-info"><?= $row['email'] ?></span></td>
                                            <td align="center">
                                                <span onclick="modal('Edit Contact','<?= base_url('contact/edit?q='.base64_encode($row['id'])) ?>','','md')" class="badge badge-warning text-white">
                                                    <i class="fas fa-pencil-alt" title="Edit Contact"></i>
                                                </span>
                                                <? if($row['level'] !== 'admin') { ?>
                                                <span onclick="modal('Delete Contact','<?= base_url('contact/delete?q='.base64_encode($row['id'])) ?>','','md')" class="badge badge-danger text-white">
                                                    <i class="fas fa-trash-alt" title="Delete Contact"></i>
                                                </span>
                                                <? } ?>
                                            </td>
                                        </tr>
<? } ?>
                                </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
<? require _DIR_('library/footer/admin'); ?>