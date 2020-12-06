'use strict'

const goToPlanBtns = document.querySelectorAll('[data-to="study-plans"]'),
      tabs = document.querySelectorAll('main > div')

goToPlanBtns.forEach(item => item.addEventListener('click', () => openPlansCard()))


function openPlansCard() {
    tabs.forEach(item => {
        item.classList.add('hide')
        if (item.id === 'plans') {
            item.classList.remove('hide')
        }
    })
}

