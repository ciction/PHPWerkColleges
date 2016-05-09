//Material CSS functies
// + eigen fixes toegevoegd
$(document).ready(function(){
    $('.parallax').parallax();
    $(".button-collapse").sideNav();
    $('.scrollspy').scrollSpy(
        {
            scrollMargin : 120
        }
    );
    $('.modal-trigger').leanModal();

});


//AJAX
//-------------------------------------------------------

//refresh
var refreshIntervalinSeconds = 15;
$(document).ready(function() {
    $("#artists").load("Views/ArtistDataView.php");
    var refreshId = setInterval(function() {
        $("#artists").load('Views/ArtistDataView.php');
    }, refreshIntervalinSeconds * 1000);
    $.ajaxSetup({ cache: true });
});

//Upload Image
// //todo check if admin anders bestaat de id niet
// $(document).ready(function(){
//     $('#btn_submitImage').change(function(){
//         $.ajax({
//             type: "POST",
//             url: "upload.php",
//             data: "query="+document.form.textarea.value,
//             success: function(msg){
//                 document.getElementById("Div_Where_you_want_the_response").innerHTML = msg                         }
//         })
//     });
// });


// $(document).ready(function (e) {
//     $("#uploadimage").on('submit',(function(e) {
//         e.preventDefault();
//         $("#message").empty();
//         $('#loading').show();
//         $.ajax({
//             url: "upload.php", // Url to which the request is send
//             type: "POST",             // Type of request to be send, called as method
//             data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
//             contentType: false,       // The content type used when sending data to the server.
//             cache: false,             // To unable request pages to be cached
//             processData:false,        // To send DOMDocument or non processed data file it is set to false
//             success: function(data)   // A function to be called if request succeeds
//             {
//                 $('#loading').hide();
//                 $("#message").html(data);
//             }
//         });
//     }));
//
// // Function to preview image after validation
//     $(function() {
//         $("#file").change(function() {
//             $("#message").empty(); // To remove the previous error message
//             var file = this.files[0];
//             var imagefile = file.type;
//             var match= ["image/jpeg","image/png","image/jpg"];
//             if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
//             {
//                 $('#previewing').attr('src','noimage.png');
//                 $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
//                 return false;
//             }
//             else
//             {
//                 var reader = new FileReader();
//                 reader.onload = imageIsLoaded;
//                 reader.readAsDataURL(this.files[0]);
//             }
//         });
//     });
//     function imageIsLoaded(e) {
//         $("#file").css("color","green");
//         $('#image_preview').css("display", "block");
//         $('#previewing').attr('src', e.target.result);
//         $('#previewing').attr('width', '250px');
//         $('#previewing').attr('height', '230px');
//     };
// });