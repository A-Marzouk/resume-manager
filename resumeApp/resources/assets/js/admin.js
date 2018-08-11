
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
        $('#deleteSelectedBtn').removeClass('d-none');
    }else{
        $('#deleteSelectedBtn').addClass('d-none');
    }
    // console.log('Users : '+toBeDeletedUsers);
    // console.log('Clients : '+toBeDeletedClients);
    // console.log('Conversations : '+toBeDeletedConversations);

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
    });

    toBeDeletedData.toBeDeletedClients.forEach( (clientID) => {
        $('#selectedRowClient'+clientID).fadeOut(3000);
    });

    toBeDeletedData.toBeDeletedConversations.forEach( (conversationID) => {
        $('#selectedRowConversation'+conversationID).fadeOut(3000);
    });

    $('#changesSaved').fadeIn('slow');
    setTimeout(function () {
        $('#changesSaved').fadeOut();
    },3000);

});
