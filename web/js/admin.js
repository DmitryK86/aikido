$(document).ready(function () {
    (function () {
        var slug = $('[id*="-slug"]');

        if (slug.length > 0) {
            slug.wrap('<div class="input-group">')
            var button = $('<span class="input-group-btn">').append('<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-refresh"></i></button>');

            button.on('click', null, function (e) {
                e.preventDefault();
                e.stopPropagation();
                jQuery.ajax('/admin/admin/slug', {
                    data: {str: slug.val()}
                }).done(function (data) {
                    var res = data.replace(/"/g, '');
                    slug.val(res);
                    $(button).find('button').attr('class','btn btn-default');
                });
                return false;
            });
            slug.after(button);
        }
    })();
});