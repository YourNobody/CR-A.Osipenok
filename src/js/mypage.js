'use strict'

const pageTrigger = document.querySelector('.personal__photo'),
      mypage = document.querySelector('.mypage'),
      mypageDialog = mypage.querySelector('.mypage__dialog')

pageTrigger.addEventListener('click', () => showMyPage())

function showMyPage() {
    toogleMyPage(mypage)
    // mypage.style.animation = 'page_bg'
    // mypage.style.animationDuration = '1s'

    // mypageDialog.style.animation = 'page'
    // mypageDialog.style.animationDuration = '1ss'
    mypage.style.transform = 'translate(0)'

    mypageDialog.style.transform = 'rotate3d(0, 0, 0, 0)'
    mypageDialog.style.opacity = '1'
}

function toogleMyPage(elem) {
    elem.classList.toggle('hide')
}