function dbCreateHobby(data, parent, callback) {
    let form_data = getHobbyFormData(data);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/create/hobby",
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

function dbGetHobby(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/get/hobby",
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

function dbUpdateHobby(id, data, parent, callback) {
    let form_data = getHobbyFormData(data);
    form_data.append('id', id);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/hobby",
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

function dbUpdateHobbyPosition(ids_position_array) {
    let form_data = new FormData();
    form_data.append('data', JSON.stringify(ids_position_array))
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/hobby/position",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
    });
}

function dbDeleteHobby(id, parent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/delete/hobby",
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

function getHobbyFormData(data) {
    let form_data = new FormData();
    form_data.append('hobby_name', data['hobby_name']);
    form_data.append('_token', $('input[name="_token"]').val());

    return form_data;
}
