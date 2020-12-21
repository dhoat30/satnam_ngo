import '../style.css';
let $ = jQuery; 


class Form{
    constructor(){

        this.events(); 
    }
    
    events(){
        $('#contact-form').submit(this.formProcessor);
    }

    formProcessor(e){
        e.preventDefault(); 
        const url = window.location.href+'processor';

        console.log(url);
        let data = e.target; 
        let formData = { 
			name: data[0].value, 
			email: data[1].value,
			msg: data[2].value
        }
        const jsonData = JSON.stringify(formData); 
		
		let xhr = new XMLHttpRequest();

		xhr.open('POST', url); 

		xhr.setRequestHeader('Content-Type', 'application/json'); 

		xhr.onload = function(){ 
			console.log(xhr.status);
			
			if(xhr.status == 200){ 
				let msg = document.querySelector('.success-message'); 
				msg.classList.add('success-message-style');
				msg.innerHTML= "Thanks for the contacting us!";
				
				data[0].value =""; 
				data[1].value =""; 
				data[2].value =""; 
			
				
			}
			else{ 
				let msg = document.querySelector('.success-message'); 
				msg.classList.add('error-message');
				msg.innerHTML= "Something went wrong. Please try again.";
			}
		}

        xhr.send(jsonData);
        
    }
    
}

const form = new Form();