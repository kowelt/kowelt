function init() {
    let dragula_work = dragula([work_items_parent], {
        moves: function (el, container, handle) {
            return handle.classList.contains('handle');
        }
    });
    dragula_work.on('drop',function(el,target,source,sibling){
        setWorkPosition(work_items_parent)
    })

    let dragula_skill = dragula([skill_items_parent], {
        moves: function (el, container, handle) {
            return handle.classList.contains('handle');
        }
    });
    dragula_skill.on('drop',function(el,target,source,sibling){
        setSkillPosition(skill_items_parent)
    })

    let dragula_language = dragula([language_items_parent], {
        moves: function (el, container, handle) {
            return handle.classList.contains('handle');
        }
    });
    dragula_language.on('drop',function(el,target,source,sibling){
        setLanguagePosition(language_items_parent)
    })

    let dragula_hobby = dragula([hobby_items_parent], {
        moves: function (el, container, handle) {
            return handle.classList.contains('handle');
        }
    });
    dragula_hobby.on('drop',function(el,target,source,sibling){
        setHobbyPosition(hobby_items_parent)
    })
}
