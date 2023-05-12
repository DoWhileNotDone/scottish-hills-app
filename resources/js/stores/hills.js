import axios from 'axios';
import { defineStore } from 'pinia';

export const useHillsStore = defineStore({
    id: 'hillsState',
    state: () => ({
        hillsList: [],
        loading: false,
        error: null,
    }),
    getters: {
        hills: state =>
            state.hillsList.map(hill => {
                return {
                    ...hill,
                };
            }),
        findHill: state => id => {
            return state.hillsList.find(hill => hill.id == id);
        },
    },
    // mutations can now become actions, instead of `state` as first argument use `this`
    // no context as first argument, use `this` instead
    actions: {
        async getHills() {
            this.hillsList = [];
            this.loading = true;
            try {
                this.hillsList = (await axios.get('hills')).data;
            } catch (error) {
                console.log('error loading hills');
                this.error = error;
            } finally {
                this.loading = false;
            }
        },
    },
});
