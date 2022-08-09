import axios from 'axios';
import Swal from 'sweetalert2';
import router from '../../../routes.js'

export default{
    namespaced: true,
    state: {
        baptisms: null,
        baptism: null,
        inputErrors: [],
        errors: null,
    },
    getters: {
        getBaptismList(state){
            axios.get('http://127.0.0.1:8000/api/baptism')
            .then((response)=>{
                if(response.status === 200){
                    state.baptisms = response.data;
                    console.log(state.baptisms);
                }
            });
        },
        loadBaptismList(state){
            return state.baptisms;
        },
    },
    mutations: {
        addBaptism(state, payload){
            axios.post('http://127.0.0.1:8000/api/baptism/add-baptism', payload)
            .then((response)=>{
                if(response.data.inputErrors){
                    state.inputErrors = [];
                    const inputErrors = response.data.message;
                    for(let key in inputErrors){
                        state.inputErrors.push(inputErrors[key][0]);
                    }
                }

                if(response.data.error){
                    Swal.fire("Error", response.data.message, 'error')
                }

                if(response.data.success){
                    Swal.fire("Success", response.data.message, 'success')
                    .then((result)=>{
                        if(result.isConfirmed){
                            router.push({name: 'baptism'});
                        }
                    })
                }
            })
        }
    },
    actions: {
        addBaptism(context, payload){
            context.commit('addBaptism', payload);
            context.getters.getBaptismList;
        }
    }
}