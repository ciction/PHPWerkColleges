/**
 * Created by Christophe on 4/21/2016.
 */

var show = false;

$(document).ready(
    function () {
        if(show == false){
            var errorBox =  $("#errorBox");
            errorBox.hide();
        }
    }
);


function toggleVisibilityErrorMessage(message){
    var errorBox =  $("#errorBox");
    show = true;
    errorBox.append(message);
    errorBox.show();
    console.log('toggleVisibilityErrorMessage()');

}

