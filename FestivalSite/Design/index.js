//Material CSS functies
// + eigen fixes toegevoegd
var messageId = 0;

$(document).ready(function(){
    $('.parallax').parallax();
    $(".button-collapse").sideNav();
    $('.scrollspy').scrollSpy(
        {
            scrollMargin : 120
        }
    );
    $('.modal-trigger').leanModal();
    $('#loadingDiv').hide();

    $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});

function  updatemodal(){
    $("#ReactionModalId").val(messageId);
    // alert($("#ReactionModalId").value);
}

function setModalIdValue(id){
    messageId = id;
    // $("#ReactionModalId").val(id);
}

function testAlert(){
    alert("testAlert");
}


//AJAX
// //-------------------------------------------------------
var paused = false;
//refresh
var refreshIntervalinSeconds = 5 ;
$(document).ready(function() {
    // $("#tickets").load("Views/BuyTicketsView.php");

    $("#artists").load("Views/ArtistDataView.php");
    var refreshId = setInterval(function() {
        $("#artists").load('Views/ArtistDataView.php');
    }, refreshIntervalinSeconds * 1000);
    $.ajaxSetup({ cache: true });

    $("#messages").load("Views/NewsItemsView.php");
    var refreshId = setInterval(function() {
        if(paused) return false;
        $("#messages").load('Views/NewsItemsView.php');
    }, refreshIntervalinSeconds * 1000);
    $.ajaxSetup({ cache: true });

    $("#pauseAjax").click(function() {
        alert("pause");
        paused = !paused;
        this.value = paused ? "Restart" : "Pause";
    });



});


function pause() {
    alert("pause");
    paused = !paused;
    this.value = paused ? "Restart" : "Pause";
}



$("#pauseAjax").click(function() {
    alert("pause");
    paused = !paused;
    this.value = paused ? "Restart" : "Pause";
});



 $(document).ready(function (e) {

// Function to preview image after validation
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').css("max-width", "100%");

    };
});