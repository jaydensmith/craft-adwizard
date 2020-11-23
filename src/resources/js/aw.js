// Ad Wizard JS
var adWizard = {
    click: function (id, url) {

        // Set data
        var data = {'id':id};
        data[window.csrfTokenName] = window.csrfTokenValue; // Append CSRF Token

        // Tally click
        window.superagent
            .post('/actions/ad-wizard/tracking/click')
            .send(data)
            .type('form')
            .set('X-Requested-With','XMLHttpRequest')
            .end(function (response) {
                var message = JSON.parse(response.text);
                console.log(message);

                window.location.href = url;
            })
        ;

    }
};
