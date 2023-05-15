import { defineStore } from 'pinia';

export const useHillsStore = defineStore({
    id: 'hillsState',
    state: () => ({
        hillsList: [],
        search: '',
    }),
    getters: {
        filteredHills: state => {
            const search = state.search.trim().toLowerCase();
            if (search.length == '') {
                return state.hillsList;
            }
            return state.hillsList.filter(hill => hill.name.toLowerCase().indexOf(search) > -1);
        },
    },
    // mutations can now become actions, instead of `state` as first argument use `this`
    // no context as first argument, use `this` instead
    actions: {
        setHills(hills) {
            this.hillsList = hills;
        },
    },
});
