jQuery(document).ready(function($) {
    var defaultHandlers = {
            'success': function(payload) {
                console.dir(console);
                console.log(payload);
                alert(JSON.stringify(payload.data));
            },
            'fail': function(payload) {
                console.warn(payload);
                alert(JSON.stringify(payload.data));
            },
            'error': function(payload) {
                console.error(payload);
                alert(payload.message);
            }
        },
        ajax = function() {
            var args = Array.prototype.slice.apply(arguments),
                handlers = $.extend({}, defaultHandlers, args.pop()),
                process = function(jqXHR) {
                    var payload = jqXHR.responseJSON,
                        handler = handlers[payload.status];
                    handler(payload);
                }
                done = function(payload, textStatus, jqXHR) {
                    process(jqXHR);
                },
                fail = process;

            $.ajax.apply(this, args)
                .done(done)
                .fail(fail);
        };

    $('button').click(function(event) {
        var href = $(this).attr('id');

        ajax(href, {
            'fail': function(payload) {
                alert("I can't believe it's not chicken");
            }
        });

        event.preventDefault();
        return false;
    });
});
