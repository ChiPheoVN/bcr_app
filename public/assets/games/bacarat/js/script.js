var bacaratConfig = {
    removeTieResultInProcedure : false
}
var allowProcedures = [
    'procedure1',
    'procedure2',
    'procedure3',
    'procedure4',
    'procedure5',
    'procedure6',
    'procedure7',
    'procedure8',
];
var winRate = [
    {guess: 4, total: 5, rate : 72},
    {guess: 3, total: 5, rate : 61},
    {guess: 5, total: 6, rate : 76},
    {guess: 4, total: 6, rate : 65},
    {guess: 3, total: 6, rate : 55},
    {guess: 6, total: 7, rate : 81},
    {guess: 5, total: 7, rate : 70},
    {guess: 4, total: 7, rate : 57},
    {guess: 7, total: 8, rate : 79},
    {guess: 6, total: 8, rate : 73},
    {guess: 5, total: 8, rate : 62.5},
    {guess: 4, total: 8, rate : 55},
];
var winnerLog = [];
var cardArr = [
    {number : 0, point : 0, value : 0},
    {number : 1, point : 1, value : -1},
    {number : 2, point : 2, value : 1},
    {number : 3, point : 3, value : 1},
    {number : 4, point : 4, value : 1},
    {number : 5, point : 5, value : 1},
    {number : 6, point : 6, value : 1},
    {number : 7, point : 7, value : 0},
    {number : 8, point : 8, value : 0},
    {number : 9, point : 9, value : 0},
    {number : 10, point : 0, value : -1},
    {number : 11, point : 0, value : -1},
    {number : 12, point : 0, value : -1},
    {number : 13, point : 0, value : -1},
];
var setCardNumber = 8;
var totalValue = 0;

var bacaratInit = {
    setupSetCard : () => {
        cardArr = cardArr.map(_c => {_c.remain = setCardNumber * 4; return _c;})
    },
    initTableScoreBoard : () => {
        $('table.table-score-board tbody tr').remove();
        let rows = 6;
        let cols = 13;
        for (let row = 0; row < rows; row ++) {
            let tr = $('<tr>');
            for (let col = 0; col < cols; col ++) {
                let td = $('<td>',{
                    'data-phase' : row*cols + col
                });
                tr.append(td);
            }

            $('table.table-score-board tbody').append(tr);
        }
    },
    createRandomWinnerLog : () => {
        let numberPhase = 15;
        let cardNumber = [1,2,3,4,5,6,7,8,9,10,'j','q','k', null];
        for (let index = 0; index < numberPhase; index++) {
            let pObject = {
                p1 :  cardNumber[Math.floor(Math.random() * cardNumber.length)],
                p2 :  cardNumber[Math.floor(Math.random() * cardNumber.length)],
                p3 :  cardNumber[Math.floor(Math.random() * cardNumber.length)]
            };
            let bObject = {
                b1 :  cardNumber[Math.floor(Math.random() * cardNumber.length)],
                b2 :  cardNumber[Math.floor(Math.random() * cardNumber.length)],
                b3 :  cardNumber[Math.floor(Math.random() * cardNumber.length)]
            };

            let cardPoint = bacaratHandle.calcCardPointCardGroup(pObject, bObject);

            let pv = cardPoint.pv;

            let bv = cardPoint.bv;

            pv = pv % 10;
            bv = bv % 10;

            // add winner log
            bacaratHandle.addWinnerLog(pv, bv, pObject, bObject);

            // set template result
            bacaratHandle.setTemplateResultCardGroup(pObject, bObject, bv, pv);

            // set score board
            bacaratHandle.setScoreBoardTable(pv, bv);

            // check condition to calc rate
            if(winnerLog.length >= 7){
                // calc guess winner
                let rateObject = bacaratHandle.calcWinnerRate(winnerLog);
                bacaratHandle.setGuessTable(rateObject);
            }
        }
    }
}

