(function($) {
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
        };

    $.api = function() {
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

        return $.ajax.apply(this, args)
            .done(done)
            .fail(fail);
    };

}(jQuery));
