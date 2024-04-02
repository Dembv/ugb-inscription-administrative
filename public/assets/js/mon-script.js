$(document).ready(function(){
    
    $('#loginForm').submit(function(event){
        // Empêcher le formulaire de se soumettre
        event.preventDefault();
        // Récupérer les valeurs des champs

        let email = '';
        let password = '';
        email = $('#email').val();
        password = $('#password').val();

        // Définir les expressions régulières pour la validation
        let emailRegex = /^[a-zA-Z0-9._%+-]+@ugb\.edu\.sn$/;
        let passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/;

        if (email == '' && password == '') {
            $('#messageEmail').text('Tous les champs sont obligatoires.');
            $('#messageEmail').css('color', 'red');
            $('#messagePassword').text('Tous les champs sont obligatoires.');
            $('#messagePassword').css('color', 'red');
            return;
        }

        if (email == '') {
            $('#messageEmail').text('L\'email est obligatoire.');
            $('#messagePassword').text('');
            $('#messageEmail').css('color', 'red');
            return;
        }

        if (password == '') {
            $('#messageEmail').text('');
            $('#messagePassword').text('Le mot de passe est obligatoire.');
            $('#messagePassword').css('color', 'red');
            return;
        }
        
        // Valider l'email
        if(!emailRegex.test(email)){
            $('#messageEmail').text("Format email valide : xxx.xxx-xxx@ugb.edu.sn");
            $('#messageEmail').css('color', 'red');
            return;
        }

        // Valider le mot de passe
        if(!passwordRegex.test(password)){
            $('#messagePassword').text("Le mot de passe doit contenir 6 caractères, commencer par une majuscule et inclure au moins un chiffre.");
            $('#messagePassword').css('color', 'red');
            return;
        }
        
        this.submit();
    });
});