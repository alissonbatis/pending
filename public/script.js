const botaoAddTop = document.getElementById("botaoAddTop");
const topicos = document.getElementById("topicos");
const tasks = document.getElementById("sectionTasks");
const botaoAddTask = document.getElementById("botaoAddTask");
const botaoCheckBox = document.getElementById("checkbox");
const botaoText = document.getElementById("text");
const menuAddTask = document.getElementById("menuAddTask");






document.addEventListener('DOMContentLoaded', function() {
    const tasksListadas = Array.from(document.getElementsByClassName("task"));

    console.log(tasksListadas); 



    tasksListadas.forEach((task) => {

    task.addEventListener("contextmenu", function (event) {
        event.preventDefault();


        const idDaTask = task.getAttribute('data-task-id');


        console.log(idDaTask);

        //add clique no botao de excluir
        const botaoExcluirTask = document.getElementById('excluirTask');
        botaoExcluirTask.addEventListener('click',function(){
            window.location.href = `excluirTask.php?idDaTask="${idDaTask}"`;



        })



        // Pega o menu e o posiciona no local do clique
        const menuTask = document.getElementById("menuTask");

        // Definir a posição do menu
        menuTask.style.top = event.y;
        menuTask.style.left = event.x;

        
        menuTask.classList.toggle("hidden");
    });
    });



    //remover quando clicar em outro lugar
    document.addEventListener('click', function(event) {
        const menuTask = document.getElementById('menuTask');
        if (!menuTask.classList.contains('hidden')) {
            menuTask.classList.add('hidden');
            
        }
    });
})










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

            <input type="text" id="inputTopico" name="topicoNome" required>

            <button id="confirmarInput" type="submit">
                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
            </button>
        </form>`;

  removerForm("formTopico", "inputTopico");
});

botaoAddTask.addEventListener("click", () => {
  menuAddTask.classList.toggle("hidden"); // Alterna a visibilidade diretamente
});

botaoCheckBox.addEventListener("click", () => {
  // Pega o topicoId da URL
  const urlParams = new URLSearchParams(window.location.search);
  const topicoId = urlParams.get("topicoId"); // Obtém o topicoId da URL
  const topico = urlParams.get("topico");

  // Adiciona o formulário para criar uma nova task, incluindo topicoId como um campo oculto
  tasks.innerHTML += `
        <form method="POST" action="processaTask.php" id = "formTasks">

            <input type="hidden" name="topicoId" value="${topicoId}"> 
            <input type="hidden" name="topico" value="${topico}">
            <input type="hidden" name="tipo" value="checkbox">
            

            <input type="text" id="inputTask" name="taskNome" required>
            <button id="confirmarInput" type="submit">
                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
            </button>
        </form>
    `;

  removerForm("formTasks", "inputTask");
});

botaoText.addEventListener("click", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const topicoId = urlParams.get("topicoId"); // Obtém o topicoId da URL
  const topico = urlParams.get("topico");

  // Adiciona o formulário para criar uma nova task, incluindo topicoId como um campo oculto
  tasks.innerHTML += `
        <form method="POST" action="processaTask.php" id = "formTasks">

            <input type="hidden" name="topicoId" value="${topicoId}"> 
            <input type="hidden" name="topico" value="${topico}">
            <input type="hidden" name="tipo" value="text">
            
            <textarea name="taskNome" id="inputTask" placeholder = "Digite seu texto aqui..." required></textarea>
            <button id="confirmarInput" type="submit">
                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
            </button>
        </form>
    `;
  removerForm("formTasks", "inputTask");
});
