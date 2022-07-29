import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    namespaced: true,
    state: {
        addModalStatus: false,
        editModalStatus: false,
        priests: null,
        priest: null,
        inputErrors: [],
    },
    getters: {
        loadPriestsList(state){
            return state.priests
        },
        getAddModalStatus(state){
            return state.addModalStatus
        },
        getEditModalStatus(state){
            return state.editModalStatus;
        },
        getInputErrors(state){
            return state.inputErrors;
        },
        getPriestsList(state){
            axios.get('api/priests')
            .then((response)=>{
                console.log(response.data);
                state.priests = response.data;
            })
        },
        getPriestData(state){
            return state.priest;
        }
    },
    mutations: {
        setAddModalStatus(state, payload){
            state.addModalStatus = payload;
        },
        setEditModalStatus(state, payload){
            state.editModalStatus = payload;
        },
        addNewPriest(state, payload){
            axios.post('api/priests/add-priest', payload)
            .then((response)=>{
                if(response.data.inputErrors){
                    state.inputErrors = [];
                    const inputErrors = response.data.message;
                    for(let key in inputErrors){
                      state.inputErrors.push(inputErrors[key][0]);  
                    }
                }
                if(response.data.success){
                    Swal.fire("Success", response.data.message, 'success')
                    .then((result)=>{
                        if(result.isConfirmed){
                            state.addModalStatus = false;
                        }
                    })
                }
            }).catch((err)=>{
                Swal.fire('Error', 'Something went wrong. Cannot add Priest data.', 'error');
            });
        },
        fetchPriestData(state, payload){
            axios.get(`api/priests/specific-data/${payload}`)
            .then((response)=>{
                if(response.status === 200){
                    state.priest = response.data.data
                    state.editModalStatus = true;
                }
            }).catch((err)=>{
                Swal.fire('Error', 'Cannot fetch Priest data.', 'error')
                .then((result)=>{
                    if(result.isConfirmed){
                        state.editModalStatus = false;
                    }
                })
            })
        }
    },
    actions: {
        setAddModalStatus(context, payload){
            context.commit('setAddModalStatus', payload);
        },
        addNewPriest(context, payload){
            context.commit('addNewPriest', payload);
        },
        setEditModalStatus(context, payload){
            context.commit('setEditModalStatus', payload);
        },
        fetchPriestData(context, payload){
            context.commit('fetchPriestData', payload);
        }
    }
}