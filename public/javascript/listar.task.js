// Espera a que el documento HTML se haya cargado completamente
document.addEventListener("DOMContentLoaded",()=>{
    listar_tareas();
});

let listar_tareas =  function() {
    // Realiza una solicitud para obtener las tareas
    fetch('../controladores/Listar.task.php')
        .then(response => response.json()) // Parsea la respuesta como JSON
        .then(data => {
            // Selecciona el contenedor de tareas
            const tasksContainer = document.querySelector('.tasks');
            console.log(data)
            // Itera sobre cada tarea en los datos recibidos
            data.forEach(task => {
                // Crea un nuevo elemento de tarea
                
                const taskElement = document.createElement('div');
                taskElement.classList.add('task');
                
                // Crea un párrafo para la descripción de la tarea
                const taskDescription = document.createElement('p');
                taskDescription.textContent = task.titulo;
                
                // Crea un contenedor para las acciones
                const actionsContainer = document.createElement('div');
                actionsContainer.classList.add('cont-actions');
                
                // Crea botones para completar y editar la tarea
                const completeButton = document.createElement('button');
                completeButton.textContent = 'Completar';
                completeButton.type = 'button';
                
                const editButton = document.createElement('button');
                editButton.textContent = 'Editar';
                
                // Agrega los botones al contenedor de acciones
                actionsContainer.appendChild(completeButton);
                actionsContainer.appendChild(editButton);
                
                // Agrega el párrafo y el contenedor de acciones al elemento de tarea
                taskElement.appendChild(taskDescription);
                taskElement.appendChild(actionsContainer);
                
                // Agrega el elemento de tarea al contenedor de tareas
                tasksContainer.appendChild(taskElement);
                
            });
        })
        .catch(error => {
            console.error('Error al obtener las tareas:', error);
        });
};

console.log("sirve")