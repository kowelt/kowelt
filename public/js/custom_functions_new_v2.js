function addEducationToWebsite(education) {
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
}
function updateEducationToWebsite(education) {
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
}

function addWorkToWebsite(work) {
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
}
function updateWorkToWebsite(work) {
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
}

function addSkillToWebsite(skill) {
    const skill_items_body = document.getElementById('skill_items_body');
    const div = document.createElement('div');
    div.className = 'flex justify-between items-center bg-gray-200 p-4 mb-4';
    div.id = 'skill_item_' + skill['id'];
    div.innerHTML = `
            <div>
                <p>${skill['skill_name']}</p>
                <small>${getSkillLevel(skill['skill_level'])}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editSkill(${skill['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteSkill(${skill['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="skill_items_ids[]" value="${skill['id']}">
    `
    skill_items_body.appendChild(div);
}
function editSkill(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());

    $.ajax({
        url:  app_url + "/applicant/get/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            $('#skill_name').val(response['skill_name'])
            $('#skill_level').val(response['skill_level'])
            $('#active_skill_item_id').val(id);
            $('#edit_skill_button').removeClass('hidden')
            $('#add_skill_button').addClass('hidden')
        }
    });
}
function updateSkillToWebsite(skill) {
    const div = document.getElementById('skill_item_' + skill['id']);
    div.innerHTML = `
            <div>
                <p>${skill['skill_name']}</p>
                <small>${getSkillLevel(skill['skill_level'])}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editSkill(${skill['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteSkill(${skill['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="skill_items_ids[]" value="${skill['id']}">
    `
}
function deleteSkill(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/delete/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'OK') {
                document.getElementById('skill_item_' + id).remove()
                $('#active_skill_item_id').val(null);
                $('#edit_skill_button').addClass('hidden')
                $('#add_skill_button').removeClass('hidden')
            }
        }
    });
}
function getSkillLevel(level) {
    const app_locale = $('#app_locale').val();

    let skills_level_table = {
        'fr': ['Null', 'Débutant', 'Comptétent', 'Experimenté', 'Expert'],
        'en': ['Null', 'Beginner', 'Skilled', 'Experienced', 'Expert'],
        'de': ['Null', 'Einsteiger', 'Geübt', 'Erfahren', 'Experte'],
    }

    return skills_level_table[app_locale][level]
}

