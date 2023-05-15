const toggleSelectFlag = document.getElementById("toggleSelectFlag");
const select_flag = document.getElementById("select_flag");

if (toggleSelectFlag && select_flag) {
    toggleSelectFlag.addEventListener('click', (event) => {
        select_flag.classList.toggle("hidden");
    });
}

const toggleSelectFlag_2 = document.getElementById("toggleSelectFlag_2");
const select_flag_2 = document.getElementById("select_flag_2");

if (toggleSelectFlag_2 && select_flag_2) {
    toggleSelectFlag_2.addEventListener('click', (event) => {
        select_flag_2.classList.toggle("hidden");
    });
}

const toggleSelectAccountOption = document.getElementById("toggleSelectAccountOption");
const select_account_option = document.getElementById("select_account_option");

if (toggleSelectAccountOption && select_account_option) {
    toggleSelectAccountOption.addEventListener('click', (event) => {
        select_account_option.classList.toggle("hidden");
    });
}

const toggleSelectAccountOption_2 = document.getElementById("toggleSelectAccountOption_2");
const select_account_option_2 = document.getElementById("select_account_option_2");

if (toggleSelectAccountOption_2 && select_account_option_2) {
    toggleSelectAccountOption_2.addEventListener('click', (event) => {
        select_account_option_2.classList.toggle("hidden");
    });
}

const input_password = document.getElementById("password");
const password_show = document.getElementById("password_show");
const password_hide = document.getElementById("password_hide");
if (input_password) {
    input_password.addEventListener('focusin', (event) => {
        if (input_password.getAttribute('type') === 'password') {
            password_show.classList.remove("hidden");
        } else {
            password_hide.classList.remove("hidden");
        }
    });

    password_show.addEventListener('click', (event) => {
        input_password.setAttribute('type', 'text');
        password_show.classList.add("hidden");
        password_hide.classList.remove("hidden");
    });

    password_hide.addEventListener('click', (event) => {
        input_password.setAttribute('type', 'password');
        password_hide.classList.add("hidden");
        password_show.classList.remove("hidden");
    });
}

const input_password_confirmation = document.getElementById("password_confirmation");
const password_show_2 = document.getElementById("password_show_2");
const password_hide_2 = document.getElementById("password_hide_2");
if (input_password_confirmation) {
    input_password_confirmation.addEventListener('focusin', (event) => {
        if (input_password_confirmation.getAttribute('type') === 'password') {
            password_show_2.classList.remove("hidden");
        } else {
            password_hide_2.classList.remove("hidden");
        }
    });

    password_show_2.addEventListener('click', (event) => {
        input_password_confirmation.setAttribute('type', 'text');
        password_show_2.classList.add("hidden");
        password_hide_2.classList.remove("hidden");
    });

    password_hide_2.addEventListener('click', (event) => {
        input_password_confirmation.setAttribute('type', 'password');
        password_hide_2.classList.add("hidden");
        password_show_2.classList.remove("hidden");
    });
}

const old_password = document.getElementById("old_password");
const password_show_3 = document.getElementById("password_show_3");
const password_hide_3 = document.getElementById("password_hide_3");
if (old_password) {
    old_password.addEventListener('focusin', (event) => {
        if (old_password.getAttribute('type') === 'password') {
            password_show_3.classList.remove("hidden");
        } else {
            password_hide_3.classList.remove("hidden");
        }
    });

    password_show_3.addEventListener('click', (event) => {
        old_password.setAttribute('type', 'text');
        password_show_3.classList.add("hidden");
        password_hide_3.classList.remove("hidden");
    });

    password_hide_3.addEventListener('click', (event) => {
        old_password.setAttribute('type', 'password');
        password_hide_3.classList.add("hidden");
        password_show_3.classList.remove("hidden");
    });
}

const education_items_body = document.getElementById('education_items_body');
const work_items_body = document.getElementById('work_items_body');
const skill_items_body = document.getElementById('skill_items_body');
const language_items_body = document.getElementById('language_items_body');
const hobby_items_body = document.getElementById('hobby_items_body');
const section_3 = document.getElementById('section_3');
const to_delete_svg = document.getElementsByClassName('w-5');
if (education_items_body) {
    window.onbeforeunload = function() {
        localStorage.setItem('education_items_body', education_items_body.innerHTML);
        localStorage.setItem('work_items_body', work_items_body.innerHTML);
        localStorage.setItem('skill_items_body', skill_items_body.innerHTML);
        localStorage.setItem('language_items_body', language_items_body.innerHTML);
        localStorage.setItem('hobby_items_body', hobby_items_body.innerHTML);
    }

    window.onload = function() {
        education_items_body.innerHTML = localStorage.getItem('education_items_body')
        work_items_body.innerHTML = localStorage.getItem('work_items_body')
        skill_items_body.innerHTML = localStorage.getItem('skill_items_body')
        language_items_body.innerHTML = localStorage.getItem('language_items_body')
        hobby_items_body.innerHTML = localStorage.getItem('hobby_items_body')

        if (to_delete_svg && section_3.value === 'verify') {
            for (let i=0; i<to_delete_svg.length; i++) {
                to_delete_svg[i].classList.add('hidden')
            }
        }

        if (to_delete_svg && section_3.value !== 'verify') {
            for (let i=0; i<to_delete_svg.length; i++) {
                to_delete_svg[i].classList.remove('hidden')
            }
        }
    }
}

/*const work_items_body = document.getElementById('work_items_body');
if (work_items_body) {
    window.onbeforeunload = function() {
        localStorage.setItem('work_items_body', work_items_body.innerHTML);
    }

    window.onload = function() {
        work_items_body.innerHTML = localStorage.getItem('work_items_body')
    }
}

const skill_items_body = document.getElementById('skill_items_body');
if (skill_items_body) {
    window.onbeforeunload = function() {
        localStorage.setItem('skill_items_body', skill_items_body.innerHTML);
    }

    window.onload = function() {
        skill_items_body.innerHTML = localStorage.getItem('skill_items_body')
    }
}

const language_items_body = document.getElementById('language_items_body');
if (language_items_body) {
    window.onbeforeunload = function() {
        localStorage.setItem('language_items_body', language_items_body.innerHTML);
    }

    window.onload = function() {
        language_items_body.innerHTML = localStorage.getItem('language_items_body')
    }
}

const hobby_items_body = document.getElementById('hobby_items_body');
if (hobby_items_body) {
    window.onbeforeunload = function() {
        localStorage.setItem('hobby_items_body', hobby_items_body.innerHTML);
    }

    window.onload = function() {
        hobby_items_body.innerHTML = localStorage.getItem('hobby_items_body')
    }
}*/

import './education';
import './work';
import './skill';
import './language';
import './hobby';

/*
callToAction.addEventListener('click', (event) => {
    document.getElementById("products").scrollIntoView({behavior: 'smooth', block: 'center'})
});
*/

