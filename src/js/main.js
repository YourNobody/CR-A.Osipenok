'use strict'

const filters = document.querySelector('.filters'),
      filtersBtns = filters.querySelectorAll('.filters__btn'),
      filtersRadioBtns = filters.querySelectorAll('.filters__btns input'),
      filtersTextField = filters.querySelector('#filt__bytext'),
      table = document.querySelector('.table'),
      tableTbody = table.querySelector('tbody'),
      tableRows = table.querySelectorAll('tbody tr'),
      filtersMain = filters.querySelector('.filters__choose')
    
// // filtersRadioBtns.forEach(item => item.addEventListener('input', () => checkRadioFilters(filtersRadioBtns)))
filtersTextField.addEventListener('input', e => filterByText(e))

filtersBtns.forEach(item => item.addEventListener('click', e => filtersBtnsDoing(e)))

function checkRadioFilters(inputs) {
    const uniqFac = new Set()
    const uniqSpec = new Set()
    const uniqGroup = new Set()
    const uniqFio = new Set()

    tableRows.forEach(item => {
        [...item.children].forEach(i => {
            if (i.id && i.id === 'name__fac') uniqFac.add(i.innerText)
            if (i.id && i.id === 'name__spec') uniqSpec.add(i.innerText)
            if (i.id && i.id === 'number__group') uniqGroup.add(i.innerText)
            if (i.id && i.id === 'stud__fio') uniqFio.add(i.innerText)
        })
    })

    console.log(uniqFio)

    const arrFio = Array.from(uniqFio)
    arrFio.sort()

    console.log(arrFio)

    const tbody = document.createElement('tbody')

    let count = false
    arrFio.forEach(item => {
        count = false
        for (let i = 0; i < tableRows.length; i++) {
            for (let j = 0; j < tableRows[i].children.length; j++) {
                if (tableRows[i].children[j].innerText === item) {
                    tbody.append(tableRows[i])
                    count = true
                    break
                }
            }
            if (count) break
        }
    })
    console.log(tbody)
    Array.prototype.forEach.call(tbody.children, item => tableTbody.append(item))
}

function filterByText(e) {
    let count = 0
    if (e.target.value.length) {
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
        tableRows.forEach(row => row.style.display = '')
    }
}

function filtersBtnsDoing(e) {
    const { aim } = e.target.dataset

    if (aim === 'set') {
        if (filtersMain.classList.contains('hide'))
            tooglePopup(filtersMain, 'show')
        else 
            tooglePopup(filtersMain, 'hide')
    } else if (aim === 'reset') {
        filtersRadioBtns.forEach(item => item.checked = false)
        filtersTextField.value = ''
    } else if (aim === 'hide') {
        tooglePopup(filtersMain, 'hide')
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



