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

dropButtons.forEach(item => {
    item.addEventListener('click', function(event) {
        this.onselectstart = () => false
        showDropMenu(event, item)
    })
})

function showDropMenu(event, btn) {
    let target = event.target,
        btnDropMenu = nodeWalk(btn),
        text = btn.querySelector('p')

    if (target && !btn.classList.contains('bgc-activee')) {
        btn.classList.add('bgc-active')
        btnDropMenu.classList.add('show')

        btnDropMenu.addEventListener('click', (e) => {
            let btnDropMenuList = btnDropMenu.querySelectorAll('[data-item]')
            if (e.target) {
                btnDropMenuList.forEach(item => {
                    if (e.target == item) {
                        text.textContent = item.innerText
                        btnDropMenu.classList.remove('show')
                        btn.classList.remove('bgc-active')
                    }
                })
            }
        })
    }
}

function nodeWalk(node) {
    const childElements = [...node.childen]
    if (childElements.length > 0) {
        childElements.map(elem => {
          if (elem.hasAttribute('data-drop')) {
                return elem
        }
          if (elem.children) {
            nodeWalk(elem);
        }
        })
    }
    
    return 0;
}


// courseBtn.addEventListener('click', function (event) {
//     let target = event.target
//     this.setAttribute('about', 'active-button')
//     this.onselectstart = () => {
//         return false
//     }
//     if (target != this) {
//         target = this
//     }
//     if (target && !this.classList.contains('bgc-active')) {
//         let dropCourse = document.querySelector('.drop-course'),
//             text = this.querySelector('p')

//         dropCourse.classList.remove('unactive')
//         this.classList.add('bgc-active')
//         dropCourse.setAttribute('name', 'drop-menu-active')
//         dropCourse.addEventListener('click', (e) => { //событие на выадающее меню
//             let listOfCourses = dropCourse.querySelectorAll('li')
//             if (e.target && e.target.tagName == 'LI') {
//                 listOfCourses.forEach((value) => {
//                     if (e.target == value) {
//                         text.textContent = value.innerText
//                         dropCourse.classList.add('unactive')
//                     }
//                 })
//             }
//         })
//     } else { //если я кликаю на активную кнопку то нужно ее закрыть
//         let dropCourse = document.querySelector('.drop-course')
//         dropCourse.classList.add('unactive')
//         this.classList.remove('bgc-active')
//     }
// })

// facultyBtn.addEventListener('click', function (event) {
//     let target = event.target
//     this.setAttribute('about', 'active-button')
//     this.onselectstart = () => {
//         return false
//     }

//     if (target != this) {
//         target = this
//     }
//     if (target && !this.classList.contains('bgc-active')) {
//         let dropFaculty = document.querySelector('.drop-faculty'),
//             text = this.querySelector('p')

//         this.classList.add('bgc-active')
//         dropFaculty.classList.remove('unactive')
//         dropFaculty.setAttribute('name', 'drop-menu-active')
//         dropFaculty.addEventListener('click', (e) => { //событие на выадающее меню
//             let listOfFaculties = dropFaculty.querySelectorAll('li')
//             if (e.target && e.target.tagName == 'LI') {
//                 listOfFaculties.forEach((value) => {
//                     if (e.target == value) {
//                         text.textContent = value.innerText
//                     }
//                 })
//             }
//         })

//     } else {
//         let dropFaculty = document.querySelector('.drop-faculty')
//         dropFaculty.classList.add('unactive')
//         this.classList.remove('bgc-active')
//     }
// })

// //событие на кнопку выпадающего меню каждой дисциплины
// disciplineWrap.addEventListener('click', function (event) {
//     this.onselectstart = () => {
//         return false;
//     }
//     let target = event.target
//     while (!target.classList.contains('discipline__control')) {
//         target = target.parentNode
//     }
//     target.setAttribute('about', 'active-button')
//     //нужно чтобы каждый target указывал на кнопку
//     if (!target.classList.contains('bgc-active')) {
//         if (target) {
//             let dropControl = target.querySelector('.drop-control'),
//                 text = target.querySelector('p');

