import axios from "axios"
import Swal from 'sweetalert2';

export default {
    namespaced: true,
    state: {
        clients: null,
        client: null,
        closeAddModal: false,
        closeEditModal: false,
        inputErrors: [],
        errors: null,
    },
    getters: {
        loadClients(state){
            return state.clients
        },
       
        getClientData(state){
            return state.client;
        },
        getAddModalStatus(state){
            return state.closeAddModal
        },
        getEditModalStatus(state){
            return state.closeEditModal;
        },
        getInputErrors(state){
            return state.inputErrors;
        },
    },
    mutations: {
       addClient(state, payload){
         axios.post('api/clients/add-client/', payload)
         .then((response) =>{
            if(response.data.success){
                Swal.fire('Success', response.data.message, 'success');
                this.setModalStatus(true)
            }
            if(response.data.error){
                state.inputErrors = [];
                const inputErrors = response.data.message;
                for(let key in inputErrors){
                    state.inputErrors.push(inputErrors[key][0])
                }
                // state.inputErrors = Object.keys(response.data.message);
                // const inputErrors = Object.values(state.inputErrors);
                // state.inputErrors = inputErrors.reduce((obj, v)=>{
                //     obj[v] = `${v} field is required.`;
                //     return obj
                // }, {})
            }
         }).catch((err)=>{
            state.closeAddModal = true
         })
       },
       setAddModalStatus(state, payload){
            state.closeAddModal = payload;
       },
       setEditModalStatus(state, payload){
        state.closeEditModal = payload;
       },   
       getPaginationResult(state, payload){
            axios.get('api/clients?page=' + payload)
            .then((response)=>{
                state.clients = response.data;
            })
       },
       searchClient(state,payload){
            axios.get(`api/clients/search-client?search=${payload}`)
            .then((response)=>{
                if(response.data){
                    state.clients = response.data;
                    console.log(state.clients);
                }
            })
       },
       editClient(state, payload){
        axios.get(`api/clients/edit-client/${payload}`)
        .then((response)=>{
            if(response.status === 200){
                state.client = {...response.data};
            }
        })
       },
       updateClient(state, payload){
            axios.post(`api/clients/update-client/${payload.id}`, payload)
            .then((response)=>{
                if(response.data.success){
                    state.closeEditModal = false;
                    console.log(state);
                    Swal.fire('Success', response.data.message, 'success')
                    .then((result)=>{
                        if(result.isConfirmed){
                            console.log("Confirmed.");
                        }
                    })
                }
                if(response.data.error){
                    this.errors = response.data.message;
                }
                if(response.data.inputErrors){
                    state.inputErrors = [];
                    const inputErrors = response.data.message;
                    for(let key in inputErrors){
                        state.inputErrors.push(inputErrors[key][0])
                    }
                }   
            })
       },
       deleteClient(state, payload){
        axios.post(`api/clients/delete-client/${payload}`)
        .then((response)=>{
            if(response.data.success){
                Swal.fire("Success!", response.data.message, 'success')
                .then((result)=>{
                    if(result.isConfirmed){
                        state.getClientList;
                    }
                })
            }
            if(response.data.error){
                Swal.fire("Failed", response.data.message, 'error');
            }
        })
       },
       getClientList(state){
        console.log("Trigger Get Client List");
        axios.get('api/clients')
        .then((response)=> state.clients = response.data)
    },
    },
    actions: {
        setAddModalStatus(context, payload){
            context.commit('setAddModalStatus', payload);
        },
        setEditModalStatus(context, payload){
            context.commit('setEditModalStatus', payload);
        },
        addClient(context, payload){
            context.commit('addClient', payload);
            context.commit('getClientList');
        },
        getPaginationResult(context, payload){
            context.commit('getPaginationResult', payload);
        },
        searchClient(context, payload){
            context.commit('searchClient', payload);
        },
        editClient(context, payload){
            context.commit('editClient', payload);
        },
        updateClient(context, payload){
            context.commit('updateClient', payload);
            context.commit('getClientList');
        },
        deleteClient(context, payload){
            context.commit('deleteClient', payload);
            context.commit('getClientList');
        },
        getClientList(context,payload){
            context.commit('getClientList', payload);
        }
    }
}