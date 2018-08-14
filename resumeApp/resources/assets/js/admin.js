
// submit form to delete multiple users / clients / conversations
let toBeDeletedUsers = [] ;
let toBeDeletedClients = [] ;
let toBeDeletedConversations = [] ;

let toBeDeletedData = {} ;

$('[id*="selectedUser"],[id*="selectedClient"],[id*="selectedConversation"]').on('change', function () {
    toBeDeletedUsers = [];
    toBeDeletedClients = [];
    toBeDeletedConversations = [];


    $("input[name='selectedUsers[]']").each(function () {
        let val = this.checked ? this.value : '';
        if(val !== ''){
            toBeDeletedUsers.push(val);
        }
    });

    $("input[name='selectedClients[]']").each(function () {
        let val = this.checked ? this.value : '';
        if(val !== ''){
            toBeDeletedClients.push(val);
        }
    });

    $("input[name='selectedConversations[]']").each(function () {
        let val = this.checked ? this.value : '';
        if(val !== ''){
            toBeDeletedConversations.push(val);
        }
    });



    if(toBeDeletedUsers.length > 0 || toBeDeletedClients.length > 0 || toBeDeletedConversations.length > 0 ){
        $('#actionBtns').removeClass('d-none');
    }else{
        $('#actionBtns').addClass('d-none');
    }

     toBeDeletedData = {
        toBeDeletedUsers,
        toBeDeletedClients,
        toBeDeletedConversations
    };

});

// send to DB to be deleted :
$('#deleteSelectedBtn').on('click',function () {

    if(!confirm('Are you sure you want to delete all selected users,clients or conversations ?')){
        return;
    }
    axios.post('admin/delete_multiple',toBeDeletedData).then( (response) => {
        console.log(response.data);
    });

    // Here hide the deleted records directly.
    toBeDeletedData.toBeDeletedUsers.forEach( (userID) => {
        if($('#selectedRowUser'+userID).length !== 0){
            $('#selectedRowUser'+userID).fadeOut(3000);
        }

        if($('#selectedRowBUser'+userID).length !== 0){
            $('#selectedRowBUser'+userID).fadeOut(3000);
        }

        // uncheck the deleted ones already :
        $('#selectedUser'+userID).prop('checked', false);
    });

    toBeDeletedData.toBeDeletedClients.forEach( (clientID) => {
        $('#selectedRowClient'+clientID).fadeOut(3000);
        // uncheck deleted
        $('#selectedClient'+clientID).prop('checked', false);
    });

    toBeDeletedData.toBeDeletedConversations.forEach( (conversationID) => {
        $('#selectedRowConversation'+conversationID).fadeOut(3000);
        // uncheck deleted
        $('#selectedConversation'+conversationID).prop('checked', false);
    });

    // hide the buttons.
    $('#actionBtns').fadeOut(2005);
    setTimeout(function () {
        $('#actionBtns').addClass('d-none');
        $('#actionBtns').fadeIn(10);
    },2000);

    // show changes are saved
    $('#changesSaved').fadeIn('slow');
    setTimeout(function () {
        $('#changesSaved').fadeOut();
    },4000);

});

$('#approve').on('click',function () {
    let toBeApprovedUsers = toBeDeletedUsers ;
    console.log( 'toBeApprovedUsers :'  + toBeApprovedUsers);
    toBeApprovedUsers.forEach( (userID)=>{
        $('#status' + userID).html('Approved');
        $('#status' + userID).css('color','lawngreen');
    });

    let approvalData = {
        toBeApprovedUsers,
        status:'APPROVE'
    };

    // send to the DB to approve :
    axios.post('admin/control_approval',approvalData).then( (response)=>{
        console.log(response.data);

        // uncheck all and empty the string
        $('[id*="selectedUser"]').prop('checked',false);
        toBeDeletedUsers = [] ;


        // hide the buttons.
        $('#actionBtns').fadeOut(2005);
        setTimeout(function () {
            $('#actionBtns').addClass('d-none');
            $('#actionBtns').fadeIn(10);
        },2000);


        // show changes are saved
        $('#changesSaved').fadeIn('slow');
        setTimeout(function () {
            $('#changesSaved').fadeOut();
        },4000);
    } );



});

$('#disApprove').on('click',function () {
    let toBeDisApprovedUsers = toBeDeletedUsers ;
    console.log( 'toBeDisApprovedUsers :'  + toBeDisApprovedUsers);
    toBeDisApprovedUsers.forEach( (userID)=>{
        $('#status' + userID).html('Not Approved');
    });


    let disApprovalData = {
        toBeDisApprovedUsers,
        status:'DISAPPROVE'
    };

    // send to the DB to approve :
    axios.post('admin/control_approval',disApprovalData).then( (response)=>{
        console.log(response.data);

        // uncheck all and empty the string
        $('[id*="selectedUser"]').prop('checked',false);
        toBeDeletedUsers = [] ;


        // hide the buttons.
        $('#actionBtns').fadeOut(2005);
        setTimeout(function () {
            $('#actionBtns').addClass('d-none');
            $('#actionBtns').fadeIn(10);
        },2000);

        // show changes are saved
        $('#changesSaved').fadeIn('slow');
        setTimeout(function () {
            $('#changesSaved').fadeOut();
        },4000);

    } );

});