//             target.classList.add('bgc-active')
//             dropControl.classList.remove('unactive')
//             dropControl.setAttribute('name', 'drop-menu-active')
//             dropControl.addEventListener('click', (e) => { //событие на выадающее меню
//                 let listOfForms = dropControl.querySelectorAll('li')
//                 if (e.target && e.target.tagName == 'LI') {
//                     listOfForms.forEach((value) => {
//                         if (e.target == value) {
//                             text.textContent = value.innerText
//                             dropControl.classList.add('unactive')
//                         }
//                     })
//                 }
//             })
//         }

//     } else {
//         let dropControl = target.querySelector('.drop-control')
//         dropControl.classList.add('unactive')
//         target.classList.remove('bgc-active')
//     }

// })


// //события на добавление и удаление дицсциплин
// disciplineWrap.addEventListener('click', function (event) {
//     let target = event.target
//     if (target && target.classList.contains('discipline__edit-add')) {
//         let newDiscipline = document.createElement('div')
//         newDiscipline.classList.add('discipline')
//         newDiscipline.innerHTML = `
//                         <div class="dicipline__code">
//                             <form class="code-form">
//                                 <input type="text" id="discipline-code" />
//                             </form>
//                         </div>
//                         <div class="discipline__clock">
//                             <form class="clocl-form">
//                                 <input type="text" id="clock" />
//                             </form>
//                         </div>
//                         <div class="discipline__control">
//                         <p>Форма</p>
//                             <div class="drop-control">
//                                 <ul>
//                                     <li>Экзамен</li>
//                                     <li>Зачет</li>
//                                     <li>Дифф. Зачет</li>
//                                 </ul>
//                             </div>
//                         </div>
//                         <div class="discipline__mark">
//                             <form class="mark-form">
//                                 <input type="text" id="mark" />
//                             </form>
//                         </div>
//                         <div class="discipline__date">
//                             <form class="date-form">
//                                 <input type="text" id="date" />
//                             </form>
//                         </div>
//                         <div class="discipline__edit">
//                             <div class="discipline__edit-add">+</div>
//                             <div class="discipline__edit-remove">-</div>
//                         </div>
//                         `

//         this.appendChild(newDiscipline)
//         disciplines = document.querySelectorAll('.discipline')
//         disciplines.forEach((item, i) => {
//             item.querySelector('.drop-control').classList.add('unactive')
//         })
//     } else {
//         if (target && target.classList.contains('discipline__edit-remove')) {
//             let removeDiscipline;

//             if (!target.classList.contains('discipline')) {
//                 while (!target.classList.contains('discipline')) {
//                     target = target.parentNode
//                 }
//                 removeDiscipline = target
//             }
//             disciplines = document.querySelectorAll('.discipline')
//             if (disciplines.length > 1 && disciplines[0] != removeDiscipline) {
//                 removeDiscipline.remove()
//             } else {
//                 throw new Error('Attempt to remove the first field!')
//             }
//         }
//     }
// })

// body.addEventListener('click', function (event) {
//     let drops = document.querySelectorAll('[name="drop-menu-active"]'),
//         abouts = document.querySelectorAll('[about="active-button"]'),
//         target = event.target,
//         temp

//     if (target.tagName == 'P') {
//         target = target.parentNode
//     }

//     for (let index = 0; index < abouts.length; index++) {
//         if (abouts[index] == target) {
//             temp = index
//         }
//     }

//     if (target.classList.contains('bgc-active')) {
//         for (let index = 0; index < abouts.length; index++) {
//             if (index == temp) {
//                 continue
//             }
//             abouts[index].classList.remove('bgc-active')
//             abouts[index].querySelector('[name="drop-menu-active"]').classList.add('unactive')
//         }
//     }

//     if (target && !target.hasAttribute('about') && target.tagName != 'P') {
//         drops.forEach(item => {
//             item.classList.add('unactive')
//             item.removeAttribute('name')
//         })
//         abouts.forEach(item => {
//             item.classList.remove('bgc-active')
//         })
//     }
// })

// function searchInChldren(node, arr) {
//     while (node) {
//         if (1 == node.nodeType) {
//             arr.push(node)
//         }
//         searchInChldren(node.firstChild, arr);
//         node = node.nextSibling;
//     }
// }

// function decoratorSearch(f) {
//     let arr = []
//     return function (node, className) {
//         f(node, arr)
//         for (let index = 0; index < arr.length; index++) {
//             if (arr[index].classList.contains(className)) {
//                 return arr[index]
//             }
//         }
//         return `Element wasn't found`
//     }
// }

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