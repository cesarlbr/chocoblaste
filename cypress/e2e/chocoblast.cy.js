

describe('login accept', () => { 
    it('passes', () => { 
        cy.visit('https://127.0.0.1:8000/chocoblast/add')
        cy.get("#chocoblast_title").type('TestEndToEnd')
        cy.get("#chocoblast_createAt").type('2024-04-19')
        cy.get('#chocoblast_target').select('[data-value=5]')

    }) 
 }) 