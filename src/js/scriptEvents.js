'use strict'

const tabcontainer = document.querySelector('.tabcontainer'),
    tabs = tabcontainer.querySelectorAll('.tabcontent'),
    menu = document.querySelector('.menu'),
    menuList = menu.querySelectorAll('.menu__item'),
    dropButtons = document.querySelectorAll('[data-dropBtn]'),
    disciplineWrap = document.querySelector('.discipline__wrapper'),
    addDiscipline = disciplineWrap.querySelector('.discipline__edit-add'),
    removeDiscipline = disciplineWrap.querySelector('.discipline__edit-remove'),
    body = document.body,
    btns = document.querySelectorAll('button'),
    semesterChoice = document.querySelector('.semesterchoice')
//функция поиска дочернего элемента 1 уровн

let disciplines = document.querySelectorAll('.discipline')

menuList[0].classList.add('bgc-menu-active')
tabs[0].classList.add('show')


function showChoosenItem (event, mainList, btnSelector, interactiveList){
    if (btnSelector[0] == '.') {
       btnSelector = btnSelector.split('')
       btnSelector.shift()
       btnSelector = btnSelector.join('')
    }
    let target = event.target
    if (target && target.classList.contains(btnSelector)) {
        interactiveList.forEach((item) => {
            if (item.classList.contains('show')) {
                item.classList.remove('show')
            }
        })
        mainList.forEach((item, index) => {
            if (target == item) {
                interactiveList[index].classList.add('show')
                target.classList.add('bgc-menu-active')
            } else {
                item.classList.remove('bgc-menu-active')
            }
        })
    }  
}

menu.addEventListener('click', function (event) { //фокус на вкладк
    this.onselectstart = () => {
        return false
    }
    showChoosenItem(event, menuList, '.menu__item', tabs)
})

function nodeWalk(node) {
    const childElements = []
    let result

    Array.prototype.forEach.call(node.children, (item) => {
        childElements.push(item)
    })
    if (childElements.length > 0) {
        childElements.map(elem => {
          if (elem.hasAttribute('data-drop')) {
                result = elem
        }
          if (elem.children) {
            nodeWalk(elem);
        }
        })
    }

    return result
}



// semesterChoice.addEventListener('click', function (event) {
//     this.onselectstart = () => {
//         return false;
//     }
//     let target = event.target

//     if (target && target.classList.contains('semesterchoice-btn')) {
//         if (!target.classList.contains('bgc-active')) {
//             Array.prototype.forEach.call(semesterChoice.children, item => {
//                 if (item && item.classList.contains('bgc-active')) {
//                     item.classList.remove('bgc-active')
//                 }
//             })
//             target.classList.add('bgc-active')
//         } else {
//             target.classList.remove('bgc-active')
//         }
//     }
// })