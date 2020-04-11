
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

 //loader script   
var div_box = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);
$('#load-screen').delay(700).fadeOut(600, function(){
   $(this).remove();
});

// end loader script


     



});
//azax for loading logged in user without refresshing page
function loadUsersOnline() {
    $.get("functions.php?onlineUsers=result", function(data){
        $(".usersOnline").text(data); //targetting usersOnline span

    });
}
setInterval(function(){  // for executing loadUsersOnline every 5 seconds
loadUsersOnline();

},500);




   
