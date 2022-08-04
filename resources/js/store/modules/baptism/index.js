import axios from 'axios';
import Swal from 'sweetalert2';

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
                }
            });
        },
        loadBaptismList(state){
            return state.baptisms;
        },
    },
    mutations: {
        addbaptism(state, payload){
            axios.post('http://127.0.0.1:8000/api/baptism/add-baptism')
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
                            this.$route.push({name: 'baptism'});
                        }
                    })
                }
            })
        }
    },
    actions: {
        addbaptism(context, payload){
            context.commit('addbaptism', payload);
        }
    }
}