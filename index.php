<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo "PHP and MYSQL Crud Operation using MYSQL,PHP,AJAX and Bootstrap Modal"; ?></title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="DataTables-1.10.15/media/css/dataTables.bootstrap.min.css"/>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"> 
                    <h4><?php echo "DEMO FOR PHP MYSQL CRUD OPERATION USING PHP,MYSQL,AJAX AND JQUERY"; ?></h4>
                </div>
                <hr/>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="pull-left">
                        <h3>User List:</h3>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        <button class="btn btn-success addUser" >Add User</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered display" id="userRecordContent">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> 

        <div class="modal fade" id="addnewUserModel">
            <form id="addnewUserForm" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="pull-right" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title addNewUserTitle">Add New User</h4>
                            <h4 class="modal-title updateUserTitle">Edit User</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name</label>
                                <input type="text" id="firstName" required="required" name="firstName" placeholder="First Name" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input type="text" id="lastName" name="lastName" required="required" placeholder="Last Name" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email"  required="required" placeholder="Email Address" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <input type="text" id="gender" name="gender" required="required" placeholder="Gender" class="form-control"/>
                                <input type="hidden" name="action"  id="action" value=""/>
                            </div>
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" required="required" placeholder="age" class="form-control"/>
                                <input type="hidden" name="updateId"  id="updateId" value=""/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary addUserButton">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/userScript.js"></script>
        <script type="text/javascript" src="DataTables-1.10.15/media/js/jquery.dataTables.js"></script>
    </body>
</html>
