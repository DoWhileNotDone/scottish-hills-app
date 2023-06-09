import { describe, it, expect } from 'vitest';
import { mount } from '@vue/test-utils';
import ToDoAppSample from '@/Components/Examples/ToDoAppSample.vue';

describe('ToDoAppSample', () => {
    it('renders properly', () => {
        const wrapper = mount(ToDoAppSample, {});

        expect(wrapper.text()).toContain('To Do App');
    });
});
