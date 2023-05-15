const emptyWorkData = {
    'work_title': '',
    'work_city': '',
    'work_employer': '',
    'work_start_date': '',
    'work_end_date': '',
    'work_description': '',
};

const work_items_parent = document.getElementById('work_items_parent');

function addNewItem() {
    const forms = document.getElementsByClassName('work-item-form-show');
    const save_before_error = document.getElementById('save_before_error');
    if (forms.length > 0) {
        save_before_error.classList.remove('hidden')
        setTimeout(()=>{
            save_before_error.classList.add('hidden')
        },5000)
        return
    }
    cleanForms()
    work_items_parent.appendChild(setNewWork());
}

function editWorkUgg(item) {
    cleanForms()
    const workItemParent = item.parentNode.parentNode.parentNode;
    const workItemId = workItemParent.querySelector('.work-items-id');
    const workItemChildren = workItemParent.children;

    if (workItemId) {
        dbGetWork(workItemId.value, workItemParent, addInnerFromHTML);
    } else {
        workItemChildren[0].classList.add('hidden');
        workItemChildren[1].innerHTML = setForm(emptyWorkData);
        workItemChildren[1].className = 'work-item-form-show mt-4 mb-4';
    }
}
function addInnerFromHTML(workItemParent, work) {
    workItemParent.innerHTML = `
        <div id="work_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move work-item-view handle hidden">
            ${setItem(work)}
        </div>
        <div id="work_item_form_1" class="work-item-form-show mt-4 mb-4">
            ${setForm(work)}
        </div>
        <input type="hidden" name="work_items_ids[]" class="work-items-id" value="${work['id']}">
    `
}

