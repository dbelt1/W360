<template>
    <div class="container contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="http://w360.co/assets/img/logo.png" alt="image"/>
                    <h2>Contactenos</h2>
                    <h4>Estamos para servirte</h4>
                </div>
            </div>
            <div class="col-md-9">
                <!--Llamado al metodo saveData para guardar toda la info-->
                <form class="contact-form" @submit.prevent="saveData">

                    <p v-if="errors.length">
                        <b>Validar los siguientes campos:</b>
                        <ul>
                        <li v-for="error in errors" :key="error.id">{{ error }}</li>
                        </ul>
                    </p>

                    <div class="form-group">
                    <label class="control-label col-sm-2" for="priority">Prioridad:</label>
                    <div class="col-sm-10">          
                        <select  v-model="form.priority" class="custom-select" id="inputGroupSelect01">
                            <option selected>Seleccionar ...</option>
                            <option value="High">Alta</option>
                            <option value="Medium">Media</option>
                            <option value="Low">Baja</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="first_name">Nombres:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="first_name" placeholder="Nombres" v-model="form.first_name">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="last_name">Apellidos:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="last_name" placeholder="Apellidos" v-model="form.last_name">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="message">Mensaje:</label>
                    <div class="col-sm-10">
                        <textarea name="message" class="form-control" rows="5" v-model="form.message"></textarea>
                    </div>
                    </div>
                    <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Enviar Contacto</button>
                    </div>
                    </div>
                </form>
                
            </div>
        </div>
        <div id="notification">

        </div>
    </div>
</template>

<script>
    export default {
        data(){

            return{
                //datos del formulario
                form :{
                    priority : '',
                    first_name : '',
                    last_name : '',
                    email : '',
                    message:''
                },
                errors:[]
            }
        },

        methods:{
           //guardar la info del contacto en el controlador store
            saveData(e){
                this.checkForm()
                // objeto para enviar la info y guardar a la api
                const params = {
                    'priority':this.form.priority,
                    'name':this.form.first_name,
                    'last_name':this.form.last_name,
                    'email':this.form.email,
                    'message':this.form.message
                }
                axios.post(`/api/contact`,params).then(res=>{
                    //limpiar el objeto para agregar nuevo contacto
                    this.form = {
                    priority : '',
                    first_name : '',
                    last_name : '',
                    email : '',
                    message:''
                }
                    const notification = res.data
                    this.createNotification(notification)
                }).catch(error =>{
                    console.log(error);
                })
            },
            //validar la información de cada campo
            checkForm(){
                    this.errors = []
                    if(!this.form.priority){
                        this.errors.push('Escoga una prioridad')
                    }
                    if(!this.form.first_name){
                        this.errors.push('Escriba su nombre')
                    }
                    if(!this.form.last_name){
                        this.errors.push('Escriba su apellido')
                    }
                    if(!this.form.email){
                        this.errors.push('Escriba su email')
                    }
                    if(!this.form.message){
                        this.errors.push('Escriba un mensaje')
                    }
                
              
            }, 
            //notificacion de usuario creado
            createNotification(notification){
            const div = document.createElement('div')
            div.classList.add('toast')
            div.innerText = notification
            const noti = document.getElementById('notification')
            noti.appendChild(div)
            setTimeout(()=>{
                div.remove()
            },3000)
}
        
        },
       
    }
</script>
<style>
       	body{
		background-color: #25274d;
	}
	.contact{
		padding: 4%;
		height: 400px;
	}
	.col-md-3{
		background: #ff9b00;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: #25274d;
		color: #fff;
		font-weight: 600;
		width: 25%;
	}
	.contact-form button:focus{
		box-shadow:none;
	}
    .toast{
        position: absolute;
        background: #ff9b00;  
        color:white;
        border-radius: 3px;
        opacity: 0.9;
        padding: 1rem;
        margin: 0.3rem;
        transition:transform 0.6 ease-in;
        right: 10px;
    }
</style>
