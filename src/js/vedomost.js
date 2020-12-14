'use strict'

const tableVed = document.querySelector('.ved__table'),
      tableTbodyVed = tableVed.querySelector('.ved__table tbody'),
      tableRowsVed = tableTbodyVed.querySelectorAll('tr'),
      filtersTextFieldVed = document.querySelector('#find__stud'),
      vedBtnsWrapper = document.querySelector('.ved__btns'),
      vedBtns = vedBtnsWrapper.querySelectorAll('.ved__btn'),
      createVedSearchWrapper = document.querySelector('.search__create-ved')

vedBtns.forEach(btn => btn.addEventListener('click', (e) => vedBtnsDoing(e)))
filtersTextFieldVed.addEventListener('input', (e) => filterByTextVed(e))

function filterByTextVed(e) {
    let count = 0
    if (e.target.value.length) {
        togglePopup(tableVed, 'show')
        tableRowsVed.forEach(row => {
            count = 0
            Array.prototype.forEach.call(row.children, i => {
                if (i.innerText.toLowerCase().indexOf(e.target.value.toLowerCase()) > -1) {
                    row.style.display = ''
                } else {
                    count++
                }
            })
            if (count == row.children.length) row.style.display = 'none'
        })
    } else {
        togglePopup(tableVed, 'hide')
        tableRowsVed.forEach(row => row.style.display = '')
    }
}


function vedBtnsDoing(e) {
    const { aim } = e.target.dataset

    if (aim === 'create-ved' || aim === 'change-ved') {
        togglePopup(vedBtnsWrapper, 'hide')
        togglePopup(createVedSearchWrapper, 'show')
    }
}

function togglePopup(elem, method) {
    if (method === 'show') {
        elem.classList.remove('hide')
    } else if (method === 'hide') {
        elem.classList.add('hide')
    } else {
        console.log('WTF COMMAND!')
    }
}


const allCreateBtnsVed = document.querySelectorAll('[data-id="create__ved"]')
const creatingVedBlock = document.querySelector('.creating__ved')
const creatingVedTemplate = creatingVedBlock.querySelector('.ved__template')


const tableVedForm = document.querySelector('.ved__table-form'),
      tableTbodyVedForm = tableVedForm.querySelector('tbody')

allCreateBtnsVed.forEach(item => item.addEventListener('click', (e) => moveToCreate(e)))

function moveToCreate(e) {
    let tr = e.target
    while(tr.tagName !== 'TR') {
        tr = tr.parentNode
        if (tr == document.body) break;
    }

    const studFIO = [...tr.children].find(item => item.dataset.id === 'stud__fio')
    const numZach = [...tr.children].find(item => item.dataset.id === 'number__zach')

    creatingVedTemplate.insertAdjacentHTML('afterbegin', `
        <h2 style="font-weight: 400;">Студент: <span style="color: rgb(0, 115, 170);">${studFIO.innerText}</span></h2>
        <h2 style="font-weight: 400;">Номер зачетки: <span style="color: rgb(0, 115, 170);">${numZach.innerText}</span></h2>
    `)

    tableVedForm.insertAdjacentHTML('afterbegin', `<input type="text" name="num__zach" value="${numZach.innerText}" hidden/>`)

    togglePopup(createVedSearchWrapper, 'hide')
    togglePopup(creatingVedBlock, 'show')
}


const addRowVed = document.querySelector('.ved__add-row'),
      addRowVedAllInputs = addRowVed.querySelectorAll('.ved__add-row input'),
      addRowVedBtns = addRowVed.querySelectorAll('.btn')

addRowVedBtns.forEach(btn => btn.addEventListener('click', (e) => addRowToVed(e)))

function addRowToVed(e) {
    const { aim } = e.target.dataset

    if (aim === 'add') {
        let tr = document.createElement('tr')
        let length = tableTbodyVedForm.children.length
        tr.innerHTML = `<tr>
            <td data-rec="ved-subject"><input type="text" name="ved__subject-${length + 1}" hidden/></td>
            <td data-rec="ved-hours"><input type="text" name="ved__hours-${length + 1}" hidden/></td>
            <td data-rec="ved-control"><input type="text" name="ved__control-${length + 1}" hidden/></td>
            <td data-rec="ved-mark"><input type="text" name="ved__mark-${length + 1}" hidden/></td>
            <td data-rec="ved-date"><input type="text" name="ved__date-${length + 1}" hidden/></td>
            <td data-rec="ved-teacher" ><input type="text" name="ved__teacher-${length + 1}" hidden/></td>
        </tr>`

        tableTbodyVedForm.append(tr)

        let tableLastRow = tableTbodyVedForm.children[tableTbodyVedForm.children.length - 1]
        addRowVedAllInputs.forEach(item => {
            [...tableLastRow.children].forEach(td => {
                if (td.dataset.rec === item.dataset.to) {
                    td.innerHTML += item.value
                    td.children[0].value = item.value
                }
            })
        })
    } else if (aim === 'clear') {
        addRowVedAllInputs.forEach(item => item.value = '')
    }
}

