if (document.getElementById('work_items_parent')) {
    // const avatar_div = document.getElementById('avatar_div');
    // const documents_div = document.getElementById('documents_div');
    const section_2 = document.getElementById('section_2');
    window.onbeforeunload = function() {
        if (section_2.value !== 'verify') {
            localStorage.setItem('work_items_parent', work_items_parent.innerHTML);
            localStorage.setItem('skill_items_parent', skill_items_parent.innerHTML);
            localStorage.setItem('language_items_parent', language_items_parent.innerHTML);
            localStorage.setItem('hobby_items_parent', hobby_items_parent.innerHTML);
        }
    }
    window.onload = function() {
        if (section_2.value !== 'verify') {
            if (localStorage.getItem('work_items_parent')) {
                work_items_parent.innerHTML = localStorage.getItem('work_items_parent');
                skill_items_parent.innerHTML = localStorage.getItem('skill_items_parent');
                language_items_parent.innerHTML = localStorage.getItem('language_items_parent');
                hobby_items_parent.innerHTML = localStorage.getItem('hobby_items_parent');
                setTranslate()
            }
            setUggCities(document.getElementById('session'))
            init();
        } else {
            localStorage.removeItem('work_items_parent');
            localStorage.removeItem('skill_items_parent');
            localStorage.removeItem('language_items_parent');
            localStorage.removeItem('hobby_items_parent');
        }
    }
} else {
    window.onload = function() {
        localStorage.removeItem('work_items_parent');
        localStorage.removeItem('skill_items_parent');
        localStorage.removeItem('language_items_parent');
        localStorage.removeItem('hobby_items_parent');
    }
}
