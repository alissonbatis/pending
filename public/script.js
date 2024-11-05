const botaoAddTop = document.getElementById('botaoAddTop');
const topicos = document.getElementById('topicos');

let listaDeTopicos = [];




botaoAddTop.addEventListener('click', ()=>{

    

    topicos.innerHTML += `<div id = "divDoInput">
                <input type="text" id = "inputTopico">
                <button id="confirmarInput">
                    <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                </button>
            </div>`;
    
    const confirmarInput = document.getElementById('confirmarInput');
    const inputTopico = document.getElementById('inputTopico');
    const divDoInput = document.getElementById('divDoInput');
    
    
    confirmarInput.addEventListener('click', () => {enviarTopico(inputTopico, divDoInput)});

    inputTopico.addEventListener('keydown', (event)=>{
        if(event.key == "Enter"){
            enviarTopico(inputTopico, divDoInput);
        }
    })



});
    


function enviarTopico(inputTopico, divDoInput){
    const nomeDoTopico = inputTopico.value

        topicos.innerHTML = ``
        listaDeTopicos.push({nome: nomeDoTopico, tasks: []})
        listaDeTopicos.forEach(topico => {
            topicos.innerHTML += `<a href="/topico/:${topico.nome}">${topico.nome}</a> <br>`;
        });
        console.log(listaDeTopicos);
        divDoInput.remove();

};


