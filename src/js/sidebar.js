'use strict' 

const listItems = document.querySelectorAll('.aside__list li'),
      tabs = document.querySelectorAll('.main > div')
console.log(tabs)
listItems.forEach(li => {
    li.addEventListener('click', (e) => contentToggle(e, tabs))
})

function contentToggle(e, tabs) {
    console.log(e.target)
    let { to } = e.target.dataset
    tabs.forEach(tab => {
        if (tab.id === to) {
            console.log(tab)
            tab.classList.remove('hide')
        } else {
            tab.classList.add('hide')
        }
    })
}