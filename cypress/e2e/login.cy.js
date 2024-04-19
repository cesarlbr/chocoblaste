

   describe('login accept', () => { 
   it('passes', () => { 
    cy.visit('https://127.0.0.1:8000/login')
    cy.get('#inputEmail').type('cesar.labrunie@gmail.com')
    cy.get('#inputPassword').type('Azerty77123@')
    cy.get('[type="submit"]').click()
    cy.wait(2000)
    cy.get('p.alert').should('contain','connecte')
    cy.wait(1500)
    cy.visit('https://127.0.0.1:8000/chocoblast/add')
    cy.get("#chocoblast_title").type('TestEndToEnd')
    cy.get("#chocoblast_createAt").type('2024-04-19')
    cy.get('#chocoblast_target').select(5)
    cy.get('[type="submit"]').click()
    cy.get('p.alert').should('contain','le chocoblast a ete ajoute')


    })
     

    

}) 
