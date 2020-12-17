  (function(){'use strict' 

    const listItems = document.querySelectorAll('.aside__list li'),
        tabs = document.querySelectorAll('.main > div'),
        main = document.querySelector('main'),
        sidebarTrigger = document.querySelector('.show__aside'),
        sidebar = document.querySelector('.aside'),
        sidebarList = sidebar.querySelector('.aside__list')

    const allGroupBtns = document.querySelectorAll('.groups__btn')
    const btnsBlockForTables = document.querySelector('.tb__buttons')
    const studTable = document.querySelector('.students .table')
    const studentsBlock = document.querySelector('.students')
    const loader = document.createElement('div')

    allGroupBtns.forEach(item => item.addEventListener('click', () => showStudTable()))
        
    listItems.forEach(li => {
        li.addEventListener('click', (e) => contentToggle(e, tabs))
    })

    function contentToggle(e, tabs) {
        let { to } = e.target.dataset
        tabs.forEach(tab => {
            if (tab.id === to) {
                tab.classList.remove('hide')

            } else {
                tab.classList.add('hide')
            }
        })
    }

    sidebarTrigger.onselectstart = () => false
    sidebarTrigger.addEventListener('click', () => toogleSideBar())
        
    function toogleSideBar() {
        const { mode } = sidebar.dataset
        if (mode === 'hide') {
            sidebar.style.transform = 'translate(0)'
            sidebarTrigger.style.transform = 'translate(50%, -50%) rotate(-180deg)'
            main.style.marginRight = ''
            main.style.width = ''
            sidebar.style.width= ''
            sidebarList.style.opacity = '1'
            sidebar.ontransitionend = () => sidebarList.classList.remove('hide')
            sidebar.setAttribute('data-mode', 'open')
        } else if (mode === 'open') {
            sidebar.style.transform = 'translate(-100%)'
            sidebarTrigger.style.transform = 'translate(70%, -50%) rotate(0)'
            main.style.marginRight = '0px'
            main.style.width = '1290px'
            sidebar.style.width = '0'
            sidebarList.style.opacity = '0'
            sidebarList.ontransitionend = () => sidebarList.classList.add('hide')
            sidebar.setAttribute('data-mode', 'hide')
        }  
    }

    function showStudTable() { 
        btnsBlockForTables.classList.add('hide')
        studentsBlock.append(loader)
        studTable.classList.remove('hide')
        studentsBlock.classList.remove('hide')
    }
})()