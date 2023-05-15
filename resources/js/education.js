const add_education_button = document.getElementById("add_education_button");
if (add_education_button) {
    add_education_button.addEventListener('click', (event) => {

        const education_degree = $('#education_degree').val();
        const education_city = $('#education_city').val();
        const education_institut = $('#education_institut').val();
        const education_start_date = $('#education_start_date').val();
        const education_end_date = $('#education_end_date').val();
        const education_description = $('#education_description').val();
        const app_url = $('#app_url').val();
        const education_error = $('#education_error');
        const dates_less_than_today_error = $('#dates_less_than_today_error');
        const start_date_less_than_end_date_error = $('#start_date_less_than_end_date_error');

        if (education_degree === '' || education_city === '' || education_institut === '' || education_start_date === '' || education_end_date === '' || education_description === '') {
            education_error.removeClass('hidden')
            return
        }

        const current_month = ('0' + (new Date().getMonth() + 1)).slice(-2)
        const current_year = new Date().getFullYear()
        const today = current_year + '-' + current_month

        if (today < education_start_date || today < education_end_date) {
            dates_less_than_today_error.removeClass('hidden')
            return
        }

        if (education_start_date > education_end_date) {
            start_date_less_than_end_date_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('education_degree', education_degree);
        form_data.append('education_city', education_city);
        form_data.append('education_institut', education_institut);
        form_data.append('education_start_date', education_start_date);
        form_data.append('education_end_date', education_end_date);
        form_data.append('education_description', education_description);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/create/education",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                addEducationToWebsite(response)
                $('#education_degree').val(null)
                $('#education_city').val(null)
                $('#education_institut').val(null);
                $('#education_start_date').val(null);
                $('#education_end_date').val(null);
                $('#education_description').val(null);
                $('#education_error').addClass('hidden');
                $('#dates_less_than_today_error').addClass('hidden');
                $('#start_date_less_than_end_date_error').addClass('hidden');
            }
        });
    });
}

/*function addEducationToWebsite(education) {
    const education_items_body = document.getElementById('education_items_body');
    const div = document.createElement('div');
    div.className = 'flex justify-between items-center bg-gray-200 p-4 mb-4';
    div.id = 'education_item_' + education['id'];
    div.innerHTML = `
            <div>
                <p>${education['education_degree']}</p>
                <small>${education['education_start_date_string']} - ${education['education_end_date_string']}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editEducation(${education['id']})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteEducation(${education['id']})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                </div>
            </div>
            <input type="hidden" name="education_items_ids[]" value="${education['id']}">
    `
    education_items_body.appendChild(div);
}

function editEducation(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());

    $.ajax({
        url:  app_url + "/applicant/get/education",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            $('#education_degree').val(response['education_degree'])
            $('#education_city').val(response['education_city'])
            $('#education_institut').val(response['education_institut']);
            $('#education_start_date').val(response['education_start_date'].slice(0, -3));
            $('#education_end_date').val(response['education_end_date'].slice(0, -3));
            $('#education_description').val(response['education_description']);
            $('#active_education_item_id').val(id);
            $('#edit_education_button').removeClass('hidden')
            $('#add_education_button').addClass('hidden')
        }
    });
}*/

const edit_education_button = document.getElementById('edit_education_button');
if (edit_education_button) {
    edit_education_button.addEventListener('click', (event) => {

        const education_degree = $('#education_degree').val();
        const education_city = $('#education_city').val();
        const education_institut = $('#education_institut').val();
        const education_start_date = $('#education_start_date').val();
        const education_end_date = $('#education_end_date').val();
        const education_description = $('#education_description').val();
        const active_education_item_id = $('#active_education_item_id').val();
        const app_url = $('#app_url').val();
        const education_error = $('#education_error');
        const dates_less_than_today_error = $('#dates_less_than_today_error');
        const start_date_less_than_end_date_error = $('#start_date_less_than_end_date_error');

        if (education_degree === '' || education_city === '' || education_institut === '' || education_start_date === '' || education_end_date === '' || education_description === '') {
            education_error.removeClass('hidden')
            return
        }

        const current_month = ('0' + (new Date().getMonth() + 1)).slice(-2)
        const current_year = new Date().getFullYear()
        const today = current_year + '-' + current_month

        if (today < education_start_date || today < education_end_date) {
            dates_less_than_today_error.removeClass('hidden')
            return
        }

        if (education_start_date > education_end_date) {
            start_date_less_than_end_date_error.removeClass('hidden')
            return
        }

        let form_data = new FormData();
        form_data.append('education_degree', education_degree);
        form_data.append('education_city', education_city);
        form_data.append('education_institut', education_institut);
        form_data.append('education_start_date', education_start_date);
        form_data.append('education_end_date', education_end_date);
        form_data.append('education_description', education_description);
        form_data.append('id', active_education_item_id);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  app_url + "/applicant/update/education",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                updateEducationToWebsite(response)
                $('#education_degree').val(null)
                $('#education_city').val(null)
                $('#education_institut').val(null);
                $('#education_start_date').val(null);
                $('#education_end_date').val(null);
                $('#education_description').val(null);
                $('#active_education_item_id').val(null);
                $('#education_error').addClass('hidden');
                $('#dates_less_than_today_error').addClass('hidden');
                $('#start_date_less_than_end_date_error').addClass('hidden');
                $('#edit_education_button').addClass('hidden')
                $('#add_education_button').removeClass('hidden')
            }
        });
    });
}

/*function updateEducationToWebsite(education) {
    const div = document.getElementById('education_item_' + education['id']);
    div.innerHTML = `
            <div>
                <p>${education['education_degree']}</p>
                <small>${education['education_start_date_string']} - ${education['education_end_date_string']}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editEducation(${education['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteEducation(${education['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="education_items_ids[]" value="${education['id']}">
    `
}

function deleteEducation(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/delete/education",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'OK') {
                document.getElementById('education_item_' + id).remove()
                $('#active_education_item_id').val(null);
                $('#edit_education_button').addClass('hidden')
                $('#add_education_button').removeClass('hidden')
            }
        }
    });
}*/
