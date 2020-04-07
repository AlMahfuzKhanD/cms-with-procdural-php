
$(document).ready(function () {

    // script for selecting all post at a time
    $('#selectAllBoxes').click(function(event) {
        if(this.checked){
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        }else{
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });

    


});
	    
