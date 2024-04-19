describe('exemple', () => { 
    it('passes', () => { 
    cy.visit('https://127.0.0.1:8000/register')
    cy.get('input[name="register[firstname]"]').type('Jean')
    cy.get('input[name="register[lastname]"]').type('Didier')
    cy.get('input[name="register[password]"]').type('Azerty77123@')
    cy.get('input[name="register[email]"]').type('jean.didierrrrr@gmail.com')
    cy.get('[type="submit"]').click()
    cy.wait(4000)
    cy.get('p.alert').should('contain','Le compte a ete ajoute')

    })
    it('passes', () => { 
        cy.visit('https://127.0.0.1:8000/register')
        cy.get('input[name="register[firstname]"]').type('Jean')
        cy.get('input[name="register[lastname]"]').type('Didier')
        cy.get('input[name="register[password]"]').type('Azerty77123@')
        cy.get('input[name="register[email]"]').type('jean.didierrrrr@gmail.com')
        cy.get('[type="submit"]').click()
        cy.wait(4000)
        cy.get('p.alert').should('contain','Le compte existe deja')
    
    }) 

  
    
   }) 