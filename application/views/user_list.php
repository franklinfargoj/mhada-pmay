<main class="main-content bgc-grey-100">
   <div id="mainContent">
      <?php
         if($this->session->flashdata('success'))
         {
      ?>
         <div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button><?php echo $this->session->flashdata('success');?></div>
      <?php
         }
      ?>
      <?php
         if($this->session->flashdata('error'))
         {
      ?>
         <div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button><?php echo $this->session->flashdata('error');?></div>
      <?php
         }
      ?>
      <div class="row gap-20 masonry pos-r">
         <div class="masonry-sizer col-md-6"></div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">Users Registered
                           <a href="<?php echo base_url('schemes/dashboard');?>" class="btn m-btn--pill btn-dark float-right">Back</a>
                           <button type="button" class="btn m-btn--pill btn-primary float-right mr-3" data-toggle="modal" data-target="#add_user">Add User</button>
                        </h3>
                     </div>

                     <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <?php echo form_open(base_url('users/add_user'),'method="post" id="user_form"');?>
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="adduserLabel"><strong>Enter User Details</strong></h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body" style="overflow-y: scroll; height:400px;">
                                 <div class="form-group">
                                    <label for="name" class="form-control-label">
                                       First Name
                                    </label>
                                    <input type="text" name="name" class="form-control" id="name">
                                 </div>
                                 <div class="form-group">
                                    <label for="last_name" class="form-control-label">
                                       Last Name
                                    </label>
                                    <input type="text" name="last_name" class="form-control" id="name">
                                 </div>
                                 <div class="form-group">
                                    <label for="email" class="form-control-label">
                                       Email
                                    </label>
                                    <input type="text" name="email" class="form-control" id="email">
                                 </div>
                                 <div class="form-group">
                                    <label for="mobilenumber" class="form-control-label">
                                       Mobile Number
                                    </label>
                                    <input type="text" name="mobilenumber" class="form-control" id="mobilenumber">
                                 </div>
                                 <div class="form-group">
                                    <label for="username" class="form-control-label">
                                       User Name
                                    </label>
                                    <input type="text" name="username" class="form-control" id="username">
                                 </div>
                                 <div class="form-group">
                                    <label for="password" class="form-control-label">
                                       Password
                                    </label>
                                    <input type="password" name="password" class="form-control" id="password">
                                 </div>
                                 <div class="form-group">
                                    <label for="board" class="form-control-label">
                                       Board
                                    </label>
                                    <select name="board" class="form-control" id="board">
                                       <option value="">Select Board</option>
                                       <?php
                                          if(is_array($get_board) && array_filter($get_board))
                                          {
                                             foreach($get_board as $each_board){
                                       ?>
                                             <option value="<?php echo $each_board['id'];?>"><?php echo $each_board['name'];?></option>
                                       <?php
                                             }
                                          }
                                       ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="designation" class="form-control-label">
                                       Designation
                                    </label>
                                    <select name="designation" class="form-control" id="designation">
                                       <option value="">Select Designation</option>
                                       <?php
                                          if(is_array($get_designation) && array_filter($get_designation))
                                          {
                                             foreach($get_designation as $each_desig){
                                       ?>
                                             <option value="<?php echo $each_desig['id'];?>"><?php echo $each_desig['name'];?></option>
                                       <?php
                                             }
                                          }
                                       ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="department" class="form-control-label">
                                       Department
                                    </label>
                                    <select name="department" class="form-control" id="department">
                                       <option value="">Select Department</option>
                                       <?php
                                          if(is_array($get_department) && array_filter($get_department))
                                          {
                                             foreach($get_department as $each_department){
                                       ?>
                                             <option value="<?php echo $each_department['id'];?>"><?php echo $each_department['name'];?></option>
                                       <?php
                                             }
                                          }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" id="submit_user_form" class="btn m-btn--pill btn-primary">Submit</button>
                                 <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        <?php echo form_close();?>
                        </div>
                     </div>
                     <div class="m-portlet__body">
                        <table class="table table-hover">
                           <thead class="thead-light">
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Email &amp; Mobile Number</th>
                                 <th scope="col">Username</th>
                                 <th scope="col">Designation</th>
                                 <th scope="col">Board</th>
                                 <th scope="col">Created Date</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                              if(is_array($get_user_details) && array_filter($get_user_details))
                              {
                                 foreach($get_user_details as $count_serial => $each_user)
                                 {
                           ?>
                              <tr>
                                 <th scope="row"><?php echo $count_serial+1;?></th>
                                 <td><?php echo $each_user['name'];?></td>
                                 <td><?php echo $each_user['email'].' & '.$each_user['mobilenumber'];?></td>
                                 <td><?php echo $each_user['username'];?></td>
                                 <td><?php echo $each_user['designation_name'];?></td>
                                 <td><?php echo $each_user['board_name'];?></td>
                                 <td><?php echo date('F j, Y',strtotime($each_user['created_on']));?></td>
                              </tr>
                           <?php
                                 }
                              }else{
                                 echo "<tr><td colspan='7'>No Users found.</td></tr>";
                              }
                           ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
