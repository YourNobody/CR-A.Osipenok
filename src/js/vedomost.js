'use strict'

const table = document.querySelector('.ved__table'),
      tableTbody = table.querySelector('.ved__table tbody'),
      tableRows = tableTbody.querySelectorAll('tr'),
      filtersTextField = document.querySelector('#find__stud'),
      vedBtnsWrapper = document.querySelector('.ved__btns'),
      vedBtns = vedBtnsWrapper.querySelectorAll('.ved__btn'),
      createVedSearchWrapper = document.querySelector('.create__ved')

vedBtns.forEach(btn => btn.addEventListener('click', (e) => vedBtnsDoing(e)))
filtersTextField.addEventListener('input', (e) => filterByTextVed(e))

function filterByTextVed(e) {
    let count = 0
    if (e.target.value.length) {
        tooglePopup(table, 'show')
        tableRows.forEach(row => {
            count = 0
            Array.prototype.forEach.call(row.children, i => {
                if (i.innerText.indexOf(e.target.value) > -1) {
                    row.style.display = ''
                } else {
                    count++
                }
            })
            if (count == row.children.length) row.style.display = 'none'
        })
    } else {
        tooglePopup(table, 'hide')
        tableRows.forEach(row => row.style.display = '')
    }
}


function vedBtnsDoing(e) {
    const { aim } = e.target.dataset

    if (aim === 'create-ved' || aim === 'change-ved') {
        tooglePopup(vedBtnsWrapper, 'hide')
        tooglePopup(createVedSearchWrapper, 'show')
    }
}

function tooglePopup(elem, method) {
    if (method === 'show') {
        elem.classList.remove('hide')
    } else if (method === 'hide') {
        elem.classList.add('hide')
    } else {
        console.log('WTF COMMAND!')
    }
}




const createBtns = document.querySelectorAll('#create__ved')