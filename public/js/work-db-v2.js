function dbCreateWork(data, workItemParent, callback) {
    let form_data = getWorkFormData(data);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/create/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(workItemParent, response)
        }
    });
}

function dbGetWork(id, workItemParent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/get/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(workItemParent, response)
        }
    });
}

function dbUpdateWork(id, data, workItemParent, callback) {
    let form_data = getWorkFormData(data);
    form_data.append('id', id);
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(workItemParent, response)
        }
    });
}

function dbUpdateWorkPosition(ids_position_array) {
    let form_data = new FormData();
    form_data.append('data', JSON.stringify(ids_position_array))
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/update/work/position",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
    });
}

function dbDeleteWork(id, workItemParent, callback) {
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('_token', $('input[name="_token"]').val());
    $.ajax({
        url:  $('#app_url').val() + "/applicant/delete/work",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            callback(workItemParent, response === 'OK')
        }
    });
}

function getWorkFormData(data) {
    let form_data = new FormData();
    form_data.append('work_title', data['work_title']);
    form_data.append('work_city', data['work_city']);
    form_data.append('work_employer', data['work_employer']);
    form_data.append('work_start_date', data['work_start_date']);
    form_data.append('work_end_date', data['work_end_date']);
    form_data.append('work_description', data['work_description']);
    form_data.append('_token', $('input[name="_token"]').val());

    return form_data;
}
