jQuery(document).ready(function($) {
    $('button').click(function(event) {
        var href = $(this).attr('id');

        $.api(href, {
            'fail': function(payload) {
                alert("I can't believe it's not chicken");
            }
        });

        event.preventDefault();
        return false;
    });
});
