import clientStore from './store/modules/clients/index.js';
import priestStore from './store/modules/priests/index.js'; 
import baptismStore from './store/modules/baptism/index';

export default {
    modules: {
        client: clientStore,
        priest: priestStore,
        baptism: baptismStore,
    },
    state: {
        count: 1,
    }
}

