function setLastDegree(item) {
    const last_degree_serie_div = document.getElementById('last_degree_serie_div');
    const last_degree_study_div = document.getElementById('last_degree_study_div');
    const last_degree_other_div = document.getElementById('last_degree_other_div');
    const bacs_list = ["BAC", "GCE"];
    if (bacs_list.includes(item.value)) {
        // last_degree_serie_div.classList.remove('hidden')
        last_degree_study_div.classList.add('hidden')
        last_degree_other_div.classList.add('hidden')
    } else if(item.value === 'other') {
        last_degree_other_div.classList.remove('hidden')
        last_degree_study_div.classList.remove('hidden')
    } else {
        // last_degree_serie_div.classList.add('hidden')
        last_degree_study_div.classList.remove('hidden')
        last_degree_other_div.classList.add('hidden')
    }
}

function setCurrentlyStudent(item) {
    const student_school_div = document.getElementById('student_school_div');
    const student_cycle_div = document.getElementById('student_cycle_div');
    const student_field_div = document.getElementById('student_field_div');
    if (item.value === '1') {
        student_school_div.classList.remove('hidden')
        student_cycle_div.classList.remove('hidden')
        student_field_div.classList.remove('hidden')
    } else {
        student_school_div.classList.add('hidden')
        student_cycle_div.classList.add('hidden')
        student_field_div.classList.add('hidden')
    }
}

function setCurrentlyApprentice(item) {
    const apprentice_field_div = document.getElementById('apprentice_field_div');
    if (item.value === '1') {
        apprentice_field_div.classList.remove('hidden')
    } else {
        apprentice_field_div.classList.add('hidden')
    }
}

function setProfessionalExperience(item) {
    const work_items_parent = document.getElementById('work_items_parent');
    const work_items_button = document.getElementById('work_items_button');
    if (item.value === '1') {
        work_items_parent.classList.remove('hidden')
        work_items_button.classList.remove('hidden')
    } else {
        work_items_parent.classList.add('hidden')
        work_items_button.classList.add('hidden')
    }
}

function setJobSeeker(item) {
    const job_seeker_field_div = document.getElementById('job_seeker_field_div');
    if (item.value === '1') {
        job_seeker_field_div.classList.remove('hidden')
    } else {
        job_seeker_field_div.classList.add('hidden')
    }
}

function setSelectLevelOption(list, selected) {
    let selectOptions = ``;
    for (let i=0; i<list.length; i++) {
        selectOptions += `
            <option value="${i+1}" ${parseInt(selected) === i+1 ? 'selected' : ''}>${list[i]}</option>
        `
    }
    return selectOptions;
}

function setOtherField(item, div_id) {
    const div = document.getElementById(div_id);
    if (item.value === 'other') {
        div.classList.remove('hidden');
    } else {
        div.classList.add('hidden');
    }
}

function setUggCities(ugg_selection) {
    const ugg_city = document.getElementById('ugg_city');
    const ugg_city_value = ugg_city.value;
    const app_locale = document.getElementById('app_locale');
    if (ugg_selection.value === '') {
        ugg_city.innerHTML = `
            <option value="" selected disabled>${document.getElementById('Please_select_Session_first').value}</option>
        `;
    } else {
        let form_data = new FormData();
        form_data.append('ugg_session_id', ugg_selection.value);
        form_data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            url:  $('#app_url').val() + "/ugg/get/cities",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
                ugg_city.innerHTML = `<option value="" selected disabled>${document.getElementById('Veuillez_sélectionner').value}...</option>`;
                for (let i=0; i<response.length; i++) {
                    ugg_city.innerHTML += `
                        <option value="${response[i]['id']}" ${parseInt(ugg_city_value) === response[i]['id'] ? 'selected' : ''}>${response[i]['name_' + app_locale.value]}</option>
                    `;
                }
            }
        });
    }
}

function setTranslate() {
    const work_title_label = document.querySelector("label[for='work_title']");
    const work_city_label = document.querySelector("label[for='work_city']");
    const work_employer_label = document.querySelector("label[for='work_employer']");
    const work_start_date_label = document.querySelector("label[for='work_start_date']");
    const work_end_date_label = document.querySelector("label[for='work_end_date']");
    const work_description_label = document.querySelector("label[for='work_description']");

    const skill_name_label = document.querySelector("label[for='skill_name']");
    const skill_level_label = document.querySelector("label[for='skill_level']");

    const language_name_label = document.querySelector("label[for='language_name']");
    const language_level_label = document.querySelector("label[for='language_level']");

    const hobby_name_label = document.querySelector("label[for='hobby_name']");

    const select_option_js = document.getElementsByClassName('select-option-js')
    const delete_button_js = document.getElementsByClassName('delete-button-js')
    const save_button_js = document.getElementsByClassName('save-button-js')

    if (work_title_label) {
        work_title_label.innerText = document.getElementById('Intitulé_De_Poste').value;
        work_city_label.innerText = document.getElementById('Ville').value;
        work_employer_label.innerText = document.getElementById('Employeur').value;
        work_start_date_label.innerText = document.getElementById('Date_De_Debut').value;
        work_end_date_label.innerText = document.getElementById('Date_De_Fin').value;
        work_description_label.innerText = document.getElementById('Description').value;

        document.getElementById('save_before_error').innerText = document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value;
        document.getElementById('ugg_work_error').innerText = document.getElementById('Veuillez_remplir_tous_les_champs').value;
        document.getElementById('dates_less_than_today_work_error').innerText = document.getElementById('dates_less_than_today').value;
        document.getElementById('start_date_less_than_end_date_work_error').innerText = document.getElementById('start_date_less_than_end_date').value;
    }

    if (skill_name_label) {
        skill_name_label.innerText = document.getElementById('Compétence').value;
        skill_level_label.innerText = document.getElementById('Niveau').value;

        document.getElementById('skill_save_before_error').innerText = document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value;
        document.getElementById('skill_fill_form_error').innerText = document.getElementById('Veuillez_remplir_tous_les_champs').value;
    }

    if (language_name_label) {
        language_name_label.innerText = document.getElementById('Langue').value;
        language_level_label.innerText = document.getElementById('Niveau').value;

        document.getElementById('language_save_before_error').innerText = document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value;
        document.getElementById('language_fill_form_error').innerText = document.getElementById('Veuillez_remplir_tous_les_champs').value;
    }

    if (hobby_name_label) {
        hobby_name_label.innerText = document.getElementById('Hobby').value;

        document.getElementById('hobby_save_before_error').innerText = document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value;
        document.getElementById('hobby_fill_form_error').innerText = document.getElementById('Veuillez_remplir_tous_les_champs').value;
    }

    if (select_option_js[0]) {
        for (let i=0; i<select_option_js.length; i++) {
            select_option_js[i].innerText = document.getElementById('Veuillez_sélectionner').value + '...';
        }
    }

    if (delete_button_js[0]) {
        for (let i=0; i<delete_button_js.length; i++) {
            delete_button_js[i].innerText = document.getElementById('Effacer').value;
        }
    }

    if (save_button_js[0]) {
        for (let i=0; i<save_button_js.length; i++) {
            save_button_js[i].innerText = document.getElementById('Sauvegarder').value;
        }
    }
}
