// Register the plugin
// FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateType);
// FilePond.registerPlugin(FilePondPluginFileRename);

// Get a reference to the file input element
const input_files = document.querySelector('input[id="files"]');
const max_number_of_files = document.getElementById('max_number_of_files').value;
const files_require = document.getElementById('files_require').value;
const csrf_token_2 = document.querySelector('input[name="_token"]').value;
const app_url_2 = document.getElementById('app_url').value;

const pond_2 = FilePond.create(input_files, {
    acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
});

pond_2.setOptions({
    allowImagePreview: false,
    maxFiles: max_number_of_files,
    required: files_require === '1',
    labelIdle: $('#labelIdleFiles').val() + ' <span class="filepond--label-action"> ' + $('#browse').val() + ' </span>',
    labelFileProcessing: $('#labelFileProcessing').val(),
    labelFileProcessingComplete: $('#labelFileProcessingComplete').val(),
    labelFileProcessingAborted: $('#labelFileProcessingAborted').val(),
    labelFileProcessingError: $('#labelFileProcessingError').val(),
    labelTapToCancel: $('#labelTapToCancel').val(),
    labelTapToRetry: $('#labelTapToRetry').val(),
    labelTapToUndo: $('#labelTapToUndo').val(),
    server: {
        headers: {
            'X-CSRF-TOKEN': csrf_token_2
        },
        process: {
            url: app_url_2 + '/applicant/cv/document/upload',
            method: 'POST',
            onload: function (responce) {
                return responce
            },
        },
        revert: (uniqueFileId) => {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", app_url_2 + '/applicant/cv/document/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token_2);
            xhr.send(JSON.stringify({
                path: uniqueFileId
            }));
        },
    }
});
