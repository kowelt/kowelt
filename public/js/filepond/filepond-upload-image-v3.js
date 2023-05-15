// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateType);

// Get a reference to the file input element
const inputElement = document.querySelector('input[id="avatar"]');
const csrf_token = document.querySelector('input[name="_token"]').value;
const max_number_of_images = document.getElementById('max_number_of_images').value;
const image_require = document.getElementById('image_require').value;
const app_url = document.getElementById('app_url').value;

// Create a FilePond instance
const pond = FilePond.create(inputElement, {
    acceptedFileTypes: ['image/png', 'image/jpeg'],
});

// 'Drag & Drop your image or <span class="filepond--label-action"> Browse </span>',

pond.setOptions({
    maxFiles: max_number_of_images,
    required: image_require === '1',
    labelIdle: $('#labelIdle').val() + ' <span class="filepond--label-action"> ' + $('#browse').val() + ' </span>',
    labelFileProcessing: $('#labelFileProcessing').val(),
    labelFileProcessingComplete: $('#labelFileProcessingComplete').val(),
    labelFileProcessingAborted: $('#labelFileProcessingAborted').val(),
    labelFileProcessingError: $('#labelFileProcessingError').val(),
    labelTapToCancel: $('#labelTapToCancel').val(),
    labelTapToRetry: $('#labelTapToRetry').val(),
    labelTapToUndo: $('#labelTapToUndo').val(),
    server: {
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        process: {
            url: app_url + '/applicant/cv/image/upload',
            method: 'POST',
            onload: function (responce) {
                return responce
            },
        },
        revert: (uniqueFileId) => {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", app_url + '/applicant/cv/image/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            xhr.send(JSON.stringify({
                path: uniqueFileId
            }));
        },
    }
});


