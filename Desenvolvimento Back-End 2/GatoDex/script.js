document.getElementById("get-cat-btn").addEventListener("click", () => {
    fetch("./getCat.php") // chama o PHP
        .then(response => response.json())
        .then(data => {
            if (data.length > 0 && data[0].url) {
                document.getElementById("cat-image").src = data[0].url;
            } else {
                alert("Não foi possível carregar a imagem do gato.");
            }
        })
        .catch(error => {
            console.error("Erro:", error);
            alert("Erro ao buscar gato.");
        });
});
