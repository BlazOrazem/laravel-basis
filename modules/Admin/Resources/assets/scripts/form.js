var Form = (function () {

    /**
     * Define form classes, currently set for Bootstrap 3 admin theme.
     */
    var _formValidate = 'form-validate';
    var _successColor = 'success-color';
    var _inputSuccess = 'input-success';
    var _formGroup = 'form-group';
    var _helpBlock = 'help-block';
    var _hasError = 'has-error';

    return {
        init: function () {
            $('.' + _formValidate).bind('submit', function(e) {
                e.preventDefault(e);
                Form.validateForm($(this));
            });

            $('.' + _formValidate + ' input').bind('blur', function() {
                Form.validateInputField($(this));
            });

            $('input[name="toggle"]').bind('click', function() {
                http.post($(this).data('toggle'));
            });
        },

        serialize: function (form) {
            var data = form.serializeArray();
            var result = {};

            $.each(data, function(key, item) {
                result[item.name] = item.value;
            });

            return result;
        },

        errors: function (data) {
            return $.parseJSON(data.responseText);
        },

        getGroupFor: function (form, name) {
            return form.find('[name=' + name + ']').closest('.' + _formGroup);
        },

        failFor: function (item, errorMsg) {
            item.addClass(_hasError);
            item.find('label').removeClass(_successColor);
            item.find('input').removeClass(_inputSuccess);
            item.find('.' + _helpBlock).html(errorMsg.join(' '));
        },

        successFor: function (item) {
            item.removeClass(_hasError);
            item.find('label').addClass(_successColor);
            item.find('input').addClass(_inputSuccess);
            item.find('.' + _helpBlock).html('');
        },

        validateForm: function (form) {
            http.post(form.attr('action'), Form.serialize(form))
                .success(function() {
                    form[0].submit();
                })
                .error(function(data) {
                    $.each(Form.errors(data), function(fieldName, error) {
                        Form.failFor(Form.getGroupFor(form, fieldName), error);
                    });
                });
        },

        validateInputField: function (field) {
            var form = field.closest('form');
            var fieldName = field.attr('name');
            
            if ($(field).hasClass('uri-slug')) {
                $(field).val(Form.slugify($(field).val()));
            }

            if ($(field).hasClass('snake-slug')) {
                $(field).val(Form.snakify($(field).val()));
            }

            http.post(form.attr('action'), Form.serialize(form))
                .success(function() {
                    Form.successFor(Form.getGroupFor(form, fieldName));
                })
                .error(function(data) {
                    var item = Form.getGroupFor(form, fieldName);

                    if (item.hasClass(_hasError)) {
                        Form.successFor(item);
                    }

                    $.each(Form.errors(data), function(name, error) {
                        if (name == fieldName) {
                            Form.failFor(Form.getGroupFor(form, fieldName), error);
                        }
                    });
                });
        },

        slugify: function (text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        },

        snakify: function (text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '_')           // Replace spaces with _
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/__+/g, '_')           // Replace multiple _ with single _
                .replace(/^_+/, '')             // Trim _ from start of text
                .replace(/_+$/, '');            // Trim _ from end of text
        }
    };
})();