var bacaratHandle = {
    bacarat : function(){
        $(document).on('click','.btn-add-game-result', function(){
            // set text
            let txtCardInputPrefix = 'txt-card-input-'

            let cardInputPlayer = {
                p1 : $('table.table-card-input input.' + txtCardInputPrefix + 'p1').val(),
                p2 : $('table.table-card-input input.' + txtCardInputPrefix + 'p2').val(),
                p3 : $('table.table-card-input input.' + txtCardInputPrefix + 'p3').val()
            };
            let cardInputBanker = {
                b1 : $('table.table-card-input input.' + txtCardInputPrefix + 'b1').val(),
                b2 : $('table.table-card-input input.' + txtCardInputPrefix + 'b2').val(),
                b3 : $('table.table-card-input input.' + txtCardInputPrefix + 'b3').val()
            };

            cardInputPlayer.p1 = cardInputPlayer.p1 == '' ? null : cardInputPlayer.p1;
            cardInputPlayer.p3 = cardInputPlayer.p2 == '' ? null : cardInputPlayer.p2;
            cardInputPlayer.p3 = cardInputPlayer.p3 == '' ? null : cardInputPlayer.p3;

            cardInputBanker.b1 = cardInputBanker.b1 == '' ? null : cardInputBanker.b1;
            cardInputBanker.b2 = cardInputBanker.b2 == '' ? null : cardInputBanker.b2;
            cardInputBanker.b3 = cardInputBanker.b3 == '' ? null : cardInputBanker.b3;


            // reset input
            bacaratHandle.resetInputCardGroup();            

            // calc total value
            totalValue += bacaratHandle.calcValueCardGroup(cardInputPlayer, cardInputBanker);

            // calc remain card
            bacaratHandle.calcRemainCardSetCardGroup(cardInputPlayer, cardInputBanker);            

            // calc point card
            let cardPoint = bacaratHandle.calcCardPointCardGroup(cardInputPlayer, cardInputBanker);

            let pv = cardPoint.pv;

            let bv = cardPoint.bv;

            pv = pv % 10;
            bv = bv % 10;

            // add winner log
            bacaratHandle.addWinnerLog(pv, bv, cardInputPlayer, cardInputBanker);

            // set template result
            bacaratHandle.setTemplateResultCardGroup(cardInputPlayer, cardInputBanker, bv, pv);

            // set score board
            bacaratHandle.setScoreBoardTable(pv, bv);

            // check condition to calc rate
            if(winnerLog.length >= 7){
                // calc guess winner
                let rateObject = bacaratHandle.calcWinnerRate(winnerLog);
                bacaratHandle.setGuessTable(rateObject);
            }
        }).on('click','.btn-reset-game', function(){
            winnerLog = [];
            $('table.table-game-result tbody tr:not(.tr-template-game-result)').remove();
            bacaratHandle.setGuessTable();
            bacaratInit.initTableScoreBoard();
            bacaratHandle.resetInputCardGroup();
        });
    },
    convertCardToPoint : (_card) => {
        if(_card == null) return 0;
        let numerObject = bacaratHandle.convertCardToNumberObject(_card);
        let cardObj = cardArr.filter(_c => _c.number == numerObject)[0];
        return cardObj.point;
    },
    convertCardToValue : (_card) => {
        if(_card == null) return 0;
        let numerObject = bacaratHandle.convertCardToNumberObject(_card);
        let cardObj = cardArr.filter(_c => _c.number == numerObject)[0];
        return cardObj.value;
    },
    calcRemainCardInTotalSet : (_card) => {
        let numerObject = bacaratHandle.convertCardToNumberObject(_card);        

        return cardArr = cardArr.map(_c => {
            if(_c.number == numerObject){
                _c.remain -= 1;
            }
            return _c;
        });
    },
    convertCardToNumberObject : (_card) => {
        if(isNaN(_card))
            _card = _card.toUpperCase();

        switch(_card){
            case 'A' : return 1;
            case 'J' : return 11;
            case 'Q' : return 12;
            case 'K' : return 13;
            default : return parseInt(_card);
        }
    },
    // use for cardGroup
    resetInputCardGroup : () =>{
        let txtCardInputPrefix = 'txt-card-input-'

        $('table.table-card-input input.' + txtCardInputPrefix + 'p1').val('');
        $('table.table-card-input input.' + txtCardInputPrefix + 'p2').val('');
        $('table.table-card-input input.' + txtCardInputPrefix + 'p3').val('');
        $('table.table-card-input input.' + txtCardInputPrefix + 'b1').val('');
        $('table.table-card-input input.' + txtCardInputPrefix + 'b2').val('');
        $('table.table-card-input input.' + txtCardInputPrefix + 'b3').val('');
    },
    calcValueCardGroup : (_cardInputPlayer, _cardInputBanker) => {
        return bacaratHandle.convertCardToValue(_cardInputPlayer.p1)
        + bacaratHandle.convertCardToValue(_cardInputPlayer.p2)
        + bacaratHandle.convertCardToValue(_cardInputPlayer.p3)
        + bacaratHandle.convertCardToValue(_cardInputBanker.b1)
        + bacaratHandle.convertCardToValue(_cardInputBanker.b2)
        + bacaratHandle.convertCardToValue(_cardInputBanker.b3);
    },
    calcRemainCardSetCardGroup : (_cardInputPlayer, _cardInputBanker) => {
        bacaratHandle.calcRemainCardInTotalSet(_cardInputPlayer.p1);
        bacaratHandle.calcRemainCardInTotalSet(_cardInputPlayer.p2);
        bacaratHandle.calcRemainCardInTotalSet(_cardInputPlayer.p3);
        bacaratHandle.calcRemainCardInTotalSet(_cardInputBanker.b1);
        bacaratHandle.calcRemainCardInTotalSet(_cardInputBanker.b2);
        bacaratHandle.calcRemainCardInTotalSet(_cardInputBanker.b3);
    },
    calcCardPointCardGroup : (_cardInputPlayer, _cardInputBanker) => {
        let pv = bacaratHandle.convertCardToPoint(_cardInputPlayer.p1)
                    + bacaratHandle.convertCardToPoint(_cardInputPlayer.p2)
                    + bacaratHandle.convertCardToPoint(_cardInputPlayer.p3);

        let bv = bacaratHandle.convertCardToPoint(_cardInputBanker.b1)
                + bacaratHandle.convertCardToPoint(_cardInputBanker.b2)
                + bacaratHandle.convertCardToPoint(_cardInputBanker.b3);
        return {
            'pv' : pv,
            'bv' : bv
        };
    },
    setTemplateResultCardGroup : (_cardInputPlayer, _cardInputBanker, _bv, _pv) => {
        // clone tr-template-game-result
        let trTemplateGameResult = $('tr.tr-template-game-result.d-none').clone();
        trTemplateGameResult.removeClass('d-none').removeClass('tr-template-game-result');

        let win = (_pv > _bv) ? 'Player' : ((_pv < _bv) ? 'Banker' : 'Tie');

        $(trTemplateGameResult).find('td.td-p1').text(_cardInputPlayer.p1 == null ? '' : _cardInputPlayer.p1);
        $(trTemplateGameResult).find('td.td-p2').text(_cardInputPlayer.p2 == null ? '' : _cardInputPlayer.p2);
        $(trTemplateGameResult).find('td.td-p3').text(_cardInputPlayer.p3 == null ? '' : _cardInputPlayer.p3);

        $(trTemplateGameResult).find('td.td-b1').text(_cardInputBanker.b1 == null ? '' : _cardInputBanker.b1);
        $(trTemplateGameResult).find('td.td-b2').text(_cardInputBanker.b2 == null ? '' : _cardInputBanker.b2);
        $(trTemplateGameResult).find('td.td-b3').text(_cardInputBanker.b3 == null ? '' : _cardInputBanker.b3);

        $(trTemplateGameResult).find('td.td-pv').text(_pv);
        $(trTemplateGameResult).find('td.td-bv').text(_bv);

        $(trTemplateGameResult).find('td.td-win').text(win);

        // append to table
        $('table.table-game-result tbody').append(trTemplateGameResult);
    },
    addWinnerLog : (_pv, _bv, _cardInputPlayer, _cardInputBanker) => {
        let winner = (_pv > _bv) ? 'P' : ((_pv < _bv) ? 'B' : 'T');
        let winScore = (_pv > _bv) ? _pv : ((_pv < _bv) ? _bv : _bv);
        let winnerObj = {
            'winner' : winner,
            'score'  : winScore,
            'player' : _cardInputPlayer,
            'banker' : _cardInputBanker,
            'bv'     : _bv,
            'pv'     : _pv
        };
        winnerLog.push(winnerObj);
    }
    ,setScoreBoardTable : (_pv, _bv) => {
        winnerLog.map((_e, _i) => {
            //table-score-board
            let winnerColor = null;
            if(_e.winner == 'P') winnerColor = 'blue';
            else if(_e.winner == 'B') winnerColor = 'red';
            else if(_e.winner == 'T') winnerColor = 'green'
            let td = $('table.table-score-board tbody td[data-phase="' + _i +'"]');
            $(td).text(_e.score);
            $(td).css('background', winnerColor);
            $(td).css('color', '#fff');
        });
    },
    setGuessTable : (winnerObject = null) => {
        if(!winnerObject) $('table.table-guess').addClass('d-none');
        else{
            winnerObject.color = winnerObject.winner == 'P' ? 'blue' : 'red';
            winnerObject.text = winnerObject.winner == 'P' ? 'Player' : 'Banker';
            // show table
            $('table.table-guess').removeClass('d-none');
            $('table.table-guess td.td-winner-color').css('background', winnerObject.color);
            $('table.table-guess td.td-winner-color').text(winnerObject.text);
            $('table.table-guess td.td-winner-percentage').text(winnerObject.rate + ' %');
        }
    },
    calcWinnerRate : (_winnerLog) => {
        let winnerGuess = allowProcedures.map(_e => bacaratProcedure[_e](_winnerLog));

        // remove null Guess
        winnerGuess = winnerGuess.filter(_e => _e != null);

        // remove 'T' (Tie) guess
        winnerGuess = winnerGuess.filter(_e => _e != 'T');

        console.log(winnerGuess);

        // calc rate
        let pTotal          = winnerGuess.filter(_e => _e == 'P').length;
        let bTotal          = winnerGuess.filter(_e => _e == 'B').length;
        let total           = winnerGuess.length;
        let guess           = pTotal > bTotal ? pTotal : bTotal;
        let guessWinner     = null;
        if(pTotal > bTotal) guessWinner = 'P';
        else if(pTotal < bTotal) guessWinner = 'B';
        else if(pTotal == bTotal){
            if(winnerGuess[6] != null) guessWinner = winnerGuess[6];// uu tien pp 6
            else guessWinner = winnerGuess[1];/// lay theo pp 1
        }

        let rateObject = winRate.filter(_e => _e.guess == guess && _e.total == total)[0];
        // if non have rate
        if(!rateObject) return {
            winner : guessWinner,
            rate   : 'undefined'
        }

        return {
            winner : guessWinner,
            rate   : rateObject.rate
        };
    }
}

