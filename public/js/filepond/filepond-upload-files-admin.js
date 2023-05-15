// Register the plugin
FilePond.registerPlugin(FilePondPluginFileValidateType);

// Get a reference to the file input element
const input_files = document.getElementsByClassName('files');
const max_number_of_files = document.getElementById('max_number_of_files').value;
const files_require = document.getElementById('files_require').value;
const csrf_token_2 = document.querySelector('input[name="_token"]').value;
const app_url_2 = document.getElementById('app_url').value;

for (let i=0; i<input_files.length; i++) {
    FilePond.create(input_files[i], {
        acceptedFileTypes: ['application/pdf'],
    }).setOptions({
        maxFiles: max_number_of_files,
        required: files_require === '1',

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
