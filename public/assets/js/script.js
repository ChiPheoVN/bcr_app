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
        });
    },
    loanAgreement: function() {
        try {
            handle.setDatePicker('.date-picker');
        } catch (error) {
            console.log(error);
        }
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
    handle.loanAgreement();
    handle.setFormatNumber(null, function(_curSelector, _number, _currency) {
        $(_curSelector).text(_currency);
    });
    handle.setDataTable();
});