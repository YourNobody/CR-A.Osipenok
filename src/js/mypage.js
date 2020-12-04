'use strict'

const pageTrigger = document.querySelector('.personal__photo'),
      mypage = document.querySelector('.mypage'),
      mypageDialog = mypage.querySelector('.mypage__dialog')

pageTrigger.addEventListener('click', () => showMyPage())
mypage.addEventListener('click', (e) => {
    e.target == mypage && closeMyPage()
})

function showMyPage() {
    toogleMyPage(mypage)
    mypage.style.animation = 'page_bg'
    mypage.style.animationDuration = '0.5s'

    mypageDialog.style.animation = 'page'
    mypageDialog.style.animationDuration = '0.5s'
    mypage.style.transform = 'translate(0)'

    mypageDialog.style.transform = 'rotate3d(0, 0, 0, 0)'
    mypageDialog.style.opacity = '1'
}

function closeMyPage() {
    mypage.style.transform = 'translate(100%)'

    mypageDialog.style.transform = 'rotate3d(250, -130, 50, 90deg)'
    mypageDialog.style.opacity = '0'

    mypage.onanimationend = () => toogleMyPage(mypage)
}
function toogleMyPage(elem) {
    elem.classList.toggle('hide')
}