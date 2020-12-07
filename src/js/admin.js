'use strict'

const settsTrigger = document.querySelector('.admin__trig'),
      setts = document.querySelector('.admin__setts'),
      settsPoints = setts.querySelectorAll('li')

settsTrigger.addEventListener('click', () => toogleAdminSetts())
settsTrigger.addEventListener('selectstart', () => false)
settsPoints.forEach(item => item.addEventListener('click', (e) => showThePoint(e)))

function toogleAdminSetts() {
    if (!setts.classList.contains('hide')) {
        setts.style.transform = 'translateY(-100%)'
        setts.style.opacity = '0'
        toggleElem(setts)
    } else if (setts.classList.contains('hide')) {
        toggleElem(setts)
        setts.style.transform = 'translateY(0)'
        setts.style.opacity = '1'
    }
}

function toggleElem(elem) {
    elem.classList.toggle('hide')
}

const chBtns = document.querySelectorAll('.ch__img')

chBtns.forEach(item => item.addEventListener('click', (e) => showChangeForm(e)))

function showChangeForm(e) {
    const { aim } = e.target.dataset
    let tr = e.target
    while(tr.tagName !== 'TR') {
        tr = tr.parentNode
        if (tr == document.body) break;
    }

    const studFIO = [...tr.children].find(item => item.id === 'stud__fio')
    const grupNUM = [...tr.children].find(item => item.id === 'number__group')
    const numZach = [...tr.children].find(item => item.id === 'number__zach')
    const cursNUM = [...tr.children].find(item => item.id === 'curs__num')
    const specName = [...tr.children].find(item => item.id === 'name__spec')
    const facName = [...tr.children].find(item => item.id === 'name__fac')

    if (aim === 'adding') {
        document.querySelectorAll('main > div').forEach(item => {
            item.classList.add('hide')
            if (item.id === "add__info") item.classList.remove('hide')
        })
    } else if(aim === 'deleting') {
        document.querySelectorAll('main > div').forEach(item => {
            item.classList.add('hide')
            if (item.id === "deleting__info") {
                item.classList.remove('hide')
                document.querySelector('#deleting__info form').innerHTML = 
                `<h2 for="deletefio">Вы действительно желаете удалить студета <span style="color: green; font-size: 20px;">${studFIO.innerText} </span>из группы <span style="color: green; font-size: 20px;">${grupNUM.innerText}</span> с <span style="color: green; font-size: 20px;">${numZach.innerText}</span>?</h2>
                    <input id="n__zach" name="n__zach" value="${numZach.innerText}" type="hidden"/>
                <button type="submit">Удалить</button>`
            }
        })
    } else if(aim === 'changing') {
        document.querySelectorAll('main > div').forEach(item => {
            item.classList.add('hide')
            if (item.id === "change__info") item.classList.remove('hide')
        })

        const changeInfoBlock = document.querySelector('#change__info')
        const allFieldsForChange = [
            ...changeInfoBlock.querySelectorAll('input'),
            ...changeInfoBlock.querySelectorAll('select')
        ]

        Array.prototype.forEach.call(tr.children, item => {
            const inp = allFieldsForChange.find(f => {
                if (f.dataset.ref === 'number__group') {
                    f.style.backgroundColor = 'rgba(0,255,0,0.2)'
                    setTimeout(() => {
                        f.style.backgroundColor = 'transparent'
                    }, 3000)
                }
                if (f.dataset.ref === item.id && f.dataset.ref !== 'number__group') return f
            })
            
            if (inp) {
                inp.value = item.innerText
            }

            if (item.id === 'stud__fio') {
                const inits = item.innerText.split(' ')
                console.log(inits)
                allFieldsForChange.forEach(f => {
                    if (f.dataset.ref === 'stud__fio' && f.id === 'firstname') f.value = inits[1].trim()
                    if (f.dataset.ref === 'stud__fio' && f.id === 'lastname') f.value = inits[0].trim()
                    if (f.dataset.ref === 'stud__fio' && f.id === 'patronymic') f.value = inits[2].trim()
                })
            }
        })
    }
}



