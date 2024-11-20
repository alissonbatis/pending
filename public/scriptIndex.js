const botaoAddTop = document.getElementById("botaoAddTop");
const topicos = document.getElementById("topicos");
const tasks = document.getElementById("sectionTasks");
const menuAddTask = document.getElementById("menuAddTask");





//logica para remoçao de task e topico
document.addEventListener('DOMContentLoaded', function() {


    //TOPICO===========================================================

    const topicosListados = Array.from(document.getElementsByClassName("topico"));

    if(topicosListados.length > 0){
      
      console.log(topicosListados); 

      topicosListados.forEach((topico) => {
  
        topico.addEventListener("contextmenu", function (event) {
            event.preventDefault();
  
  
            const idDoTopico = topico.getAttribute('data-topico-id');
  
  
            console.log(idDoTopico);
  
            //add clique no botao de excluir
            const botaoExcluirTask = document.getElementById('excluirTask');
            botaoExcluirTask.addEventListener('click',function(){
                window.location.href = `excluirTopico.php?idDoTopico="${idDoTopico}"`;
  
  
  
            })
  
  
  
            // Pega o menu e o posiciona no local do clique
            const menuTask = document.getElementById("menuTask");
  
            // Definir a posição do menu
            menuTask.style.top = event.y;
            menuTask.style.left = event.x;
  
            
            menuTask.classList.toggle("hidden");
        });})

    
    };

    //remover quando clicar em outro lugar
    document.addEventListener('click', function(event) {
        const menuTask = document.getElementById('menuTask');
        if (!menuTask.classList.contains('hidden')) {
            menuTask.classList.add('hidden');
            
        }
    });
});



function removerForm(idForm, idInput) {
  const novoInput = document.getElementById(idInput);
  novoInput.focus();
  const form = document.getElementById(idForm);

  novoInput.addEventListener("blur", () => {
    form.remove(); // Remove o input
  });
}

botaoAddTop.addEventListener("click", () => {
  // Adiciona o formulário para criar o tópico
  topicos.innerHTML += `
        <form id="formTopico" method="POST" action = "processaTopico.php">

            <input type="text" id="inputTopico" name="topicoNome">

            <button id="confirmarInput" type="submit">
                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
            </button>
        </form>`;

  
});
