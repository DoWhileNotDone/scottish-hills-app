import { describe, it, expect, beforeEach } from 'vitest';
import { setActivePinia, createPinia } from 'pinia';
import { useHillsStore } from './hills';

describe('Hills Store', () => {
    beforeEach(() => {
        // creates a fresh pinia and make it active so it's automatically picked
        // up by any useStore() call without having to pass it to it:
        // `useStore(pinia)`
        setActivePinia(createPinia());
    });

    it('Initialises the state', () => {
        const store = useHillsStore();
        expect(store.hillsList.length).toBe(0);
        expect(store.search).toEqual('');

        store.setHills([
            {
                name: 'Hill One',
            },
            {
                name: 'Hill Two',
            },
        ]);

        expect(store.hillsList.length).toBe(2);
    });

    it('filters hils by name according to the search value', () => {
        const store = useHillsStore();

        store.setHills([
            {
                name: 'Hill One',
            },
            {
                name: 'Hill Two',
            },
        ]);

        expect(store.filteredHills.length).toBe(2);

        store.search = 'Two';

        expect(store.filteredHills.length).toBe(1);
        expect(store.filteredHills[0].name).toEqual('Hill Two');
    });
});
