(function() {
    'use strict'

    let allRadioBtns = document.querySelectorAll('.filters__choose li input'),
        allSemTables

    allRadioBtns.forEach(rd => rd.addEventListener('click', e => showRelativeTable(e)))


    function showRelativeTable(e) {
        let li = e.target
        while (li.tagName != 'LI') {
            li = li.parentNode
            if (li == document.budy) break;
        }

        allSemTables = document.querySelectorAll('.mypage__table')
        allSemTables.forEach(tb => {
            tb.querySelector('tbody [data-aim="temp"]') && tb.querySelector('tbody [data-aim="temp"]').remove()
            tb.classList.add('hide')
            if (tb.dataset.name == 'table__' + e.target.dataset.aim) {
                if (tb.querySelector('tbody').children.length) {
                    tb.classList.remove('hide')
                } else {
                    tb.classList.remove('hide')
                    let tr = document.createElement('tr')
                    tr.innerHTML = '<td data-aim="temp" colspan="6">По данному семестру ведомость пуста</td>'
                    tb.querySelector('tbody').append(tr)
                }
            }
        })
    }





})()

