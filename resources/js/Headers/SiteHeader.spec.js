import { describe, it, expect, vi, afterEach } from 'vitest';
import { shallowMount } from '@vue/test-utils';
import SiteHeader from '@/Headers/SiteHeader.vue';
import { usePage } from '@inertiajs/vue3';

vi.mock('@inertiajs/vue3', () => {
    return {
        ...vi.importActual('@inertiajs/vue3'),
        usePage: vi.fn(),
    };
});

describe('<SiteHeader />', () => {
    afterEach(() => {
        vi.restoreAllMocks();
    });

    it('renders for guest', () => {
        vi.mocked(usePage).mockReturnValue({
            props: {
                auth: {
                    user: null,
                },
            },
        });

        //Using mount rather than shallowMount is required to resolve dynamic component
        //but that complains that route is not a function
        //So we use shallowMount and check for the returned stub
        const wrapper = shallowMount(SiteHeader);

        expect(wrapper.html()).toContain('guest-header-stub');
    });

    it('renders for authenticated user', () => {
        vi.mocked(usePage).mockReturnValue({
            props: {
                auth: {
                    user: {
                        name: 'Jim',
                    },
                },
            },
        });

        const wrapper = shallowMount(SiteHeader);
        expect(wrapper.html()).toContain('authenticated-header-stub');
    });
});

//Import, mock module, implement a mock return then invoke the mocked function

// import { getHeightInMeters } from '@/functions';

// vi.mock('@/functions', async importOriginal => {
//     const mod = await importOriginal();
//     return {
//         ...mod,
//         // replace some exports
//         getHeightInMeters: vi.fn(),
//     };
// });

// vi.mocked(getHeightInMeters).mockReturnValue(100);
// expect(getHeightInMeters()).toBe(100);

// expect(mock(3000)).toEqual(914);
// expect(mock).toHaveBeenCalledTimes(1);

// mock.mockImplementationOnce(() => 'not here');
// expect(mock()).toEqual('not here');
// expect(mock).toHaveBeenCalledTimes(2);

//         const getApples = vi.fn(() => 0);

//         getApples();

//         expect(getApples).toHaveBeenCalled();
//         expect(getApples).toHaveReturnedWith(0);

//         // const wrapper = shallowMount(SiteHeader);
//         // expect(wrapper.text()).toContain('Testy');
//     });
// });
