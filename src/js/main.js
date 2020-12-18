(function(){
'use strict'

let filters,
      filtersBtns,
      filtersRadioBtns,
      filtersTextField,
      table,
      tableTbody,
      tableRows,
      filtersMain

try {
    filters = document.querySelector('.filters'),
    filtersBtns = filters.querySelectorAll('.filters__btn'),
    filtersRadioBtns = filters.querySelectorAll('.filters__btns .radio'),
    filtersTextField = filters.querySelector('#filt__bytext'),
    table = document.querySelector('.table'),
    tableTbody = table.querySelector('tbody'),
    tableRows = table.querySelectorAll('tbody tr'),
    filtersMain = filters.querySelector('.filters__choose')
    filtersRadioBtns.forEach(item => item.addEventListener('input', () => checkRadioFilters(filtersRadioBtns)))
    filtersTextField.addEventListener('input', e => filterByText(e))

    filtersBtns.forEach(item => item.addEventListener('click', e => filtersBtnsDoing(e)))
} catch (error) {}
    
function filterByText(e) {
    let count = 0
    if (e.target.value.length) {
        tableRows.forEach(row => {
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

function toogleClass(elem, className) {
    elem.classList.toggle(className)
}

const facultiesListTitles = document.querySelectorAll('.faculties__list li span')

facultiesListTitles.forEach(item => item.addEventListener('click', (e) => {
    let el = e.target
    try {
        while(el.tagName != 'LI'){
            el = e.target.parentNode
        }
    } catch (error) {
        el = e.target
    }

    let p = [...el.children].find(i => i.tagName == 'P')

    if (p.style.lineHeight == '0px' || p.style.lineHeight == '') {
        toogleClass(e.target, 'l__blue')
        p.style.transition = '0.2s all'
        p.style.fontSize = '18px'
        p.style.lineHeight = '20px'
    } else {
        toogleClass(e.target, 'l__blue')
        p.style.fontSize = '0px'
        p.style.lineHeight = '0px'
    }
}))

})()



