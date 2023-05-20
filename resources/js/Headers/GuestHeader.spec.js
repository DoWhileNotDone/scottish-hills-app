import { describe, it, expect, vi, afterEach } from 'vitest';
import { config, shallowMount } from '@vue/test-utils';
import GuestHeader from '@/Headers/GuestHeader.vue';

//Mock route('name') and route().current('name'):
//import route from '@/../../vendor/tightenco/ziggy/src/js/index';

// eslint-disable-next-line no-unused-vars
const currentFn = vi.fn(name => true);

const routerMock = {
    current: currentFn,
};

const routeMock = vi.fn(name => {
    return name ? 'stringystring' : routerMock;
});

config.global.mocks.route = routeMock;

describe('<SiteHeader />', () => {
    afterEach(() => {
        vi.restoreAllMocks();
    });

    it('renders the guest header', () => {
        shallowMount(GuestHeader);

        expect(routeMock).toHaveBeenCalledTimes(10);

        // The first argument of the first call to the function was home
        expect(routeMock.mock.calls[0][0]).toBe('home');

        //   // The return value of the first call to the function was 42
        //   expect(mockCallback.mock.results[0].value).toBe(42);

        expect(currentFn).toHaveBeenCalledTimes(4);

        expect(currentFn.mock.calls[0][0]).toBe('home');
    });
});
