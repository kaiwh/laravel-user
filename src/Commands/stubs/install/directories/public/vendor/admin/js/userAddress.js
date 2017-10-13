+ function($) {
    var userAddress = function(element, options) {
        var _this = this;
        _this.$element = element;
        _this.options = options;
        _this.event();
    }
    userAddress.prototype.event = function() {
        var _this = this;
        _this.index(function() {
            _this.$element.find('[address-create]').on('click', function() {
                var $form = $(this).parents('form');
                _this.store($form);
                return false;
            });
            _this.$element.find('[address-edit]').on('click', function() {
                var $form = $(this).parents('form');
                _this.update($form, $(this).attr('address-edit'));
                return false;
            });
            _this.$element.find('[address-destroy]').on('click', function() {
                if (confirm($(this).attr('data-destroy-text'))) {
                    _this.destroy($(this).attr('address-destroy'), $(this));
                }
                return false;
            });
        });
    }
    userAddress.prototype.index = function(callback) {
        var _this = this;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: '/admin/user/address',
            dataType: 'html',
            data: {
                user_id: _this.options.user_id
            },
            success: function(html) {
                _this.$element.empty().append(html);
                if (typeof callback === 'function') {
                    callback();
                }
            }
        });
    }
    userAddress.prototype.store = function($form, callback) {
        var _this = this;
        _this.button('loading');
        var data = {
            user_id: $form.find('input[name=user_id]').val(),
            name: $form.find('input[name=name]').val(),
            mobile: $form.find('input[name=mobile]').val(),
            province_id: $form.find('input[name=province_id]').val(),
            province: $form.find('input[name=province]').val(),
            city_id: $form.find('input[name=city_id]').val(),
            city: $form.find('input[name=city]').val(),
            district_id: $form.find('input[name=district_id]').val(),
            district: $form.find('input[name=district]').val(),
            address: $form.find('input[name=address]').val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/user/address/store',
            dataType: 'json',
            data: data,
        }).done(function(data) {
            $('.modal').modal('hide');
            _this.button('reset');
            _this.event();
            alert(data.success);
        }).fail(function(data) {
            html = '<div class="alert alert-danger"  role="alert"><ul>';
            $.each(data.responseJSON, function(key, value) {
                html += '<li>' + value + '</li>';
            });
            html += '</ul><div>';
            $form.parent().find('.alert-danger').remove();
            $form.before(html);
            _this.button('reset');
        });
    }
    userAddress.prototype.update = function($form, address_id, callback) {
        var _this = this;
        _this.button('loading');
        var url = '/admin/user/address/' + address_id + '/update';
        var data = {
            name: $form.find('input[name=name]').val(),
            mobile: $form.find('input[name=mobile]').val(),
            province_id: $form.find('input[name=province_id]').val(),
            province: $form.find('input[name=province]').val(),
            city_id: $form.find('input[name=city_id]').val(),
            city: $form.find('input[name=city]').val(),
            district_id: $form.find('input[name=district_id]').val(),
            district: $form.find('input[name=district]').val(),
            address: $form.find('input[name=address]').val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            dataType: 'json',
            data: data,
        }).done(function(data) {
            $('.modal').modal('hide');
            _this.button('reset');
            _this.event();
            alert(data.success);
        }).fail(function(data) {
            html = '<div class="alert alert-danger"  role="alert"><ul>';
            $.each(data.responseJSON, function(key, value) {
                html += '<li>' + value + '</li>';
            });
            html += '</ul><div>';
            $form.parent().find('.alert-danger').remove();
            $form.before(html);
            _this.button('reset');
        });
    }
    userAddress.prototype.destroy = function(address_id, $this) {
        var _this = this;
        _this.button('loading');
        var url = '/admin/user/address/' + address_id + '/destroy';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: url,
            dataType: 'json',
            data: {},
        }).done(function(data) {
            $('.modal').modal('hide');
            $this.parents('tr').remove();
            _this.button('reset');
            alert(data.success);
        });
    }
    userAddress.prototype.button = function(text = 'loading') {
        var _this = this;
        _this.$element.find('button').button(text);
    }
    $.fn.userAddress = function(options) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('k.userAddress')
            if (!data) $this.data('k.userAddress', (data = new userAddress($this, options)))
        });
    }
}(jQuery);