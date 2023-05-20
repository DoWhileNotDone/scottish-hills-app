import { describe, it, expect } from 'vitest';
import { mount } from '@vue/test-utils';
import HillCard from '@/Components/HillCard.vue';
import { getHeightInMeters } from '@/functions';

describe('<HillCard />', () => {
    it('renders properly', () => {
        const wrapper = mount(HillCard, {
            props: {
                hill: {
                    name: 'Ben Hill',
                    type: 'Munro',
                    height: 3000,
                    grid_ref: 'NN123456',
                },
            },
        });

        expect(wrapper.text()).toContain('Ben Hill');
    });

    it('renders the hill details correctly', () => {
        const hill = {
            name: 'Ben Hill',
            type: 'Munro',
            height: 3000,
            grid_ref: 'NN123456',
        };

        const wrapper = mount(HillCard, {
            props: {
                hill,
            },
        });

        expect(wrapper.get('[data-test="hill-card-name"]').text()).toBe(hill.name);
        expect(wrapper.get('[data-test="hill-card-height"]').text()).toBe(
            `${hill.height}ft / ${getHeightInMeters(hill.height)}m`,
        );
        expect(wrapper.get('[data-test="hill-card-grid-ref"]').text()).toBe(hill.grid_ref);
        expect(wrapper.get('[data-test="hill-card-type-badge"]').text()).toBe(hill.type);
    });
});
