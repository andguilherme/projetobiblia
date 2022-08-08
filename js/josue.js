var txtJosue = {
    cap1: [
        {
            "nome": "Josué",
            "vers": "1",
            "texto": "E SUCEDEU depois da morte de Moisés, servo do SENHOR, que o SENHOR falou a Josué, filho de Num, servo de Moisés, dizendo:"
        },
        {
            "nome": "Josué",
            "vers": "2",
            "texto": " Moisés, meu servo, é morto; levanta-te, pois, agora, passa este Jordão, tu e todo este povo, à terra que eu dou aos filhos de Israel."
        },
        {
            "nome": "Josué",
            "vers": "3",
            "texto": " Todo o lugar que pisar a planta do vosso pé, vo-lo tenho dado, como eu disse a Moisés."
        },
        {
            "nome": "Josué",
            "vers": "4",
            "texto": "Desde o deserto e do Líbano, até ao grande rio, o rio Eufrates, toda a terra dos heteus, e até o grande mar para o poente do sol, será o vosso termo."
        },
        {
            "nome": "Josué",
            "vers": "5",
            "texto": "Ninguém te poderá resistir, todos os dias da tua vida; como fui com Moisés, assim serei contigo; não te deixarei nem te desampararei.."
        }
    ],
    cap2: [
        {
            "nome": "Josué",
            "vers": "1",
            "texto": "E JOSUÉ, filho de Num, enviou secretamente, de Sitim, dois homens a espiar, dizendo: Ide reconhecer a terra e a Jericó. Foram, pois, e entraram na casa de uma mulher prostituta, cujo nome era Raabe, e dormiram ali"
        },
        {
            "nome": "Josué",
            "vers": "2",
            "texto": "Então deu-se notícia ao rei de Jericó, dizendo: Eis que esta noite vieram aqui uns homens dos filhos de Israel, para espiar a terra."
        }
    ]
}

var select = document.getElementById('icap');
var tit = document.querySelector(".texto h1");
b = select.options[select.selectedIndex].textContent;

/* select.addEventListener('change', function () {

    if (select.selectedIndex == 0) {
        tit.textContent = txtJosue.cap1[0].nome + ' ' + "1";
        for (i = 0; i < select.options.length; i++) {

            document.querySelector(".js" + i).textContent = txtJosue.cap1[i].vers + "  " + txtJosue.cap1[i].texto;

        }
    } else if (select.selectedIndex == 1) {
        tit.textContent = txtJosue.cap1[1].nome + ' ' + "2";
        for (i = 0; i < txtJosue.cap2.length; i++) {

            document.querySelector(".js" + i).textContent = txtJosue.cap2[i].vers + " " + txtJosue.cap2[i].texto;
        }
    }
}) */

function criaclasse() {

    for (i = 0; i < select.options.length; i++) {
        a = document.createElement("p");
        b = document.querySelector(".texto");
        b.appendChild(a);
        a.id = 'gn';
        a.className = 'js' + i;
    }
}


function txtCap() {
    txt = document.querySelectorAll("aside a");
    c = document.querySelectorAll(".texto p").length;
    criaclasse();

    for (i = 0; i < c; i++) {
        n = txt[i].textContent;
        if (n == "1") {
            for (i = 0; i < select.options.length; i++) {
                document.querySelector(".js" + i).textContent = txtJosue.cap1[i].vers + "  " + txtJosue.cap1[i].texto;
               
            }
            break;
        } else if (n == "2") {
            for (i = 0; i < txtJosue.cap2.length; i++) {
                document.querySelector(".js" + i).textContent = txtJosue.cap2[i].vers + " " + txtJosue.cap2[i].texto;
                
            }
            break;
        }
    }
    document.getElementsByTagName("a").
}

