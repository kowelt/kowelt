const add_work_button = document.getElementById("add_work_button");
if (add_work_button) {
    add_work_button.addEventListener('click', (event) => {

        const work_title = $('#work_title').val();
        const work_city = $('#work_city').val();
        const work_employer = $('#work_employer').val();
        const work_start_date = $('#work_start_date').val();
        const work_end_date = $('#work_end_date').val();
        const work_description = $('#work_description').val();
        const app_url = $('#app_url').val();
        const work_error = $('#work_error');
        const work_dates_less_than_today_error = $('#work_dates_less_than_today_error');
        const work_start_date_less_than_end_date_error = $('#work_start_date_less_than_end_date_error');

        if (work_title === '' || work_city === '' || work_employer === '' || work_start_date === '' || work_end_date === '' || work_description === '') {
            work_error.removeClass('hidden')
            return
        }

        const work_current_month = ('0' + (new Date().getMonth() + 1)).slice(-2)
        const work_current_year = new Date().getFullYear()
        const work_today = work_current_year + '-' + work_current_month

        if (work_today < work_start_date || work_today < work_end_date) {
            work_dates_less_than_today_error.removeClass('hidden')
            return
        }

        if (work_start_date > work_end_date) {
            work_start_date_less_than_end_date_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('work_title', work_title);
        form_data.append('work_city', work_city);
        form_data.append('work_employer', work_employer);
        form_data.append('work_start_date', work_start_date);
        form_data.append('work_end_date', work_end_date);
        form_data.append('work_description', work_description);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/create/work",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                addWorkToWebsite(response)
                $('#work_title').val(null)
                $('#work_city').val(null)
                $('#work_employer').val(null);
                $('#work_start_date').val(null);
                $('#work_end_date').val(null);
                $('#work_description').val(null);
                $('#work_error').addClass('hidden');
                $('#work_dates_less_than_today_error').addClass('hidden');
                $('#work_start_date_less_than_end_date_error').addClass('hidden');
            }
        });
    });
}

/*function addWorkToWebsite(work) {
    const work_items_body = document.getElementById('work_items_body');
    const div = document.createElement('div');
    div.className = 'flex justify-between items-center bg-gray-200 p-4 mb-4';
    div.id = 'work_item_' + work['id'];
    div.innerHTML = `
            <div>
                <p>${work['work_title']}</p>
                <small>${work['work_start_date_string']} - ${work['work_end_date_string']}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editWork(${work['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteWork(${work['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="work_items_ids[]" value="${work['id']}">
    `
    work_items_body.appendChild(div);
}

function editWork(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());

    $.ajax({
        url:  app_url + "/applicant/get/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            $('#work_title').val(response['work_title'])
            $('#work_city').val(response['work_city'])
            $('#work_employer').val(response['work_employer']);
            $('#work_start_date').val(response['work_start_date'].slice(0, -3));
            $('#work_end_date').val(response['work_end_date'].slice(0, -3));
            $('#work_description').val(response['work_description']);
            $('#active_work_item_id').val(id);
            $('#edit_work_button').removeClass('hidden')
            $('#add_work_button').addClass('hidden')
        }
    });
}*/

const edit_work_button = document.getElementById('edit_work_button');
if (edit_work_button) {
    edit_work_button.addEventListener('click', (event) => {

        const work_title = $('#work_title').val();
        const work_city = $('#work_city').val();
        const work_employer = $('#work_employer').val();
        const work_start_date = $('#work_start_date').val();
        const work_end_date = $('#work_end_date').val();
        const work_description = $('#work_description').val();
        const active_work_item_id = $('#active_work_item_id').val();
        const app_url = $('#app_url').val();
        const work_error = $('#work_error');
        const work_dates_less_than_today_error = $('#work_dates_less_than_today_error');
        const work_start_date_less_than_end_date_error = $('#work_start_date_less_than_end_date_error');

        if (work_title === '' || work_city === '' || work_employer === '' || work_start_date === '' || work_end_date === '' || work_description === '') {
            work_error.removeClass('hidden')
            return
        }

        const work_current_month = ('0' + (new Date().getMonth() + 1)).slice(-2)
        const work_current_year = new Date().getFullYear()
        const work_today = work_current_year + '-' + work_current_month

        if (work_today < work_start_date || work_today < work_end_date) {
            work_dates_less_than_today_error.removeClass('hidden')
            return
        }

        if (work_start_date > work_end_date) {
            work_start_date_less_than_end_date_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('work_title', work_title);
        form_data.append('work_city', work_city);
        form_data.append('work_employer', work_employer);
        form_data.append('work_start_date', work_start_date);
        form_data.append('work_end_date', work_end_date);
        form_data.append('work_description', work_description);
        form_data.append('id', active_work_item_id);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/update/work",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                updateWorkToWebsite(response)
                $('#work_title').val(null)
                $('#work_city').val(null)
                $('#work_employer').val(null);
                $('#work_start_date').val(null);
                $('#work_end_date').val(null);
                $('#work_description').val(null);
                $('#active_work_item_id').val(null);
                $('#work_error').addClass('hidden');
                $('#work_dates_less_than_today_error').addClass('hidden');
                $('#work_start_date_less_than_end_date_error').addClass('hidden');
                $('#edit_work_button').addClass('hidden')
                $('#add_work_button').removeClass('hidden')
            }
        });
    });
}

/*function updateWorkToWebsite(work) {
    const div = document.getElementById('work_item_' + work['id']);
    div.innerHTML = `
            <div>
                <p>${work['work_title']}</p>
                <small>${work['work_start_date_string']} - ${work['work_end_date_string']}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editWork(${work['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteWork(${work['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="work_items_ids[]" value="${work['id']}">
    `
}

function deleteWork(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/delete/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'OK') {
                document.getElementById('work_item_' + id).remove()
                $('#active_work_item_id').val(null);
                $('#edit_work_button').addClass('hidden')
                $('#add_work_button').removeClass('hidden')
            }
        }
    });
}*/
