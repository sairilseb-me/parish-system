import clientStore from './store/modules/clients/index.js';
import priestStore from './store/modules/priests/index.js'; 

export default {
    modules: {
        client: clientStore,
        priest: priestStore,
    },
    state: {
        count: 1,
    }
}

