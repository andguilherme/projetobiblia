
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


