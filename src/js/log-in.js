'use strict'

const labels = document.querySelectorAll('.log__in label'),
      inputs = document.querySelectorAll('.log__in input')

inputs.forEach(item => {
    item.addEventListener('focus', e => labelUp(e))
    item.addEventListener('blur', e => labelDown(e))
    item.addEventListener('input', e => labelOnText(e))
})

function labelUp(e) {
    const label = e.target.previousElementSibling
    label.style.top = 13 + 'px'
    label.style.left = 5 + 'px'
    label.style.fontSize = 16 + 'px'
}

function labelDown(e) {
    const label = e.target.previousElementSibling
    label.style.top = 44 + 'px'
    label.style.left = 5 + 'px'
    label.style.fontSize = 20 + 'px'
}

function labelOnText(e) {
    const label = e.target.previousElementSibling
    if (e.target.value.length) {
        label.style.color =  '#57b846b8'
    } else {
        label.style.color =  'rgb(75, 75, 75)'
    }
}
