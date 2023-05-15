const add_hobby_button = document.getElementById("add_hobby_button");
if (add_hobby_button) {
    add_hobby_button.addEventListener('click', (event) => {

        const hobby_name = $('#hobby_name').val();
        const app_url = $('#app_url').val();
        const hobby_error = $('#hobby_error');

        if (hobby_name === '') {
            hobby_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('hobby_name', hobby_name);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/create/hobby",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                addHobbyToWebsite(response)
                $('#hobby_name').val(null)
                $('#hobby_error').addClass('hidden');
            }
        });
    });
}

/*function addHobbyToWebsite(hobby) {
    const hobby_items_body = document.getElementById('hobby_items_body');
    const div = document.createElement('div');
    div.className = 'flex justify-between items-center bg-gray-200 p-4 mb-4';
    div.id = 'hobby_item_' + hobby['id'];
    div.innerHTML = `
            <div>
                <p>${hobby['hobby_name']}</p>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editHobby(${hobby['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteHobby(${hobby['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="hobby_items_ids[]" value="${hobby['id']}">
    `
    hobby_items_body.appendChild(div);
}

function editHobby(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());

    $.ajax({
        url:  app_url + "/applicant/get/hobby",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            $('#hobby_name').val(response['hobby_name'])
            $('#active_hobby_item_id').val(id);
            $('#edit_hobby_button').removeClass('hidden')
            $('#add_hobby_button').addClass('hidden')
        }
    });
}*/

const edit_hobby_button = document.getElementById('edit_hobby_button');
if (edit_hobby_button) {
    edit_hobby_button.addEventListener('click', (event) => {

        const hobby_name = $('#hobby_name').val();
        const active_hobby_item_id = $('#active_hobby_item_id').val();
        const app_url = $('#app_url').val();
        const hobby_error = $('#hobby_error');

        if (hobby_name === '') {
            hobby_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('hobby_name', hobby_name);
        form_data.append('id', active_hobby_item_id);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/update/hobby",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                updateHobbyToWebsite(response)
                $('#hobby_name').val(null)
                $('#active_hobby_item_id').val(null);
                $('#hobby_error').addClass('hidden');
                $('#edit_hobby_button').addClass('hidden')
                $('#add_hobby_button').removeClass('hidden')
            }
        });
    });
}

/*function updateHobbyToWebsite(hobby) {
    const div = document.getElementById('hobby_item_' + hobby['id']);
    div.innerHTML = `
            <div>
                <p>${hobby['hobby_name']}</p>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editHobby(${hobby['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteHobby(${hobby['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="hobby_items_ids[]" value="${hobby['id']}">
    `
}

function deleteHobby(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/delete/hobby",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'OK') {
                document.getElementById('hobby_item_' + id).remove()
                $('#active_hobby_item_id').val(null);
                $('#edit_hobby_button').addClass('hidden')
                $('#add_hobby_button').removeClass('hidden')
            }
        }
    });
}*/
