function dbCreateLanguage(data, parent, callback) {
    let form_data = getLanguageFormData(data);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/create/language",
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

function dbGetLanguage(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/get/language",
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

function dbUpdateLanguage(id, data, parent, callback) {
    let form_data = getLanguageFormData(data);
    form_data.append('id', id);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/language",
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

function dbUpdateLanguagePosition(ids_position_array) {
    let form_data = new FormData();
    form_data.append('data', JSON.stringify(ids_position_array))
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/language/position",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
    });
}

function dbDeleteLanguage(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/delete/language",
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

function getLanguageFormData(data) {
    let form_data = new FormData();
    form_data.append('language_name', data['language_name']);
    form_data.append('language_level', data['language_level']);
    form_data.append('_token', $('input[name="_token"]').val());

    return form_data;
}
