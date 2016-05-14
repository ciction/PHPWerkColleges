<?php
require_once 'sendMail.php'
?>

<div class="row">
    <div class="col s12 offset-s0 l8 offset-l2 m10 offset-m1">
        <form name="contactform" method="post" style="background-color:rgba(243, 243, 243, 0.16)">
            <fieldset>
            <table width="450px">
                <tr>
                    <td valign="top"><label for="first_name">First Name *</label></td>
                    <td valign="top">
                        <div class="col s12"><input type="text" id="first_name" name="first_name" maxlength="50" size="30" value="<?php echo $first_name;?>"></div>
                        <div class="col s12"><span class="error"><?php echo $fNameErr;?></span></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><label for="last_name">Last Name *</label></td>
                    <td valign="top">
                        <div class="col s12"><input type="text" id="last_name" name="last_name" maxlength="50" size="30" value="<?php echo $last_name;?>"></div>
                        <div class="col s12"><?php echo $lNameErr;?></span></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><label for="email">Email Address *</label></td>
                    <td valign="top">
                        <div class="col s12"><input type="text" id="email" name="email" maxlength="80" size="30" value="<?php echo $email_from;?>"></div>
                        <div class="col s12"><?php echo $emailErr;?></span></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><label for="telephone">Telephone Number</label></td>
                    <td valign="top">
                        <div class="col s12"><input type="text" id="telephone" name="telephone" maxlength="30" size="30" value="<?php echo $telephone;?>"></div>
                        <div class="col s12"><?php echo $phoneErr;?></span></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><label for="comments">Comments *</label></td>
                    <td valign="top">
                        <div class="col s12"><textarea id="comments" name="comments" maxlength="1000" cols="25"rows="6"  value="<?php echo $comments;?>" style=" resize:vertical "></textarea></div>
                        <div class="col s12"><?php echo $commentErr;?></span></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right"><input type="submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn"></td>
                </tr>
            </table>
            <span><?php echo $successMessage;?></span></div>
    </fieldset>
        </form>
    </div>
</div>

