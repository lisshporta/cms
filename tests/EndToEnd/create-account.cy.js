/// <reference types="cypress" />

describe('Creating Accounts', () => {
    it('Can create new accounts', () => {
        // Create Account
        cy.visit('/');
        cy.get("[data-cy=\"navigation-create-account-link\"]").click();
        cy.get("[data-cy=\"register-name-input\"]").type("John Brown");
        cy.get("[data-cy=\"register-email-input\"]").type("john.brown@example.com");
        cy.get("[data-cy=\"register-username-input\"]").type("john_brown");
        cy.get("[data-cy=\"register-password-input\"]").type("P@ssw0rd1");
        cy.get("[data-cy=\"register-confirm-password-input\"]").type("P@ssw0rd1");
        cy.get("[data-cy=\"register-tos-checkbox\"]").click();
        cy.get("[data-cy=\"register-submit-button\"]").click();

        //Clean up and delete the new account
        cy.get("[data-cy=\"navigation-account-dropdown\"]").click();
        cy.get("[data-cy=\"navigation-profile-dropdown\"]").click();
        cy.get("[data-cy=\"profile-delete-account-button\"]").click();
        cy.get("[data-cy=\"profile-delete-password-input\"]").type("P@ssw0rd1");
        cy.get("[data-cy=\"profile-delete-account-confirm-button\"]").click();

    })
})
