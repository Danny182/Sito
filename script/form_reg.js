// JavaScript Document

$(document).ready(function(){
  $("#f-reg").validate({
	  
	  rules: {
		  nome: {
			required: true
			
		  },
		  
		  cognome: {
			required: true
			
		  },
		  
		  
		 nascita_giorno: {
			required: true
		  },
		 nascita_mese: {
			required: true
		  },
		 nascita_anno: {
			required: true
		  },
		  
		   citta: {
			required: true
			
		  },
		  
		  email: {
			required: true,
			email: true
		  },
		  
		  password: {
		 
			required: true
		  },
		  password2:
            {
                required: true,
                equalTo: "#password"
            },
		  user: {
		 
			required: true
			
		  },
		  
		  risposta: {
		 
			required: true
		  }
	  },
	  messages:{
		  	nome:required:"Inserisci il tuo nome",
		  	cognome:required:"Inserisci il tuo cognome",
			nascita_giorno:required:"inserisci il tuo giorno di nascita",
			nascita_mese:"inserisci il tuo mese di nascita",
			nascita_anno:"inserisci il tuo anno di nascita",
			citta:"inserisci la tua città",
			email:"inserisci la tua email",
			password:"inserisci la tua password",
			password2:"le password non coincidono",
			user:required:"inserisci un username",
			risposta:"inserisci una risposta"
	  },
			
	   success: function(label) {
      label.text('OK!').addClass('valid');
    }
  });
  
  });


	  
	  
	  