<!-- Modal Structure -->
<?php
$time = date('H:i', time());
$nextHour= date('H:i', (time() + (60 * 60)));
$today = date('Y-m-d');

require_once 'upload.php';

?>

<style>
    #image_preview{
    margin: 0 auto;
    overflow:hidden;
    position: relative;
    }

    #previewing{

    }
</style>

<div id="CreateArtistModal" class="modal">
    <form id="uploadArtistForm"  method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>
                Add Artist
                
            </h4>
                <div id="loadingDiv" >
                    <img src="images/loading_dark_large.gif"  style="height:100px; display: inline-block; vertical-align: middle; margin-top:15%;">
                </div>


            <p>
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <label for="NameInput">Name:</label>
                    <input type="text" id="NameInput" name="name" required>
                    <label for="descriptionInput">Description:</label>
                    <input type="text" id="descriptionInput" name="description" required>



                    <div id="image_preview"><img id="previewing" src="images/ic_account_circle_black_48dp_2x.png"/>
                    </div>
                    <hr id="line">
                    <div id="selectImage">
                        <label>Select Your Image</label><br/>
                        <input type="file" name="file" id="file" required/>
                    </div>

                    <label for="dateInput">Date:</label>
                    <input type="date" class="datepicker" id="dateInput" name="date" required value="<?php echo($today); ?>">
                    <label for="beginTimeInput">Begin Time:</label>
                    <input type="time" id="beginTimeInput" name="beginTime" required value="<?php echo($time); ?>">
                    <label for="endTimeInput">End Time:</label>
                    <input type="time" id="endTimeInput" name="endTime" required value="<?php echo($nextHour); ?>">
                </div>
            </div>
            </p>
        </div>
        <div class="modal-footer">
            <input type="submit" id="btn_submitImage" name="addArtist" class="modal-action waves-effect waves-green btn"
                   value="Upload"/>
        </div>
    </form>
</div>