/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    reloadTable();
});
var reloadTable = function () {
    $.ajax({
        url: 'backend/backend.php',
        type: 'post',
        data: {'action': 'listUser'},
        datatype: 'json',
        success: function (data) {
            assignToEventsColumns(data);
        }, error: function () {
        }
    });
}
function assignToEventsColumns(data) {
    $('#userRecordContent').DataTable({
        "bProcessing": true,
        "bDestroy": true,
        "aaData": JSON.parse(data),
        "aoColumns": [{
                "mData": "firstname"
            }, {
                "mData": "lastname"
            }, {
                "mData": "email"
            }, {
                "mData": "gender"
            },
            {
                "mData": "age"
            },
            {"mData": "id",
                "mRender": function (data, type, full) {
                    return '<button id="editModelButton" class="btn btn-blue btn-sm btn-icon icon-left editUser" value=' + full.id + '><i class="entypo-pencil"></i>Edit</button>&nbsp;&nbsp;<button id="deleteUser" class="btn btn-danger btn-sm btn-icon icon-left deleteUser" value=' + full.id + '><i class="entypo-pencil"></i>Delete</button>';
                }
            },
        ]
    });
}
$(document).on('click', '.addUser', function () {
    $('#addnewUserModel .addNewUserTitle').show();
    $('#addnewUserModel .updateUserTitle').hide();
    $('#addnewUserModel #action').val('addUser');
    $('#addnewUserModel').modal('show');
});
$(document).on('click', '.addUserButton', function (e) {
    e.preventDefault();
    if (validateForm() === true) {
        $.ajax({
            url: 'backend/backend.php',
            type: 'post',
            data: $('form#addnewUserForm').serialize(),
            datatype: 'json',
            success: function () {
                reloadTable();
                $('#addnewUserModel').modal('hide');
            }, error: function () {
                $('#addnewUserModel').modal('hide');
            }
        });
    }
});
//on edit user populate the form element with seleted value and display modal
$(document).on('click', '.editUser', function (e) {
    e.preventDefault();
    var editId = $(this).val();
    $.ajax({
        url: 'backend/backend.php',
        type: 'post',
        data: {'action': 'editUser', 'editID': editId},
        datatype: 'json',
        success: function (data) {
            var data = jQuery.parseJSON(data);
            $('#addnewUserModel #firstName').val(data.firstname);
            $('#addnewUserModel #lastName').val(data.lastname);
            $('#addnewUserModel #email').val(data.email);
            $('#addnewUserModel #gender').val(data.gender);
            $('#addnewUserModel #age').val(data.age);
            $('#addnewUserModel #action').val('updateUser');
            $('#addnewUserModel .addNewUserTitle').hide();
            $('#addnewUserModel .updateUserTitle').show();
            $('#addnewUserModel #updateId').val(editId);
            $('<input>').attr('type', 'hidden').appendTo('form');
            $('#addnewUserModel').modal('show');
        }, error: function () {
        }
    });
});

//Delete User
$(document).on('click', '.deleteUser', function (e) {
    e.preventDefault();
    var deleteId = $(this).val();
    $.ajax({
        url: 'backend/backend.php',
        type: 'post',
        data: {'action': 'deleteUser', 'deleteId': deleteId},
        datatype: 'json',
        success: function () {
            reloadTable();
        }, error: function () {

        }
    });
});

var formReset = function () {
    $('#addnewUserForm').each(function () {
        this.reset();
    });
};


//On hidden of modal reset the form element.
$('#addnewUserModel').on('hidden.bs.modal', function () {
    formReset();
});

function ageCheck() {
    $("#age").val($("#age").val().replace(/[^\d]/g, ''));
}


function validateForm()
{
    var valid = true;
    var firstName = $('#addnewUserModel #firstName').val();
    var lastName = $('#addnewUserModel #lastName').val();
    var email = $('#addnewUserModel #email').val();
    var gender = $('#addnewUserModel #gender').val();
    var age = $("#age").val();

    if (firstName === '')
    {
        $('#addnewUserModel #firstName').parent().addClass("has-error");
        valid = false;
        return false;
    } else {
        $('#addnewUserModel #firstName').parent().removeClass("has-error");
        valid = true;
    }

    if (lastName === '')
    {
        $('#addnewUserModel #lastName').parent().addClass("has-error");
        valid = false;
        return false;
    } else {
        $('#addnewUserModel #lastName').parent().removeClass("has-error");
        valid = true;
    }
    if (email === '')
    {
        $('#addnewUserModel #email').parent().addClass("has-error");
        valid = false;
        return false;
    } else {
        $('#addnewUserModel #email').parent().removeClass("has-error");
        valid = true;
    }
    if (gender === '')
    {
        $('#addnewUserModel #gender').parent().addClass("has-error");
        valid = false;
        return false;
    } else {
        $('#addnewUserModel #gender').parent().removeClass("has-error");
        valid = true;
    }
    if (age === '')
    {
        $('#addnewUserModel #age').parent().addClass("has-error");
        valid = false;
        return false;
    } else {
        $('#addnewUserModel #age').parent().removeClass("has-error");
        valid = true;
    }
    return valid;
}