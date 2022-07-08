   
    function cin(objet)
      {         
          var cin = document.formulaire.cin_employe.value;
          if((cin!="" && !isNaN(cin)) && cin.length==8) {
           objet.style.borderColor="green" ; 
            document.getElementById("testCin").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testCin").innerHTML ="Champ obligatoire,Veuillez saisir 8 caractéres !";
          }   
      }

      function nom(objet)
        {         
          var nom = document.formulaire.nom_employe.value;
          if((nom!="" ) ) {
           objet.style.borderColor="green" ; 
            document.getElementById("testNom").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testNom").innerHTML ="Champ obligatoire ";
          }   
        }

      function prenom(objet)
      {         
          var prenom = document.formulaire.prenom_employe.value;
          if((prenom!="" ) ) {
           objet.style.borderColor="green" ; 
            document.getElementById("testPrenom").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testPrenom").innerHTML ="Champ obligatoire ";
          }   
        }

     function adr(objet)
      {         
          var adr = document.formulaire.adresse_employe.value;
          if((adr!="" ) ) {
           objet.style.borderColor="green" ; 
            document.getElementById("testAdr").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testAdr").innerHTML ="Champ obligatoire ";
          }   
        }


     function sexe(objet)
      {         
          var sexe = document.formulaire.sexe_employe.value;
          if((sexe!="" ) ) {
           objet.style.borderColor="green" ; 
            document.getElementById("testSexe").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testSexe").innerHTML ="Champ obligatoire ";
          }   
        }
        function fonction(objet)
      {         
          var fonction = document.formulaire.fonction_employe.value;
          if((fonction!="" ) ) {
           objet.style.borderColor="green" ; 
            document.getElementById("testFonction").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testFonction").innerHTML ="Champ obligatoire ";
          }   
        }


      function email(objet)
      {         
          var email = document.formulaire.mail_employe.value;
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

          if((email!="" ) && (email.match(mailformat))) {
           objet.style.borderColor="green" ; 
            document.getElementById("testEmail").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testEmail").innerHTML ="Champ obligatoire, vérifier l'email ";
          } 
        }

      function tel(objet)
      {         
          var tel = document.formulaire.tel_employe.value;
          if((tel!="" && !isNaN(tel)) && tel.length==8) {
           objet.style.borderColor="green" ; 
            document.getElementById("testTel").innerHTML ="";
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testTel").innerHTML ="Champ obligatoire de 8 car!";
          }   
      }

      function date(objet)
        {         
          var date = document.formulaire.dateEntre_employe.value;
         
          if((date!="" ) ) {
           
             objet.style.borderColor="green";
            document.getElementById("testDate").innerHTML ="";
         
          }
          else {
            objet.style.borderColor="red";
            document.getElementById("testDate").innerHTML ="Champ obligatoire ";
          }   
        }


        