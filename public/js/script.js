//sélecteur membre_container
const membres_container = document.querySelector('#membres-container');
//récupère donnée
fetch('http://localhost:8000/api/membres')
//en JSON
.then((response) => response.json())
//dans les données
.then((data) =>{
    //hydrater
    const membres = data["hydra:member"];
    //pour chaque membre dans membre
    membres.forEach(membre =>{
        //crée une div membre_box
        let membre_box = document.createElement('div');
        
        membre_box.innerHTML = membre.last.toUpperCase() + ' ' + membre.first;
        membres_container.appendChild(membre_box);
    });
})