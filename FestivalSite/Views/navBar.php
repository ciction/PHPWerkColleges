
<!--Nav bar met hamburger menu voor mobiel-->
<!-- de Navbar zit in een pin-top wrapper dit laat de bar mee naar onder scrollen-->
<!--    <div class="tabs-wrapper pin-top" style="top: 0px;">-->
<div class="pin-top">
    <div class="row" style="width: 100%;">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img src="images/logo.png" class="boundImg">Festival</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down" >
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#Artists">Artists</a></li>
                    <li><a href="#Tickets">Tickets</a></li>
                    <li><a href="#Map">Map</a></li>
                    <li><a href="#Messages">Messages</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <?php if($role == 'SuperUser' || $role == 'admin'){ echo('<li><a class=\'dropdown-button\' data-beloworigin="true" href=\'#\' data-activates=\'dropdownAdmin\'>Admin<i class="material-icons iconFix">arrow_drop_down</i></a></li>');} ?>
                    <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal"><i class="large material-icons">perm_identity</i></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal">Login</a></li>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#Artists">Artists</a></li>
                    <li><a href="#Tickets">Tickets</a></li>
                    <li><a href="#Map">Map</a></li>
                    <li><a href="#Messages">Messages</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <?php if($role == 'SuperUser' || $role == 'admin'){ echo('<li><a class=\'dropdown-button\' data-beloworigin="true" href=\'#\' data-activates=\'dropdownAdminSmall\'>Admin<i class="material-icons iconFix">arrow_drop_down</i></a></li>');} ?>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Dropdown Structure -->
<ul id='dropdownAdmin' class='dropdown-content'>
    <li><a class="modal-trigger" href="#CreateArtistModal">AddArtist</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>
<!-- Dropdown Structure small-->
<ul id='dropdownAdminSmall' class='dropdown-content'>
    <li><a class="modal-trigger" href="#CreateArtistModal">AddArtist</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>





<!-- onzichtbare div onder de navbar - drukt alles naar onder-->
<div class="UnderNavbarMargin ">
</div>
