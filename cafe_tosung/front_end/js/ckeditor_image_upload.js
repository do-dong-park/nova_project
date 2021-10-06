import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        plugins: [ CKFinder],

        // Enable the "Insert image" button in the toolbar.
        toolbar: [ 'uploadImage' ],

        ckfinder: {
            // Upload the images to the server using the CKFinder QuickUpload command.
            uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
        }
    } )