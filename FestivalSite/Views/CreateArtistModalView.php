<!-- Modal Structure -->
<?php


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
    <form id="uploadimage" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>Add Artist</h4>
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
                    <input type="date" id="dateInput" name="date" required>
                    <label for="beginTimeInput">Begin Time:</label>
                    <input type="time" id="beginTimeInput" name="beginTime" required>
                    <label for="endTimeInput">End Time:</label>
                    <input type="time" id="endTimeInput" name="endTime" required>
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