var bacaratProcedure = {
    procedure1 : (_winnerLog) => {// tỉ lệ 1
        // tính tỷ lệ banker và player để dự đoán
        // remove Tie result

        if(bacaratConfig.removeTieResultInProcedure)
            _winnerLog = _winnerLog.filter(_e => _e.winner != 'T');

        let lastPhaseNumber = 7;

        lastPhaseNumber = _winnerLog.length < lastPhaseNumber ? _winnerLog.length : lastPhaseNumber;

        let lastArr = _winnerLog.slice(-lastPhaseNumber);

        let pWinTotal = lastArr.filter(_e => _e.winner == 'P').length;
        let bWinTotal = lastArr.filter(_e => _e.winner == 'B').length;

        return pWinTotal > bWinTotal ? 'P' : 'B';
    },
    procedure2 : (_winnerLog) => {// binh boong
        // Ra ngược với ván thắng gần nhất
        // remove Tie result
        if(bacaratConfig.removeTieResultInProcedure)
            _winnerLog = _winnerLog.filter(_e => _e.winner != 'T');

        if(_winnerLog.length == 0) return null;

        let lastWinner = _winnerLog[_winnerLog.length - 1];
        return lastWinner.winner == 'P' ? 'B' : 'P';
    }
    ,procedure3 : (_winnerLog) => {// theo cầu
        // Ra trùng với ván thắng gần nhất
        // remove Tie result
        if(bacaratConfig.removeTieResultInProcedure)
            _winnerLog = _winnerLog.filter(_e => _e.winner != 'T');

        let lastWinner = _winnerLog[_winnerLog.length - 1];        
        return lastWinner.winner;
    },
    procedure4 : (_winnerLog) => {//copy trade 1
        // đánh theo màu 7 ván trước
        // remove Tie result
        if(bacaratConfig.removeTieResultInProcedure)
            _winnerLog = _winnerLog.filter(_e => _e.winner != 'T');

        let numberPhaseBefore = 7;
        if(_winnerLog.length < numberPhaseBefore) return null;
        let winnerObj = _winnerLog.slice(_winnerLog.length - numberPhaseBefore, _winnerLog.length - (numberPhaseBefore - 1))[0];

        return winnerObj.winner;
    },
    procedure5 : (_winnerLog) => {//copy trade 2        
        // đánh nguoc màu 8 ván trước
        // remove Tie result
        if(bacaratConfig.removeTieResultInProcedure)
            _winnerLog = _winnerLog.filter(_e => _e.winner != 'T');

        let numberPhaseBefore = 8;
        if(_winnerLog.length < numberPhaseBefore) return null;
        let winnerObj = _winnerLog.slice(_winnerLog.length - numberPhaseBefore, _winnerLog.length - (numberPhaseBefore - 1))[0];        
        return winnerObj.winner == 'P' ? 'B' : 'P';
    },
    procedure6 : (_winnerLog) => {// tỉ lệ 2
        // so tỉ lệ toàn bộ ván đấu, lấy cái nhiều hơn 14%
        let _threshold = 14;// ngưỡng quyết định có nhận kết quả ko
        let pWinTotal = _winnerLog.filter(_e => _e.winner == 'P').length;
        let bWinTotal = _winnerLog.filter(_e => _e.winner == 'B').length;
        let pWinTotalRate = (pWinTotal / _winnerLog.length) * 100;
        let bWinTotalRate = (bWinTotal / _winnerLog.length) * 100;
        if(pWinTotalRate > bWinTotalRate && (pWinTotalRate - bWinTotalRate) >= _threshold) return 'P';
        else if(bWinTotalRate > pWinTotalRate && (bWinTotalRate - pWinTotalRate) >= _threshold) return 'B';
        else return null;// no result;
    },
    procedure7 : (_winnerLog) => {// theo cầu
        // nếu xuất hiện 3 ván thắng liên tiếp thì theo màu thắng

        let numberLastPhase = 3; // số ván thắng cuối liên tiếp
        let lastLog = _winnerLog.slice(_winnerLog.length - numberLastPhase);
        let pWinLastTotal = lastLog.filter(_e => _e.winner == 'P').length;
        let bWinLastTotal = lastLog.filter(_e => _e.winner == 'B').length;

        if(pWinLastTotal == numberLastPhase) return 'P';
        else if(bWinLastTotal == numberLastPhase) return 'B';
        else return null;
    },
    procedure8: (_winnerLog) => {// theo cầu
        // nếu xuất hiện 3 ván thắng liên tiếp thì theo màu thắng
        let numberLastPhase = 4; // số ván thắng cuối liên tiếp
        let lastLog = _winnerLog.slice(_winnerLog.length - numberLastPhase);
        let pWinLastTotal = lastLog.filter(_e => _e.winner == 'P').length;
        let bWinLastTotal = lastLog.filter(_e => _e.winner == 'B').length;

        if(pWinLastTotal == numberLastPhase) return 'B';
        else if(bWinLastTotal == numberLastPhase) return 'P';
        else return null;
    }
}

$(function() {
    // init setup
    bacaratInit.setupSetCard();
    bacaratInit.initTableScoreBoard();
    bacaratInit.createRandomWinnerLog();

    // handle
    bacaratHandle.bacarat();
});