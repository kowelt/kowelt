const emptyLanguageData = {
    'language_name': '',
    'language_level': '',
};

const language_items_parent = document.getElementById('language_items_parent');

function addLanguageItem() {
    const forms = document.getElementsByClassName('language-item-form-show');
    const save_before_error = document.getElementById('language_save_before_error');
    if (forms.length > 0) {
        save_before_error.classList.remove('hidden')
        setTimeout(()=>{
            save_before_error.classList.add('hidden')
        },5000)
        return
    }
    cleanLanguageForms()
    language_items_parent.appendChild(setNewLanguage());
}

function editLanguageItem(item) {
    cleanLanguageForms()
    const parent = item.parentNode.parentNode.parentNode;
    const item_id = parent.querySelector('.language-items-id');
    const item_children = parent.children;

    if (item_id) {
        dbGetLanguage(item_id.value, parent, addInnerLanguageFromHTML);
    } else {
        item_children[0].classList.add('hidden');
        item_children[1].innerHTML = setLanguageForm(emptyLanguageData);
        item_children[1].className = 'language-item-form-show mt-4 mb-4';
    }
}
function addInnerLanguageFromHTML(parent, item) {
    parent.innerHTML = `
        <div class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move language-item-view handle hidden">
            ${setLanguageItem(item)}
        </div>
        <div class="language-item-form-show mt-4 mb-4">
            ${setLanguageForm(item)}
        </div>
        <input type="hidden" name="language_items_ids[]" class="language-items-id" value="${item['id']}">
    `
}

function cleanLanguageForms() {
    const forms = document.getElementsByClassName('language-item-form-show');
    const views = document.getElementsByClassName('language-item-view');
    if (forms.length > 0) {
        for (let i=0; i<forms.length; i++) {
            forms[i].innerHTML = ''
            forms[i].className = 'language-item-form-hide'
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

function setNewLanguage() {
    const div = document.createElement('div');
    div.innerHTML = `
        <div class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move language-item-view handle hidden">
            ${setLanguageItem(emptyLanguageData)}
        </div>
        <div class="language-item-form-show mb-4">
            ${setLanguageForm(emptyLanguageData)}
        </div>
    `
    return div;
}

function saveLanguageItem(item) {
    const language_name_input = document.getElementById('language_name');
    const language_level_input = document.getElementById('language_level');
    const field_form_error = document.getElementById('language_fill_form_error');
    field_form_error.classList.add('hidden')

    const inputs = [language_name_input, language_level_input];
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
    const item_id = parent.querySelector('.language-items-id');
    const data = {
        'language_name': language_name_input.value,
        'language_level': language_level_input.value,
    };

    if (item_id) {
        dbUpdateLanguage(item_id.value, data, parent, addInnerLanguageHTML);
    } else {
        dbCreateLanguage(data, parent, addInnerLanguageHTML);
    }
}
function addInnerLanguageHTML(parent, data) {
    parent.innerHTML = `
        <div id="language_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move language-item-view handle">
            ${setLanguageItem(data)}
        </div>
        <div id="language_item_form_1" class="language-item-form-hide">

        </div>
        <input type="hidden" name="language_items_ids[]" class="language-items-id" value="${data['id']}">
    `
    setLanguagePosition(parent)
}

function deleteLanguageItem(item) {
    const parent = item.parentNode.parentNode.parentNode;
    const item_id = parent.querySelector('.language-items-id');
    if (item_id) {
        dbDeleteLanguage(item_id.value, parent, removeLanguageParent);
    } else {
        parent.remove();
        setLanguagePosition(parent)
    }
}
function removeLanguageParent(parent, deleted) {
    if (deleted) {
        parent.remove();
        setLanguagePosition(parent)
    }
}

function setLanguageItem(data) {
    return `
            <div class="handle">
                <p class="handle">${getLanguageName(data['language_name'])}</p>
                <small class="handle">${getLanguageLevel(data['language_level'])}</small>
            </div>
            <div class="w-fit flex gap-x-4 items-center">
                    <div class="cursor-pointer hover:text-blue-600" onclick="editLanguageItem(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <div class="cursor-pointer hover:text-red-600" onclick="deleteLanguageItem(this)">
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

function setLanguageForm(data) {
    return `
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="language_name" class="block text-sm font-medium text-gray-700">${document.getElementById('Langue').value}</label>
                    <select id="language_name" name="language_name" class="mt-1">
                        <option disabled selected value="" class="select-option-js">${document.getElementById('Veuillez_sélectionner').value}...</option>
                        ${setSelectLanguageOption(getLanguageList(), data['language_name'])}
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="language_level" class="block text-sm font-medium text-gray-700">${document.getElementById('Niveau').value}</label>
                    <select id="language_level" name="language_level" class="mt-1">
                        <option disabled selected value="" class="select-option-js">${document.getElementById('Veuillez_sélectionner').value}...</option>
                        ${setSelectLevelOption(getLanguageLevelList(), data['language_level'])}
                    </select>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end gap-x-3">
                <p class="text-red-500 text-sm hidden" id="language_save_before_error">${document.getElementById('Veuillez_sauvegarder_le_formulaire_en_cours').value}</p>
                <p class="text-red-500 text-sm hidden" id="language_fill_form_error">${document.getElementById('Veuillez_remplir_tous_les_champs').value}</p>
                <a onclick="deleteLanguageItem(this)"
                    class="flex items-center gap-x-2 border-2 px-2 py-1 text-gray-600 rounded hover:text-red-500 hover:cursor-pointer font-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                    <span class="hover:underline text-sm delete-button-js">
                        ${document.getElementById('Effacer').value}
                    </span>
                </a>

                <a onclick="saveLanguageItem(this)"
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

function setSelectLanguageOption(list, selected) {
    let selectOptions = ``;
    for (const [key, value] of Object.entries(list)) {
        selectOptions += `
            <option value="${key}" ${selected === key ? 'selected' : ''}>${value}</option>
        `
    }
    return selectOptions;
}

function getLanguageList() {
    return {
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
}

function getLanguageLevelList() {
    const languages_level_table = {
        'fr': ['Connaissances de base', 'Bon', 'Très bon', 'Excellent', 'Langue maternelle', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        'en': ['Basic knowledge', 'Good', 'Very Good', 'Excellent', 'Mother tongue', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        'de': ['Grundkenntnisse', 'Gut', 'Sehr gut', 'Hervorrangend', 'Muttersprache', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
    }
    return languages_level_table[document.getElementById('app_locale').value]
}

function setLanguagePosition(container) {
    const items = container.getElementsByClassName('language-items-id');
    let ids_position_array = [];
    for (let i=0; i<items.length; i++) {
        ids_position_array.push({
            'id': parseInt(items[i].value),
            'position': i + 1
        })
    }
    dbUpdateLanguagePosition(ids_position_array)
}
