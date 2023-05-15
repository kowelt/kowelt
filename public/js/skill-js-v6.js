const emptySkillData = {
    'skill_name': '',
    'skill_level': '',
};

const skill_items_parent = document.getElementById('skill_items_parent');

function addSkillItem() {
    const forms = document.getElementsByClassName('skill-item-form-show');
    const save_before_error = document.getElementById('skill_save_before_error');
    if (forms.length > 0) {
        save_before_error.classList.remove('hidden')
        setTimeout(()=>{
            save_before_error.classList.add('hidden')
        },5000)
        return
    }
    cleanSkillForms()
    skill_items_parent.appendChild(setNewSkill());
}

function editSkillItem(item) {
    cleanSkillForms()
    const parent = item.parentNode.parentNode.parentNode;
    const item_id = parent.querySelector('.skill-items-id');
    const item_children = parent.children;

    if (item_id) {
        dbGetSkill(item_id.value, parent, addInnerSkillFromHTML);
    } else {
        item_children[0].classList.add('hidden');
        item_children[1].innerHTML = setSkillForm(emptySkillData);
        item_children[1].className = 'skill-item-form-show mt-4 mb-4';
    }
}
function addInnerSkillFromHTML(parent, item) {
    parent.innerHTML = `
        <div class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move skill-item-view handle hidden">
            ${setSkillItem(item)}
        </div>
        <div class="skill-item-form-show mt-4 mb-4">
            ${setSkillForm(item)}
        </div>
        <input type="hidden" name="skill_items_ids[]" class="skill-items-id" value="${item['id']}">
    `
}

function cleanSkillForms() {
    const forms = document.getElementsByClassName('skill-item-form-show');
    const views = document.getElementsByClassName('skill-item-view');
    if (forms.length > 0) {
        for (let i=0; i<forms.length; i++) {
            forms[i].innerHTML = ''
            forms[i].className = 'skill-item-form-hide'
        }
    }
    if (views.length > 0) {
        for (let i=0; i<views.length; i++) {
            if (views[i].children[0].children[0].textContent === '') {
                views[i].parentNode.remove()
            } else {
                views[i].classList.remove('hidden')
            }
        }
    }
}

function setNewSkill() {
    const div = document.createElement('div');
    div.innerHTML = `
        <div class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move skill-item-view handle hidden">
            ${setSkillItem(emptySkillData)}
        </div>
        <div class="skill-item-form-show mb-4">
            ${setSkillForm(emptySkillData)}
        </div>
    `
    return div;
}

function saveSkillItem(item) {
    const skill_name_input = document.getElementById('skill_name');
    const skill_level_input = document.getElementById('skill_level');
    const field_form_error = document.getElementById('skill_fill_form_error');
    field_form_error.classList.add('hidden')

    const inputs = [skill_name_input, skill_level_input];
    const empty_inputs = [];

    for (let i=0; i<inputs.length; i++) {
        if (inputs[i].value == null || inputs[i].value === '') {
            empty_inputs.push(inputs[i])
        } else {
            inputs[i].className = "mt-1";
        }
    }

    if (empty_inputs.length > 0) {
        for (let i=0; i<empty_inputs.length; i++) {
            empty_inputs[i].className += " border-red-600 focus:border-red-500 focus:ring-red-500";
        }
        field_form_error.classList.remove('hidden')
        return
    }

    const parent = item.parentNode.parentNode.parentNode;
    const item_id = parent.querySelector('.skill-items-id');
    const data = {
        'skill_name': skill_name_input.value,
        'skill_level': skill_level_input.value,
    };

    if (item_id) {
        dbUpdateSkill(item_id.value, data, parent, addInnerSkillHTML);
    } else {
        dbCreateSkill(data, parent, addInnerSkillHTML);
    }
}
function addInnerSkillHTML(parent, data) {
    parent.innerHTML = `
        <div id="skill_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move skill-item-view handle">
            ${setSkillItem(data)}
        </div>
        <div id="skill_item_form_1" class="skill-item-form-hide">

        </div>
        <input type="hidden" name="skill_items_ids[]" class="skill-items-id" value="${data['id']}">
    `
    setSkillPosition(parent)
}

