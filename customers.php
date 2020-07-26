<?php 

require_once('header.php'); 

$users = Helper::getAllUsers();

$customerStatus = unserialize (CUSTOMER_STATUS);

?>

<div id="layoutSidenav_content" class="<?=($role=='admin')?"admin_layout_content":""?>">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Customers</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Customers</li>
            </ol>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    All users in detail. You can view all users.
                    .
                </div>
            </div> -->
            <div class="card mb-4">
                <!-- <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    All Customers
                </div> -->
                <div class="card-body">
                    <div class="spinner-body">
                        <div class="lds-hourglass"> </div>    
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $sno = 1;
                                foreach($users as $key=>$user) {
                                ?>
                                <tr class="main-row">
                                    <td><?=$sno?></td>
                                    <td><?=$user['name']?></td>
                                    <td><?=$user['email']?></td>
                                    <td><?=$user['status']?$customerStatus[$user['status']-1]:'NoN'?></td>
                                    <td><?=$user['user_type']?></td>
                                    <td><?=$user['created']?></td>
                                    <td>
                                        <a href="javascript:void(0)" class="editUserModal" data-id="<?=$user['id']?>" data-toggle="modal" data-target="#customerModal" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:void(0)" class="deleteUser" data-id="<?=$user['id']?>" ><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>

                                <?php 

                                $sno++;
                                    } 
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Modal -->
    <div id="customerModal" class="modal fade" role="dialog" >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header" >
                            <h3 class="text-center font-weight-light my-4">Edit Account</h3>
                        </div>
                        <div class="card-body">
                            <form name="editUser" id="editForm" action="store.php" method="POST" enctype="multipart/form-data">
                                ....
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
        </main>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>



</div></div>
<?php require_once('footer.php') ?>

<script>

$(document).on('click', '.editUserModal', function(){
    const userId = $(this).attr('data-id');
    $('.modal-dialog').hide();
    jQuery.ajax({
        url: "ajax.php",
        type: "POST",
        dataType: "json",
        data: {
            "userid": userId,
            "task":"updateUserData"
        },

        beforeSend: function() {
            $('.spinner-body').show();
        },

        complete: function() {
            $('.spinner-body').hide();
        },

        success: function(data) {
            const htmlForm = data.data;
            $('.modal-dialog').show();
            $(document).find('#editForm').html(htmlForm);
            console.log(htmlForm);
        }
    }); 
});

$(document).on('click', '.deleteUser', function(e){
    if( !confirm('Are you sure?') ) {
        return false;
    }
    const userId = $(this).attr('data-id');
    var removeRow = $(this).closest('.main-row');
    console.log(removeRow);
    jQuery.ajax({
        url: "ajax.php",
        type: "POST",
        dataType: "json",
        data: {
            "userid": userId,
            "task":"deleteUserData"
        },

        beforeSend: function() {
            $('.spinner-body').show();
        },

        complete: function() {
            $('.spinner-body').hide();
        },

        success: function(data) {
            if(data.result=='success') {
                removeRow.remove();
            }
        }
    }); 
});

</script>