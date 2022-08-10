<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d3cac0cb2e6cc74d618b9577c0662143d020a328

function minhabusca() {
    var paragrafo = document.querySelectorAll('.texto p')
    var busca = document.querySelector("#busca").value

    for (i = 0; i < paragrafo.length; i++) {
        if (paragrafo[i].innerText.match(busca) !== null) {
            document.write(paragrafo[i].innerText + '<br>')
           
        }
        else if (i==31){
            window.alert('nada encontrado');
            
        }


    }

}


<<<<<<< HEAD
=======
=======

function minhabusca() {
    var paragrafo = document.querySelectorAll('.texto p')
    var busca = document.querySelector("#busca").value

    for (i = 0; i < paragrafo.length; i++) {
        if (paragrafo[i].innerText.match(busca) !== null) {
            document.write(paragrafo[i].innerText + '<br>')
           
        }
        else if (i==31){
            window.alert('nada encontrado');
            
        }


    }

}


>>>>>>> 878c6f277bbf0a424309562c48617547c5431ecf
>>>>>>> d3cac0cb2e6cc74d618b9577c0662143d020a328
