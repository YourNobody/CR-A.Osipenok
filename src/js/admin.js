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
    const grupNUM = [...tr.children].find(item => item.id === 'grup__num')

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
                `<h2 for="deletefio">Вы действительно желаете удалить студета <span style="color: green; font-size: 20px;">${studFIO.innerText} </span>из группы <span style="color: green; font-size: 20px;">${grupNUM.innerText}</span>?</h2>
                    <input id="deletefio" name="deletefio" value="${studFIO.innerText}" type="hidden"/>
                    <input id="deletegroup" name="deletegroup" value="${grupNUM.innerText}" type="hidden"/>
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



//<div class="table">
//                     <table>
//                         <thead>
//                             <tr>
//                                 <th>Номер зачетки</th>
//                                 <th>ФИО студента</th>
//                                 <th>Курс</th>
//                                 <th>Группа</th>
//                                 <th>Специальность</th>
//                                 <th>Факультет</th>
//                                 <?php 
//                                     if ($access === 'admin') echo "<th>Действия</th>";
//                                 ?>
//                             </tr>
//                         </thead>
//                         <tbody>
//                             <?php
//                                 if ($access === 'admin') {
//                                     while ($row = mysqli_fetch_array($result)) {
//                                         echo "<tr>
//                                         <td>$row[N_zachetki]</td>
//                                         <td id=\"stud__fio\">$row[full_fio]</td>
//                                         <td>$row[kurs]</td>
//                                         <td id=\"name__num\">$row[number_group]</td> 
//                                         <td>$row[name_spec]</td>
//                                         <td>$row[name_fac]</td>
//                                         <td>
//                                             <div data-aim=\"changing\" class=\"ch__img\"><img src=\"icons/selection.svg\" data-aim=\"changing\"></div>
//                                             <div data-aim=\"deleting\" class=\"ch__img\"><img src=\"icons/delete.svg\" data-aim=\"deleting\"></div>
//                                         </td>
//                                     </tr>";
//                                     }
//                                 } else {
//                                     while ($row = mysqli_fetch_array($result)) {
//                                         echo "<tr>
//                                         <td id=\"stud__fio\">$row[st_f_name] $row[st_l_name] $row[st_patronymic]</td>
//                                         <td id=\"grup__num\">$row[id_group]</td>
//                                         </tr>"; 
//                                     }
//                                 }
//                                 $mysql->close();
//                             ?>
//                         </tbody>
//                     </table>
//                 </div>                                <th>Факультет</th>
//                                 <?php 
//                                     if ($access === 'admin') echo "<th>Действия</th>";
//                                 ?>
//                             </tr>
//                         </thead>
//                         <tbody>
//                             <?php
//                                 if ($access === 'admin') {
//                                     while ($row = mysqli_fetch_array($result)) {
//                                         echo "<tr>
//                                         <td>$row[N_zachetki]</td>
//                                         <td id=\"stud__fio\">$row[full_fio]</td>
//                                         <td>$row[kurs]</td>
//                                         <td id=\"name__num\">$row[number_group]</td> 
//                                         <td>$row[name_spec]</td>
//                                         <td>$row[name_fac]</td>
//                                         <td>
//                                             <div data-aim=\"changing\" class=\"ch__img\"><img src=\"icons/selection.svg\" data-aim=\"changing\"></div>
//                                             <div data-aim=\"deleting\" class=\"ch__img\"><img src=\"icons/delete.svg\" data-aim=\"deleting\"></div>
//                                         </td>
//                                     </tr>";
//                                     }
//                                 } else {
//                                     while ($row = mysqli_fetch_array($result)) {
//                                         echo "<tr>
//                                         <td id=\"stud__fio\">$row[st_f_name] $row[st_l_name] $row[st_patronymic]</td>
//                                         <td id=\"grup__num\">$row[id_group]</td>
//                                         </tr>"; 
//                                     }
//                                 }
//                                 $mysql->close();
//                             ?>
//                         </tbody>
//                     </table>
//                 </div>