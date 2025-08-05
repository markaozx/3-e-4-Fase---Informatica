document.getElementById('search-form').addEventListener('submit', function(event){
    event.preventDefault();
    
    const form = event.target;
    const pokemonNome = form.elements['pokemon_name'].value;
    console.log(pokemonNome);

    const imagem = document.getElementById('pokemon-image')
    const nome = document.getElementById('pokemon-name')
    const id = document.getElementById('pokemon-id')
    const tipo = document.getElementById('pokemon-type')
    const desc = document.getElementById('pokemon-description')
    
})