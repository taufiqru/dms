<style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;
            font-size: 14px;
            padding: 7px 20px;
            background-image: none;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
</style> 
<link rel="stylesheet" href="<?=base_url();?>fine-uploader/fine-uploader-new.css">
<link rel="stylesheet" href="<?=base_url();?>theme/bootstrap/css/bootstrap.min.css"> 
<link rel="stylesheet" href="<?=base_url();?>theme/dist/css/AdminLTE.min.css"> 
<html>
  <body>
  
     <div id="fine-uploader-manual-trigger"></div>
  </body>
</html>
<script src="<?=base_url()?>fine-uploader/fine-uploader.js"></script>
<script type="text/template" id="qq-template-manual-trigger">
          <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
              <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                  <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
              </div>
              <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                  <span class="qq-upload-drop-area-text-selector"></span>
              </div>
              <div class="buttons">
                  <div class="qq-upload-button-selector qq-upload-button">
                      <div>Select files</div>
                  </div>
                  <button type="button" id="trigger-upload" class="btn btn-primary">
                      <i class="icon-upload icon-white"></i> Upload
                  </button>
              </div>
              <span class="qq-drop-processing-selector qq-drop-processing">
                  <span>Processing dropped files...</span>
                  <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
              </span>
              <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                  <li>
                      <div class="qq-progress-bar-container-selector">
                          <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                      </div>
                      <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                      <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                      <span class="qq-upload-file-selector qq-upload-file"></span>
                      <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                      <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                      <span class="qq-upload-size-selector qq-upload-size"></span>
                      <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                      <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                      <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                      <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                  </li>
              </ul>

              <dialog class="qq-alert-dialog-selector">
                  <div class="qq-dialog-message-selector"></div>
                  <div class="qq-dialog-buttons">
                      <button type="button" class="qq-cancel-button-selector">Close</button>
                  </div>
              </dialog>

              <dialog class="qq-confirm-dialog-selector">
                  <div class="qq-dialog-message-selector"></div>
                  <div class="qq-dialog-buttons">
                      <button type="button" class="qq-cancel-button-selector">No</button>
                      <button type="button" class="qq-ok-button-selector">Yes</button>
                  </div>
              </dialog>

              <dialog class="qq-prompt-dialog-selector">
                  <div class="qq-dialog-message-selector"></div>
                  <input type="text">
                  <div class="qq-dialog-buttons">
                      <button type="button" class="qq-cancel-button-selector">Cancel</button>
                      <button type="button" class="qq-ok-button-selector">Ok</button>
                  </div>
              </dialog>
          </div>
        </script>
<script>
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '<?=base_url()?>index.php/dokumen/uploaddokumen/<?=$_GET["id"]?>'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '<?=base_url();?>fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: '<?=base_url();?>fine-uploader/placeholders/not_available-generic.png'
                }
            },
            autoUpload: false,
            //debug: true
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>
