
describe('login accept', () => { 
    it('passes', () => { 
     cy.visit('https://4padel.fr/signin?redirect=%2Freservations%2Fslots')
     cy.get('#email').type('cesar.labrunie@gmail.com')
     cy.get('#password').type('Legion88@')
    //  cy.get('<button.btn lf-form-btn-full btn-primary>').as('btn').click('btn')
    //  cy.visit('https://4padel.fr/reservations/slots')
     cy.get('form div button:first',).click()
     cy.get('div p p').click()
    //  cy.wait(2000)
    //  cy.get('p.alert').should('contain','connecte')
    //  cy.wait(1500)
    //  cy.visit('https://127.0.0.1:8000/chocoblast/add')
    //  cy.get("#chocoblast_title").type('TestEndToEnd')
    //  cy.get("#chocoblast_createAt").type('2024-04-19')
    //  cy.get('#chocoblast_target').select(5)
    //  cy.get('[type="submit"]').click()
    //  cy.get('p.alert').should('contain','le chocoblast a ete ajoute')
 
 
     })
      
 
     
 
 }) 