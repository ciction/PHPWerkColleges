<?php
require_once 'CreateReaction.php';
?>



<style>
    #ReplyModal{
        top:20%!important;
    }
</style>


<div id="ReactionModal" class="modal">
    <form id="sendReply"  method="post">
    <div class="modal-content" style="padding-bottom:0px;">
        <h5>Reply:</h5>
        <div class="row">
            <div class="col s12 l10 offset-l1">
                <label for="messageInput">Message:</label>
                <textarea  cols="30" rows="5" type="text" id="messageInput" name="message" required style="resize:vertical;"></textarea>
                <input type="hidden" name="messageId" id="ReactionModalId" value="0">
            </div>
        </div>
    </div>
    <div class="modal-footer" style="height: 0px">
        <input type="submit" name="saveReply" class="modal-action modal-close waves-effect waves-green btn" value="Send">
    </div>
    </form>
</div>


<div id="NewsItemModal" class="modal">
    <form id="sendNewsItem"  method="post">
        <div class="modal-content" style="padding-bottom:0px;">
            <h5>Newsitem:</h5>
            <div class="row">
                <div class="col s12 l10 offset-l1">
                    <label for="titleInput">Title:</label>
                    <input type="text" id="titleInput" name="title" required>
                    <label for="messageInput">Message:</label>
                    <textarea  cols="30" rows="5" type="text" id="messageInput" name="message" required style="resize:vertical;"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="height: 0px">
            <input type="submit" name="saveNewsItem" class="modal-action modal-close waves-effect waves-green btn" value="Send">
        </div>
    </form>
</div>
