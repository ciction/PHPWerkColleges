
var totalprice = 0;
var adultPrice =   Number( $("#adultPrice").val());    //50;
var juniorPrice =  Number( $("#juniorPrice").val());     //35;
var seniorPrice =  Number( $("#seniorPrice").val());     //40;


var adultCount = 0;
var juniorCount = 0;
var seniorCount = 0;

$("#adultCount").change(function() {

    adultCount = parseFloat($("#adultCount").val());
});
$("#juniorCount").change(function() {
    juniorCount = parseFloat($("#juniorCount").val());
});
$("#seniorCount").change(function() {
    seniorCount = parseFloat($("#seniorCount").val());
});

$("#ticketsForm").change(function() {
    totalprice = ((adultCount * adultPrice) +  (juniorCount * juniorPrice) +  (seniorCount * seniorPrice));
    $("#totalPriceTickets").text("\u20ac" + totalprice);
});
