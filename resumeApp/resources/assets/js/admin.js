
// submit form to delete multiple users / clients / conversations
let toBeDeletedUsers = [] ;
let toBeDeletedClients = [] ;
let toBeDeletedConversations = [] ;
let toBeDeletedBookings = [] ;
let toBeDeletedOwners = [] ;

let toBeDeletedData = {} ;

$('[id*="selectedUser"],[id*="selectedClient"],[id*="selectedOwner"],[id*="selectedConversation"],[id*="selectedBooking"]').on('change', function () {
    toBeDeletedUsers = [];
    toBeDeletedClients = [];
    toBeDeletedConversations = [];
    toBeDeletedBookings = [];
    toBeDeletedOwners = [];


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

    $("input[name='selectedBookings[]']").each(function () {
        let val = this.checked ? this.value : '';
        if(val !== ''){
            toBeDeletedBookings.push(val);
        }
    });

    $("input[name='selectedOwners[]']").each(function () {
        let val = this.checked ? this.value : '';
        if(val !== ''){
            toBeDeletedOwners.push(val);
        }
    });


    if(toBeDeletedUsers.length > 0 || toBeDeletedOwners.length > 0 || toBeDeletedClients.length > 0 || toBeDeletedConversations.length > 0 || toBeDeletedBookings.length > 0){
        $('#actionBtns').removeClass('d-none');
    }else{
        $('#actionBtns').addClass('d-none');
    }

     toBeDeletedData = {
        toBeDeletedUsers,
        toBeDeletedClients,
        toBeDeletedConversations,
        toBeDeletedBookings,
        toBeDeletedOwners
    };

});

// send to DB to be deleted :
$('#deleteSelectedBtn').on('click',function () {

    if(!confirm('Are you sure you want to delete all selected users, owners, clients, bookings or conversations ?')){
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

    toBeDeletedData.toBeDeletedBookings.forEach( (bookingID) => {
        $('#selectedRowBooking'+bookingID).fadeOut(3000);
        // uncheck deleted
        $('#selectedBooking'+bookingID).prop('checked', false);
    });

    toBeDeletedData.toBeDeletedOwners.forEach( (ownerID) => {
        $('#selectedRowOwner'+ownerID).fadeOut(3000);
        // uncheck deleted
        $('#selectedOwner'+ownerID).prop('checked', false);
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

// approve users
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
// disapprove users
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

// release booking hours

$('.releaseBooking').on('click',function () {
    let booking_id = this.id.replace('addHoursBtn','');
    axios.post('admin/releaseBooking',{'booking_id':booking_id}).then( (response) => {
        $('#bookingStatus' + booking_id).html('Hours added back to freelancer!');
        let currBookings = parseInt( $('#finishedBookings' + response.data.user_id).html());
        $('#finishedBookings' + response.data.user_id).html(currBookings+1);
    })
});


// admin view on form : save owner
$('#ownerEmail').on('change',function () {
    $('#saveOwner').removeClass('d-none');
});

$('#saveOwner').on('click',function () {
    // disable the btn
    $('#saveOwner').attr('disabled',true);

    // send request through axios to change the id of the owner id to this freelancer.
    let ownerID      = $('#ownerEmail').val();
    axios.post('/freelancer/owners/update_owner',{ownerID}).then( (response) => {

        // show changes are saved
        $('#changesSaved').fadeIn('slow');
        setTimeout(function () {
            $('#changesSaved').fadeOut();
        },4000);

        // hide the button and enable it
        $('#saveOwner').attr('disabled',false);
        $('#saveOwner').addClass('d-none');
    });
});

// owners section copy link to clipboard :
$('.copyLinkBtn').on('click',function(){
    let currOwnerID = this.id.replace('copyLinkBtn_','');
    copyToClipboard('#uniqueLink_'+currOwnerID);
});

$('.copyClientLinkBtn').on('click',function(){
    let currOwnerID = this.id.replace('copyClientLinkBtn_','');
    copyToClipboard('#uniqueClientLink_'+currOwnerID);
});

// to show full link :
$('.oneLineHiddenOverflow').on('click',function () {
    $(this).css({
        'overflow':'auto',
        'text-overflow':'unset'
    });
});

function copyToClipboard(element) { // pass the element by id, example : copyToClipboard('#linkone') ;
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();

    // notification copied :

    $('#copied').removeClass('d-none');
    setTimeout(function () {
        $('#copied').addClass('d-none');
    },2000);
}

