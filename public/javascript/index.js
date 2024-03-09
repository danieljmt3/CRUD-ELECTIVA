document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var titulo = document.getElementById('titulo').value;
    var descripcion = document.getElementById('descripcion').value;

    var formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('descripcion', descripcion);

    fetch('../controladores/crear.task.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message)
            alert(data.message)
            document.querySelector('form').reset();
        })
        .catch((error) => {
            console.log('Error:', error);
        });
});