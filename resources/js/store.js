import clientStore from './store/modules/clients/index.js';

export default {
    modules: {
        client: clientStore,
    },
    state: {
        count: 1,
    }
}