function deleteSkillItem(item) {
    const parent = item.parentNode.parentNode.parentNode;
    const item_id = parent.querySelector('.skill-items-id');
    if (item_id) {
        dbDeleteSkill(item_id.value, parent, removeSkillParent);
    } else {
        parent.remove();
        setSkillPosition(parent)
    }
}
function removeSkillParent(parent, deleted) {
    if (deleted) {
        parent.remove();
        setSkillPosition(parent)
    }
}

function setSkillItem(data) {
    return `
            <div class="handle">
                <p class="handle">${data['skill_name']}</p>
                <small class="handle">${getSkillLevel(data['skill_level'])}</small>
            </div>
            <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editSkillItem(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteSkillItem(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                    <div class="cursor-move handle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 handle">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
            </div>
    `
}

function setSkillForm(data) {
    return `
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="skill_name" class="block text-sm font-medium text-gray-700">${document.getElementById('Compétence').value}</label>
                    <input type="text" id="skill_name" name="skill_name" value="${data['skill_name']}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="skill_level" class="block text-sm font-medium text-gray-700">${document.getElementById('Niveau').value}</label>
                    <select id="skill_level" name="skill_level" class="mt-1">
                        <option disabled selected value="" class="select-option-js">${document.getElementById('Veuillez_sélectionner').value}...</option>
                        ${setSelectLevelOption(getSkillsLevelList(), data['skill_level'])}
                    </select>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end gap-x-3">
                <p class="text-red-500 text-sm hidden" id="skill_save_before_error">${document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value}</p>
                <p class="text-red-500 text-sm hidden" id="skill_fill_form_error">${document.getElementById('Veuillez_remplir_tous_les_champs').value}</p>
                <a onclick="deleteSkillItem(this)"
                    class="flex items-center gap-x-2 border-2 px-2 py-1 text-gray-600 rounded hover:text-red-500 hover:cursor-pointer font-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                    <span class="hover:underline text-sm delete-button-js">
                        ${document.getElementById('Effacer').value}
                    </span>
                </a>

                <a onclick="saveSkillItem(this)"
                    class="flex items-center gap-x-2 border-2 px-2 py-1 text-gray-600 rounded hover:text-blue-500 hover:cursor-pointer font-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M5.478 5.559A1.5 1.5 0 016.912 4.5H9A.75.75 0 009 3H6.912a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H15a.75.75 0 000 1.5h2.088a1.5 1.5 0 011.434 1.059l2.213 7.191H17.89a3 3 0 00-2.684 1.658l-.256.513a1.5 1.5 0 01-1.342.829h-3.218a1.5 1.5 0 01-1.342-.83l-.256-.512a3 3 0 00-2.684-1.658H3.265l2.213-7.191z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v6.44l1.72-1.72a.75.75 0 111.06 1.06l-3 3a.75.75 0 01-1.06 0l-3-3a.75.75 0 011.06-1.06l1.72 1.72V3a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                    <span class="hover:underline text-sm save-button-js">
                        ${document.getElementById('Sauvegarder').value}
                    </span>
                </a>
            </div>
    `
}

function getSkillsLevelList() {
    const skills_level_table = {
        'fr': ['Débutant', 'Comptétent', 'Experimenté', 'Expert'],
        'en': ['Beginner', 'Skilled', 'Experienced', 'Expert'],
        'de': ['Einsteiger', 'Geübt', 'Erfahren', 'Experte'],
    }
    return skills_level_table[document.getElementById('app_locale').value]
}

function setSkillPosition(container) {
    const items = container.getElementsByClassName('skill-items-id');
    let ids_position_array = [];
    for (let i=0; i<items.length; i++) {
        ids_position_array.push({
            'id': parseInt(items[i].value),
            'position': i + 1
        })
    }
    dbUpdateSkillPosition(ids_position_array)
}
