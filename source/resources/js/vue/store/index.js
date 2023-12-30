import Vuex from 'vuex'

const createStore = () => {
    return new Vuex.Store({
        state: function() {
            return {
                message: 'Hello Vuex!'
            }
        }
    })
}
export default createStore
