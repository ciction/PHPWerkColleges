<?php
require_once 'AntiXSS.php';
require_once 'Classes/ticket.php';
$currentUser->unserialize($_SESSION['user']);


Ticket::updatePrices();


if (isset($_POST['buyTicketsBtn']) && !isset($_SESSION['bought'])) {

    $adultCount = intval(AntiXSS::setFilter($_POST['adultCount'], "whitelist", "number",1));
    $juniorCount = intval(AntiXSS::setFilter($_POST['juniorCount'], "whitelist", "number",1));
    $seniorCount = intval(AntiXSS::setFilter($_POST['seniorCount'], "whitelist", "number",1));


    $totalPrice = 0;
    Ticket::pullSyncTicketInfo();


    if($currentUser->getRole() != "visitor"){
        $ticketList = array();
        $id = Ticket::getLast() + 1;


        $ticketType = TicketType::adultTicket;
        for($i = 0; $i < $adultCount; ++$i){
            $newTicket = new Ticket($id, $ticketType, $currentUser->getId() );
            $totalPrice += Ticket::$adultPrice;
            ++$id;
            array_push($ticketList, $newTicket);
        }
        $ticketType = TicketType::juniorTicket;
        for($i = 0; $i < $juniorCount; ++$i){
            $newTicket = new Ticket($id, $ticketType, $currentUser->getId() );
            $totalPrice += Ticket::$juniorPrice;
            ++$id;
            array_push($ticketList, $newTicket);
        }
        $ticketType = TicketType::seniorTicket;
        for($i = 0; $i < $seniorCount; ++$i){
            $newTicket = new Ticket($id, $ticketType, $currentUser->getId() );
            $totalPrice += Ticket::$seniorPrice;
            ++$id;
            array_push($ticketList, $newTicket);
        }

        Ticket::saveAllToDatabase($ticketList);
        $_SESSION['totalPrice'] = $totalPrice;
        Ticket::pushSyncTicketCount();

    }



}

if($currentUser->getRole() != "visitor"){
    echo showForm(Ticket::$juniorPrice, Ticket::$adultPrice, Ticket::$seniorPrice);
}
else{
    showLoginRequest();
}

function showForm($juniorPrice,$adultPrice,$seniorPrice){
return <<<HTML
    <div class="col s12 l8 offset-l2">
        <fieldset>
        <form id="ticketsForm" method="post">
            <label for="adultCount">Adults (18-65) €{$adultPrice} </label>
            <input type="number" min="0" id="adultCount" name="adultCount" class="validate">
            <input type="hidden" id="adultPrice" name="adultPrice" value="{$adultPrice}">
            <label for="JuniorCount" >Junior (16-18) €{$juniorPrice}</label>
            <input type="number"  min="0" id="juniorCount" name="juniorCount" class="validate">
            <input type="hidden" id="juniorPrice" name="juniorPrice" value="{$juniorPrice}">
            <label for="SeniorCount">Senior (65+) €{$seniorPrice}</label>
            <input type="number" min="0" id="seniorCount" name="seniorCount" class="validate">
            <input type="hidden" id="seniorPrice" name="seniorPrice" value="{$seniorPrice}">
            <input type="submit" name="buyTicketsBtn"  id="buyTicketsBtn" value="Buy" class="waves-effect waves-green btn">
        </form>
        
        Total:
        <div id="totalPriceTickets">€0</div>
        </fieldset>
    </div>
    
    <div class="container">
        <div class="row"></div>
    </div>
HTML;
}


function showLoginRequest(){
    $html = '<div class="col s11 offset-s1">
                <div class="card grey">
                    <div class="card-content white-text" style="height:inherit;">
                        <p>You need to login to buy tickets</p>
                    </div>
                </div>
            </div>';

    echo $html;
}


?>
