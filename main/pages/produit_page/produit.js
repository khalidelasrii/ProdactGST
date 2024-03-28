function showForm() {
    // Créer un formulaire HTML
    var formHtml = `
    <div id="form-overlay" style=" position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
">
<div id="form-container" style="    
    background-color: #20B2AA;
    padding: 20px;
    border-radius: 20px;">
    <h2 style="text-align: center;">Ajouter un Article</h2>
    <br>
    <form  method="POST">
        <label for="colors">Choisir une Type:</label>
        <br>
        <select id="colors" name="colors" style="width:150px">
            <option value="red">Rouge</option>
            <option value="green">Vert</option>
            <option value="blue">Bleu</option>
            <option value="yellow">Jaune</option>
        </select>
        <br><br>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>
        <br><br>
        <label for="prix">Prix:</label>

        <input type="number" name="prix"  id="prix">
        <br><br>
        <label for="description">Discription:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br><br>
        <input type="submit" value="Ajouter">
        <button onclick="hideForm()">Annuler</button>
    </form>
</div>
</div> 
`;

    // Ajouter le formulaire au document
    document.body.insertAdjacentHTML('beforeend', formHtml);
}

// Fonction pour masquer le formulaire
function hideForm() {
    var formOverlay = document.getElementById('form-overlay');
    formOverlay.parentNode.removeChild(formOverlay);
}