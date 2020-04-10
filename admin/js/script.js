
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

    
var div_box = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);
$('#load-screen').delay(7000).fadeOut(6000, function(){
   $(this).remove();
});
     



});


   