function cleanForms() {
    const forms = document.getElementsByClassName('work-item-form-show');
    const views = document.getElementsByClassName('work-item-view');
    if (forms.length > 0) {
        for (let i=0; i<forms.length; i++) {
            forms[i].innerHTML = ''
            forms[i].className = 'work-item-form-hide'
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

function setNewWork() {
    const div = document.createElement('div');
    div.id = 'work_item_1';
    div.innerHTML = `
        <div id="work_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move work-item-view handle hidden">
            ${setItem(emptyWorkData)}
        </div>
        <div id="work_item_form_1" class="work-item-form-show mb-4">
            ${setForm(emptyWorkData)}
        </div>
    `
    return div;
}

function saveUggWork(item) {
    const work_title_input = document.getElementById('work_title');
    const work_city_input = document.getElementById('work_city');
    const work_employer_input = document.getElementById('work_employer');
    const work_start_date_input = document.getElementById('work_start_date');
    const work_end_date_input = document.getElementById('work_end_date');
    const work_description_input = document.getElementById('work_description');
    const error_1 = document.getElementById('dates_less_than_today_work_error');
    const error_2 = document.getElementById('start_date_less_than_end_date_work_error');
    const ugg_work_error = document.getElementById('ugg_work_error');
    ugg_work_error.classList.add('hidden')

    const inputs = [work_title_input, work_city_input, work_employer_input, work_start_date_input, work_end_date_input, work_description_input];
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
        ugg_work_error.classList.remove('hidden')
        return
    }

    if (datesInvalid(work_start_date_input, work_end_date_input, error_1, error_2)) {
        return;
    }

    const workItemParent = item.parentNode.parentNode.parentNode;
    const workItemId = workItemParent.querySelector('.work-items-id');
    const workData = {
        'work_title': work_title_input.value,
        'work_city': work_city_input.value,
        'work_employer': work_employer_input.value,
        'work_start_date': work_start_date_input.value,
        'work_end_date': work_end_date_input.value,
        'work_description': work_description_input.value,
    };

    if (workItemId) {
        dbUpdateWork(workItemId.value, workData, workItemParent, addInnerHTML);
    } else {
        dbCreateWork(workData, workItemParent, addInnerHTML);
    }
}
function addInnerHTML(workItemParent, work) {
    workItemParent.innerHTML = `
        <div id="work_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move work-item-view handle">
            ${setItem(work)}
        </div>
        <div id="work_item_form_1" class="work-item-form-hide">

        </div>
        <input type="hidden" name="work_items_ids[]" class="work-items-id" value="${work['id']}">
    `
    setWorkPosition(work_items_parent)
}

function deleteUggWork(item) {
    const workItemParent = item.parentNode.parentNode.parentNode;
    const workItemId = workItemParent.querySelector('.work-items-id');
    if (workItemId) {
        dbDeleteWork(workItemId.value, workItemParent, removeParent);
    } else {
        workItemParent.remove();
        setWorkPosition(work_items_parent)
    }
}
function removeParent(workItemParent, deleted) {
    if (deleted) {
        workItemParent.remove();
        setWorkPosition(work_items_parent)
    }
}

function setItem(data) {
    return `
            <div class="handle">
                <p class="handle">${data['work_title']}</p>
                <small class="handle">${data['work_start_date_string']} - ${data['work_end_date_string']}</small>
            </div>
            <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editWorkUgg(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteUggWork(this)">
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

function setForm(data) {
    return `
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="work_title" class="block text-sm font-medium text-gray-700">${document.getElementById('Intitulé_De_Poste').value}</label>
                    <input type="text" id="work_title" name="work_title" value="${data['work_title']}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="work_city" class="block text-sm font-medium text-gray-700">${document.getElementById('Ville').value}</label>
                    <input type="text" id="work_city" name="work_city" value="${data['work_city']}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6">
                    <label for="work_employer" class="block text-sm font-medium text-gray-700">${document.getElementById('Employeur').value}</label>
                    <input type="text" id="work_employer" name="work_employer" value="${data['work_employer']}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="work_start_date" class="block text-sm font-medium text-gray-700">${document.getElementById('Date_De_Debut').value}</label>
                    <input type="month" id="work_start_date" name="work_start_date" value="${data['work_start_date'].slice(0, -3)}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="work_end_date" class="block text-sm font-medium text-gray-700">${document.getElementById('Date_De_Fin').value}</label>
                    <input type="month" id="work_end_date" name="work_end_date" value="${data['work_end_date'].slice(0, -3)}" class="mt-1" maxlength="255">
                </div>

                <div class="col-span-6">
                    <label for="work_description" class="block text-sm font-medium text-gray-700">${document.getElementById('Description').value}</label>
                    <textarea rows="3" id="work_description" name="work_description" class="mt-1" maxlength="255">${data['work_description']}</textarea>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end gap-x-3">
                <p class="text-red-500 text-sm hidden" id="save_before_error">${document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value}</p>
                <p class="text-red-500 text-sm hidden" id="ugg_work_error">${document.getElementById('Veuillez_remplir_tous_les_champs').value}</p>
                <p class="text-red-500 text-sm hidden" id="dates_less_than_today_work_error">${document.getElementById('dates_less_than_today').value}</p>
                <p class="text-red-500 text-sm hidden" id="start_date_less_than_end_date_work_error">${document.getElementById('start_date_less_than_end_date').value}</p>
                <a onclick="deleteUggWork(this)"
                    class="flex items-center gap-x-2 border-2 px-2 py-1 text-gray-600 rounded hover:text-red-500 hover:cursor-pointer font-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                    <span class="hover:underline text-sm delete-button-js">
                        ${document.getElementById('Effacer').value}
                    </span>
                </a>

                <a onclick="saveUggWork(this)"
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

function datesInvalid(start_date_input, end_date_input, dates_less_than_today_error, start_date_less_than_end_date_error) {
    const current_month = ('0' + (new Date().getMonth() + 1)).slice(-2)
    const current_year = new Date().getFullYear()
    const today = current_year + '-' + current_month
    // let dates_invalid = false

    // console.log(today, start_date_input.value, end_date_input.value)

    if (today < start_date_input.value || today < end_date_input.value) {
        dates_less_than_today_error.classList.remove('hidden')
        setTimeout(()=>{
            dates_less_than_today_error.classList.add('hidden')
        },10000)
        // dates_invalid = true
        return true
    } else if (start_date_input.value > end_date_input.value) {
        start_date_less_than_end_date_error.classList.remove('hidden')
        setTimeout(()=>{
            start_date_less_than_end_date_error.classList.add('hidden')
        },10000)
        // dates_invalid = true
        return true
    } else {
        return false
    }

    // return dates_invalid

}

function setWorkPosition(container) {
    const work_items = container.getElementsByClassName('work-items-id');
    let ids_position_array = [];
    for (let i=0; i<work_items.length; i++) {
        ids_position_array.push({
            'work_id': parseInt(work_items[i].value),
            'work_position': i + 1
        })
    }
    dbUpdateWorkPosition(ids_position_array)
}

// setCookie('cookieName', 'new Item added v4', 7);
/*function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}*/
