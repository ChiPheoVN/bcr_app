var bacaratHandle = {
    bacarat : function(){
        $(document).on('click','.btn-add-game-result', function(){
            // clone tr-template-game-result
            let trTemplateGameResult = $('tr.tr-template-game-result.d-none').clone();
            trTemplateGameResult.removeClass('d-none');

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

            let pv = bacaratHandle.convertCardToPoint(cardInputPlayer.p1)
                    + bacaratHandle.convertCardToPoint(cardInputPlayer.p2)
                    + bacaratHandle.convertCardToPoint(cardInputPlayer.p3);

            let bv = bacaratHandle.convertCardToPoint(cardInputBanker.b1)
                    + bacaratHandle.convertCardToPoint(cardInputBanker.b2)
                    + bacaratHandle.convertCardToPoint(cardInputBanker.b3);

            pv = pv % 10;
            bv = bv % 10;

            let win = (pv > bv) ? 'Player' : ((pv < bv) ? 'Banker' : 'Tie');

            $(trTemplateGameResult).find('td.td-p1').text(cardInputPlayer.p1);
            $(trTemplateGameResult).find('td.td-p2').text(cardInputPlayer.p2);
            $(trTemplateGameResult).find('td.td-p3').text(cardInputPlayer.p3);

            $(trTemplateGameResult).find('td.td-b1').text(cardInputBanker.b1);
            $(trTemplateGameResult).find('td.td-b2').text(cardInputBanker.b2);
            $(trTemplateGameResult).find('td.td-b3').text(cardInputBanker.b3);

            $(trTemplateGameResult).find('td.td-pv').text(pv);
            $(trTemplateGameResult).find('td.td-bv').text(bv);

            $(trTemplateGameResult).find('td.td-win').text(win);

            // append to table
            $('table.table-game-result tbody').append(trTemplateGameResult);
        });
    },
    convertCardToPoint : (_card) => {
        if(isNaN(_card))
            _card = _card.toUpperCase();

        if(_card == 'A') return 1;
        if(_card == 10 || _card == 'J' || _card == 'Q' || _card == 'K') return 0;
        return parseInt(_card);
    }
}

$(function() {
    bacaratHandle.bacarat();
});