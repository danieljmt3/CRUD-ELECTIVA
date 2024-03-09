// Espera a que el documento HTML se haya cargado completamente
document.addEventListener("DOMContentLoaded", ()=>{
    listar();
});

let listar = function() {
    fetch('../controladores/listar.task.php')
        .then(response => response.json())
        .then(data => {
            const tasksContainer = document.querySelector('.tasks');
            data.forEach(task => {
                const taskElement = document.createElement('div');
                taskElement.classList.add('task');

                const taskDescription = document.createElement('p');
                taskDescription.textContent = task.titulo;
                taskElement.appendChild(taskDescription);

                const actionsContainer = document.createElement('div');
                actionsContainer.classList.add('cont-actions');

                const completeButton = document.createElement('button');
                completeButton.textContent = 'Completar';
                completeButton.type = 'button';
                actionsContainer.appendChild(completeButton);

                const editForm = document.createElement('form');
                editForm.action = '../controladores/controller.task.edit.php';
                editForm.method = 'GET';

                const hiddenIdInput = document.createElement('input');
                hiddenIdInput.type = 'hidden';
                hiddenIdInput.name = 'id';
                hiddenIdInput.value = task.id;
                editForm.appendChild(hiddenIdInput);

                const submitInput = document.createElement('input');
                submitInput.type = 'submit';
                editForm.appendChild(submitInput);

                actionsContainer.appendChild(editForm);
                taskElement.appendChild(actionsContainer);
                tasksContainer.appendChild(taskElement);
            });
        })
        .catch(error => {
            console.error('Error al obtener las tareas:', error);
        });
};


console.log("sirve")