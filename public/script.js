const botaoAddTop = document.getElementById('botaoAddTop');
const topicos = document.getElementById('topicos');
let topicoSelecionado = 0;



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
        listaDeTopicos.push({nome: nomeDoTopico, tasks: ['']})
        listaDeTopicos.forEach(topico => {
            topicos.innerHTML += `<div class="topicoClick" data-name = "${topico.nome}">${topico.nome}</div> <br>`;
        });

        //pega todos as divs que tem a classe topicoClick 
        const divTopico = document.querySelectorAll(".topicoClick");

        //adiciona um listener em todos eles  
        divTopico.forEach(topico => {
            topico.addEventListener('click',abrirTopico);
            
        });

        console.log(listaDeTopicos);
        divDoInput.remove();

};


function abrirTopico(){
    const displayTasks = document.querySelector('main');
    const nomeDoTopico = this.getAttribute("data-name"); // Pega o nome do atributo data-nome
    const divTopico = document.querySelectorAll(".topicoClick");


    divTopico.forEach(div => div.style.backgroundColor = '');
    this.style.backgroundColor = '#636364';


    displayTasks.innerHTML = '';


    displayTasks.innerHTML = `<h1>${nomeDoTopico}</h1>`

    listaDeTopicos.forEach((topico, index) => {
        if(topico.nome == nomeDoTopico){
            //mudar valor do topico selecionado
            topicoSelecionado = index;

            topico.tasks.forEach(tasks => {
                displayTasks.innerHTML += `<div>${tasks}</div>`
                
            });
        }
        
        
    });
    

}