function addLanguageToWebsite(language) {
    const language_items_body = document.getElementById('language_items_body');
    const div = document.createElement('div');
    div.className = 'flex justify-between items-center bg-gray-200 p-4 mb-4';
    div.id = 'language_item_' + language['id'];
    div.innerHTML = `
            <div>
                <p>${getLanguageName(language['language_name'])}</p>
                <small>${getLanguageLevel(language['language_level'])}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editLanguage(${language['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteLanguage(${language['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="language_items_ids[]" value="${language['id']}">
    `
    language_items_body.appendChild(div);
}
function editLanguage(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());

    $.ajax({
        url:  app_url + "/applicant/get/language",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            $('#language_name').val(response['language_name'])
            $('#language_level').val(response['language_level'])
            $('#active_language_item_id').val(id);
            $('#edit_language_button').removeClass('hidden')
            $('#add_language_button').addClass('hidden')
        }
    });
}
function updateLanguageToWebsite(language) {
    const div = document.getElementById('language_item_' + language['id']);
    div.innerHTML = `
            <div>
                <p>${getLanguageName(language['language_name'])}</p>
                <small>${getLanguageLevel(language['language_level'])}</small>
            </div>
            <div>
                <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editLanguage(${language['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg></div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteLanguage(${language['id']})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg></div>
                </div>
            </div>
            <input type="hidden" name="language_items_ids[]" value="${language['id']}">
    `
}
function deleteLanguage(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/delete/language",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'OK') {
                document.getElementById('language_item_' + id).remove()
                $('#active_language_item_id').val(null);
                $('#edit_language_button').addClass('hidden')
                $('#add_language_button').removeClass('hidden')
            }
        }
    });
}
function getLanguageName(code){
    var languages_list = {
        "af": "Afrikaans",
        "sq": "Albanian - shqip",
        "am": "Amharic - አማርኛ",
        "ar": "Arabic - العربية",
        "an": "Aragonese - aragonés",
        "hy": "Armenian - հայերեն",
        "ast": "Asturian - asturianu",
        "az": "Azerbaijani - azərbaycan dili",
        "eu": "Basque - euskara",
        "be": "Belarusian - беларуская",
        "bn": "Bengali - বাংলা",
        "bs": "Bosnian - bosanski",
        "br": "Breton - brezhoneg",
        "bg": "Bulgarian - български",
        "ca": "Catalan - català",
        "ckb": "Central Kurdish - کوردی (دەستنوسی عەرەبی)",
        "zh": "Chinese - 中文",
        "zh-HK": "Chinese (Hong Kong) - 中文（香港）",
        "zh-CN": "Chinese (Simplified) - 中文（简体）",
        "zh-TW": "Chinese (Traditional) - 中文（繁體）",
        "co": "Corsican",
        "hr": "Croatian - hrvatski",
        "cs": "Czech - čeština",
        "da": "Danish - dansk",
        "nl": "Dutch - Nederlands",
        "en": "English",
        "en-AU": "English (Australia)",
        "en-CA": "English (Canada)",
        "en-IN": "English (India)",
        "en-NZ": "English (New Zealand)",
        "en-ZA": "English (South Africa)",
        "en-GB": "English (United Kingdom)",
        "en-US": "English (United States)",
        "eo": "Esperanto - esperanto",
        "et": "Estonian - eesti",
        "fo": "Faroese - føroyskt",
        "fil": "Filipino",
        "fi": "Finnish - suomi",
        "fr": "French - français",
        "fr-CA": "French (Canada) - français (Canada)",
        "fr-FR": "French (France) - français (France)",
        "fr-CH": "French (Switzerland) - français (Suisse)",
        "gl": "Galician - galego",
        "ka": "Georgian - ქართული",
        "de": "German - Deutsch",
        "de-AT": "German (Austria) - Deutsch (Österreich)",
        "de-DE": "German (Germany) - Deutsch (Deutschland)",
        "de-LI": "German (Liechtenstein) - Deutsch (Liechtenstein)",
        "de-CH": "German (Switzerland) - Deutsch (Schweiz)",
        "el": "Greek - Ελληνικά",
        "gn": "Guarani",
        "gu": "Gujarati - ગુજરાતી",
        "ha": "Hausa",
        "haw": "Hawaiian - ʻŌlelo Hawaiʻi",
        "he": "Hebrew - עברית",
        "hi": "Hindi - हिन्दी",
        "hu": "Hungarian - magyar",
        "is": "Icelandic - íslenska",
        "id": "Indonesian - Indonesia",
        "ia": "Interlingua",
        "ga": "Irish - Gaeilge",
        "it": "Italian - italiano",
        "it-IT": "Italian (Italy) - italiano (Italia)",
        "it-CH": "Italian (Switzerland) - italiano (Svizzera)",
        "ja": "Japanese - 日本語",
        "kn": "Kannada - ಕನ್ನಡ",
        "kk": "Kazakh - қазақ тілі",
        "km": "Khmer - ខ្មែរ",
        "ko": "Korean - 한국어",
        "ku": "Kurdish - Kurdî",
        "ky": "Kyrgyz - кыргызча",
        "lo": "Lao - ລາວ",
        "la": "Latin",
        "lv": "Latvian - latviešu",
        "ln": "Lingala - lingála",
        "lt": "Lithuanian - lietuvių",
        "mk": "Macedonian - македонски",
        "ms": "Malay - Bahasa Melayu",
        "ml": "Malayalam - മലയാളം",
        "mt": "Maltese - Malti",
        "mr": "Marathi - मराठी",
        "mn": "Mongolian - монгол",
        "ne": "Nepali - नेपाली",
        "no": "Norwegian - norsk",
        "nb": "Norwegian Bokmål - norsk bokmål",
        "nn": "Norwegian Nynorsk - nynorsk",
        "oc": "Occitan",
        "or": "Oriya - ଓଡ଼ିଆ",
        "om": "Oromo - Oromoo",
        "ps": "Pashto - پښتو",
        "fa": "Persian - فارسی",
        "pl": "Polish - polski",
        "pt": "Portuguese - português",
        "pt-BR": "Portuguese (Brazil) - português (Brasil)",
        "pt-PT": "Portuguese (Portugal) - português (Portugal)",
        "pa": "Punjabi - ਪੰਜਾਬੀ",
        "qu": "Quechua",
        "ro": "Romanian - română",
        "mo": "Romanian (Moldova) - română (Moldova)",
        "rm": "Romansh - rumantsch",
        "ru": "Russian - русский",
        "gd": "Scottish Gaelic",
        "sr": "Serbian - српски",
        "sh": "Serbo - Croatian",
        "sn": "Shona - chiShona",
        "sd": "Sindhi",
        "si": "Sinhala - සිංහල",
        "sk": "Slovak - slovenčina",
        "sl": "Slovenian - slovenščina",
        "so": "Somali - Soomaali",
        "st": "Southern Sotho",
        "es": "Spanish - español",
        "es-AR": "Spanish (Argentina) - español (Argentina)",
        "es-419": "Spanish (Latin America) - español (Latinoamérica)",
        "es-MX": "Spanish (Mexico) - español (México)",
        "es-ES": "Spanish (Spain) - español (España)",
        "es-US": "Spanish (United States) - español (Estados Unidos)",
        "su": "Sundanese",
        "sw": "Swahili - Kiswahili",
        "sv": "Swedish - svenska",
        "tg": "Tajik - тоҷикӣ",
        "ta": "Tamil - தமிழ்",
        "tt": "Tatar",
        "te": "Telugu - తెలుగు",
        "th": "Thai - ไทย",
        "ti": "Tigrinya - ትግርኛ",
        "to": "Tongan - lea fakatonga",
        "tr": "Turkish - Türkçe",
        "tk": "Turkmen",
        "tw": "Twi",
        "uk": "Ukrainian - українська",
        "ur": "Urdu - اردو",
        "ug": "Uyghur",
        "uz": "Uzbek - o‘zbek",
        "vi": "Vietnamese - Tiếng Việt",
        "wa": "Walloon - wa",
        "cy": "Welsh - Cymraeg",
        "fy": "Western Frisian",
        "xh": "Xhosa",
        "yi": "Yiddish",
        "yo": "Yoruba - Èdè Yorùbá",
        "zu": "Zulu - isiZulu"
    };
    return languages_list[code]
}
function getLanguageLevel(level) {
    const app_locale = $('#app_locale').val();

    let languages_level_table = {
        'fr': ['Null', 'Connaissances de base', 'Bon', 'Très bon', 'Excellent', 'Langue maternelle', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        'en': ['Null', 'Basic knowledge', 'Good', 'Very Good', 'Excellent', 'Mother tongue', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        'de': ['Null', 'Grundkenntnisse', 'Gut', 'Sehr gut', 'Hervorrangend', 'Muttersprache', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
    }

    return languages_level_table[app_locale][level]
}

function addHobbyToWebsite(hobby) {
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
}
function updateHobbyToWebsite(hobby) {
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
}

function setToggleDriverLicenceInputCategory(value) {
    const driving_licence_category_div = $('#driving_licence_category_div')
    const driving_licence_category_input = $('#driving_licence_category')
    if (value === '1') {
        driving_licence_category_div.removeClass('hidden')
        driving_licence_category_input.attr('name', 'driving_licence_category')
        driving_licence_category_input.attr('required', '')
    } else {
        driving_licence_category_div.addClass('hidden')
        driving_licence_category_input.removeAttr('name')
        driving_licence_category_input.removeAttr('required')
    }
}

function deleteImage(id) {
    const app_url = $('#app_url').val();

    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  app_url + "/applicant/cv/image/delete/path",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            if (response === 'ok') {
                const profile_pic_1 = $('#profile_pic_1')
                const profile_pic_nav_1 = $('#profile_pic_nav_1')
                const profile_pic_nav_3 = $('#profile_pic_nav_3')
                $('#image_view').attr('src', null);
                $('#image_view_div').addClass('hidden')
                $('#avatar').removeClass('hidden')
                profile_pic_1.addClass('hidden')
                profile_pic_nav_1.addClass('hidden')
                profile_pic_nav_3.addClass('hidden')
                profile_pic_1.attr('src', null)
                profile_pic_nav_1.attr('src', null)
                profile_pic_nav_3.attr('src', null)
                $('#profile_pic_2').removeClass('hidden')
                $('#profile_pic_nav_2').removeClass('hidden')
                $('#profile_pic_nav_4').removeClass('hidden')
            }
        }
    });
}
