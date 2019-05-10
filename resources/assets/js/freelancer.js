$('.applyToJobBtn').on('click',function () {
    let jobID = this.id.replace('applyToJob','');
    $('#'+this.id).attr('disabled',true);
    $('#'+this.id).text('Applied');
    axios.post('/freelancer/jobs/apply',{'jobID' : jobID}).then(response => {
        console.log(response.data);
    });
});

$('.cancelApplyBtn').on('click',function () {
    let jobID = this.id.replace('cancelApply','');
    $('#'+this.id).attr('disabled',true);
    $('#'+this.id).text('Canceled');
    // hide applied word
    $('#applied'+jobID).hide();
    axios.post('/freelancer/jobs/leave',{'jobID' : jobID}).then(response => {
        console.log(response.data);
    });
});