FilePond.registerPlugin(FilePondPluginFileValidateType);

const upload_one_files = document.getElementsByClassName('upload-one-file');
const upload_multi_files = document.getElementsByClassName('upload-multi-files');
// const file_require = document.getElementById('file_require').value;
const csrf_token_2 = document.querySelector('input[name="_token"]').value;
const app_url_2 = document.getElementById('app_url').value;

if (upload_one_files) {
    for (let i=0; i<upload_one_files.length; i++) {
        FilePond.create(upload_one_files[i], {
            acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        }).setOptions({
            allowImagePreview: false,
            maxFiles: 1,
            required: document.getElementById('upload_one_file_require_' + i).value === '1',
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
    }
}

if (upload_multi_files) {
    for (let i=0; i<upload_multi_files.length; i++) {
        FilePond.create(upload_multi_files[i], {
            acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        }).setOptions({
            allowImagePreview: false,
            maxFiles: document.getElementById('max_number_of_files_' + i).value,
            required: document.getElementById('upload_multi_files_require_' + i).value === '1',
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
    }
}


