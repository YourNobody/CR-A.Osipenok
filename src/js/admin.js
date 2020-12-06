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

    if (aim === 'adding') {
        document.querySelectorAll('main > div').forEach(item => {
            item.classList.add('hide')
            if (item.id === "change__info") item.classList.remove('hide')
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
        const studFIOInnerText = studFIO.innerText
        const grupNUMInnerText = grupNUM.innerText
        studFIO.innerHTML = `<input type="text" size="50" style="background-color: rgba(0,0,0,0.1); font-size: "20px;" value="${studFIOInnerText}"/>`
        grupNUM.innerHTML = `<input type="text" size="15" style="background-color: rgba(0,0,0,0.1); font-size: "20px;" value="${grupNUMInnerText}"/>`

        document.addEventListener('keypress', function handler(e) {
            if (e.code == 'Enter') {
                const newStudFIOInnerText = studFIO.querySelector('input').value
                const newGrupNUMInnerText = grupNUM.querySelector('input').value
                studFIO.innerText = newStudFIOInnerText
                grupNUM.innerText = newGrupNUMInnerText
            }
        })
        document.removeEventListener('keypress', () => handler(e))
        function handler(e) {
            if (e.code == 'Enter') {
                const newStudFIOInnerText = studFIO.querySelector('input').value
                const newGrupNUMInnerText = grupNUM.querySelector('input').value
                studFIO.innerText = newStudFIOInnerText
                grupNUM.innerText = newGrupNUMInnerText
            }
        }
    }
}



