grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute('6LcDgBkmAAAAAF3qwtzfEvpYmY7aitWUC29aUhfq', {action: '/ugg/register'}).then(function(token) {
        document.getElementById('recaptcha_token').value = token;
    });
});

/*function executeRecaptcha() {
    grecaptcha.enterprise.execute('6LcZNzMkAAAAAKVlE2S8WlL2ZGabHe9QTUMMf-1g', {action: '/ugg/register'}).then(function(token) {
        document.getElementById('recaptcha_token').value = token;
    });
    return true
}*/

/*$('#register_ugg').submit(function(eventObj) {
    grecaptcha.enterprise.execute('6LcZNzMkAAAAAKVlE2S8WlL2ZGabHe9QTUMMf-1g', {action: '/ugg/register'}).then(function(token) {
        // document.getElementById('recaptcha_token').value = token;
        $("<input />").attr("type", "hidden")
            .attr("name", "something")
            .attr("value", "something")
            .appendTo("#register_ugg");
        return true;
    });
});*/

/*$('#register_ugg').submit(function() {
    grecaptcha.enterprise.execute('6LcZNzMkAAAAAKVlE2S8WlL2ZGabHe9QTUMMf-1g', {action: '/ugg/register'}).then(function(token) {
        document.getElementById('recaptcha_token').value = token;
    });
    alert('token');
    return true
});*/
