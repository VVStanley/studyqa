
StudyqaObject = {

    notification : function (display) {

        $('.notification').css('display', display);
    },

    ajax : function (data, action, callback) {

        $.ajax({

            url: action,
            type: 'POST',
            data: data,
            // dataType: 'json',

            success: function (response) {

                console.log('ok');
                callback(response);
            },

            error: function (response) {

                console.log('bad');
                console.log(response);
            }
        })
    }
};



$(document).ready(function() {

    $('.ajax-form').submit(function (e) {
        e.preventDefault();

        StudyqaObject.notification('none');

        StudyqaObject.ajax
        (
            $(this).serialize(),
            $(this).attr('action'),

            function (response) {

                if (response.customer) {
                    StudyqaObject.notification('block');
                    $('.notification .alert').html('Вы успешно зарегестрировались')
                }
                console.log(response)
            }
        )
    });

});