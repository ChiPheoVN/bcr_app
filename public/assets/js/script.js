var init = {
    tooltip : () => {
        $('[data-toggle="tooltip"]').tooltip()
    }
}
var util = {
    getCsrfToken: function(_callback) {
        $.get('csrf-token').done(function(data) {
            _callback(data.csrf_token);
        });
    }
}
var handle = {
    user: function() {
        $(document).on('click', 'a.btn_delete_user', function() {
            let _modalSelector = $(this).data('target');
            let _modal = $(_modalSelector);
            handle.getCsrfToken((_token) => {
                _modal.find('form input[type="hidden"][name="_token"]').val(_token);
            });
            // set form action
            _modal.find('form').attr('action', $(this).attr('href'));
            _modal.find('div.modal-body').text($(this).data('modal-body-text'));
        }).on('click','input.chk_select_all_user', function(){
            let checked = $(this).prop('checked');
            $('input.chk_select_user').map((_i,_e) => {
                $(_e).prop('checked', checked);                
            });
            
            if($('input.chk_select_user:checked').length >= 1){
                $('a.btn-delete-multiple-users').removeClass('d-none');
                $('div.dropdown-set-users-status-container').removeClass('d-none');
            }
            else{
                $('a.btn-delete-multiple-users').addClass('d-none');
                $('div.dropdown-set-users-status-container').addClass('d-none');
            }
        }).on('click','input.chk_select_user', function(){            
            // set check all check box
            let checkAllUserChecked = $('input.chk_select_user:checked').length == $('input.chk_select_user').length;            
            $('input.chk_select_all_user').prop('checked', checkAllUserChecked);

            if($('input.chk_select_user:checked').length >= 1){
                $('a.btn-delete-multiple-users').removeClass('d-none');
                $('div.dropdown-set-users-status-container').removeClass('d-none');
            }
            else{
                $('a.btn-delete-multiple-users').addClass('d-none');
                $('div.dropdown-set-users-status-container').addClass('d-none');
            }
        }).on('show.bs.modal','#modalDeleteMultipleUsersConfirm', function(){
            let modal = $('#modalDeleteMultipleUsersConfirm');
            // check input from check box table
            $('input.chk_select_user').map((_i,_e) => {
                let _checked = $(_e).prop('checked');
                let _val = $(_e).val();
                $('form.form-delete-multiple-users input[name="user[]"][value="' + _val + '"]').prop('checked', _checked);
            });

            // set text append modal body
            $(this).find('form.form-delete-multiple-users input[name="user[]"]:checked').map((_i, _e) => {
                let _textAppend = $(_e).data('modal-body-text-append');
                $(modal).find('.modal-body').append(_textAppend + '<br>');
            });

            // get csrf tokend
            handle.getCsrfToken((_token) => {
                $('form.form-delete-multiple-users input[type="hidden"][name="_token"]').val(_token);
            });
        });
    },
    loanAgreement: function() {
        $(document).on('change', 'input.loan_money, input.percent_of_interest', function() {
            let _loanMoney = $('input.loan_money').val();
            let _percentOfInterest = $('input.percent_of_interest').val();
            let _expectedInterestMoney = (parseFloat(_loanMoney) / 100) * parseFloat(_percentOfInterest);
            $('input.expected_interest_money').val(_expectedInterestMoney);
        }).on('click', 'a.btn_delete_loan_agreement', function() {
            let _modalSelector = $(this).data('target');
            let _modal = $(_modalSelector);
            handle.getCsrfToken((_token) => {
                _modal.find('form input[type="hidden"][name="_token"]').val(_token);
            });
            // set form action
            _modal.find('form').attr('action', $(this).attr('href'));
            _modal.find('div.modal-body').text($(this).data('modal-body-text'));
        });
        // tính lãi dự kiến
        // search customer when type customer name
    },
    getCsrfToken: function(_callback) {
        $.get('csrf-token').done(function(data) {
            _callback(data.csrf_token);
        });
    },
    setDatePicker: function(_selectors = []) {
        if (typeof _selectors == 'string') _selectors = [_selectors];

        if (typeof _selectors == 'object') {
            _selectors.map((_selector) => $(_selector).datepicker({
                format: "dd-mm-yyyy",
                date: (new Date()).now
            }));
        }
    },
    formatNumber: function(toMoney = true, _number) {
        //_number = _number.toString();
        if (toMoney) return new Intl.NumberFormat('vi', {}).format(_number);
    },
    formatDatetime: function(_datetime) {

    },
    setFormatNumber: function(_selector = null, _callback) {
        if (_selector == null) {
            _selector = $('*[data-format-number-to-currency][data-format-number-to-currency-number]');
        }

        _selector.map((_i, _e) => {
            let _number = $(_e).data('format-number-to-currency-number');
            let _currency = handle.formatNumber(true, _number);
            _callback(_e, _number, _currency);
        });
    },
    setDataTable: function(_selector = null, _options = null){
        _selector = _selector == null ? $('table[data-table]') : _selector;        
        _selector.map((_i, _e) => {
            $(_e).DataTable();            
        });
    }
}

$(function() {
    // init code 
    init.tooltip();

    handle.user();
    try {
        handle.setDatePicker('.date-picker');
    } catch (error) {
        console.log('error');
    }

    //handle.loanAgreement();
    //handle.setFormatNumber(null, function(_curSelector, _number, _currency) {
    //    $(_curSelector).text(_currency);
    //});
    //handle.setDataTable();
});