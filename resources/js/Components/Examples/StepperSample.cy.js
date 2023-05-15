import StepperSample from './StepperSample.vue';

describe('<StepperSample />', () => {
    it('renders', () => {
        // see: https://on.cypress.io/mounting-vue
        cy.mount(StepperSample);
    });

    it('stepper should default to 0', () => {
        cy.mount(StepperSample);
        cy.get('[data-cy=counter]').should('have.text', '0');
    });

    it('supports an "initial" prop to set the value', () => {
        cy.mount(StepperSample, { props: { initial: 100 } });
        cy.get('[data-cy=counter]').should('have.text', '100');
    });

    it('when the increment button is pressed, the counter is incremented', () => {
        cy.mount(StepperSample);
        cy.get('[data-cy=increment]').click();
        cy.get('[data-cy=counter]').should('have.text', '1');
    });

    it('when the decrement button is pressed, the counter is decremented', () => {
        cy.mount(StepperSample);
        cy.get('[data-cy=decrement]').click();
        cy.get('[data-cy=counter]').should('have.text', '-1');
    });

    it('clicking + fires a change event with the incremented value', () => {
        const onChangeSpy = cy.spy().as('onChangeSpy');
        cy.mount(StepperSample, { props: { onChange: onChangeSpy } });
        cy.get('[data-cy=increment]').click();
        cy.get('@onChangeSpy').should('have.been.calledWith', 1);
    });
});
