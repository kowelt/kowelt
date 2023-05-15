function dbCreateSkill(data, parent, callback) {
    let form_data = getSkillFormData(data);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/create/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(parent, response)
        }
    });
}

function dbGetSkill(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/get/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(parent, response)
        }
    });
}

function dbUpdateSkill(id, data, parent, callback) {
    let form_data = getSkillFormData(data);
    form_data.append('id', id);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(parent, response)
        }
    });
}

function dbUpdateSkillPosition(ids_position_array) {
    let form_data = new FormData();
    form_data.append('data', JSON.stringify(ids_position_array))
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/skill/position",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
    });
}

function dbDeleteSkill(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/delete/skill",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(parent, response === 'OK')
        }
    });
}

function getSkillFormData(data) {
    let form_data = new FormData();
    form_data.append('skill_name', data['skill_name']);
    form_data.append('skill_level', data['skill_level']);
    form_data.append('_token', $('input[name="_token"]').val());

    return form_data;
}
