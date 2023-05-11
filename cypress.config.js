const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
      baseUrl: 'http://localhost',
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
      specPattern: "tests/EndToEnd/**/*.cy.{js,jsx,ts,tsx}",
      supportFile: "tests/EndToEnd/support/e2e.{js,jsx,ts,tsx}",
      fixturesFolder: "tests/EndToEnd/fixtures",
      downloadsFolder: "tests/EndToEnd/downloads",
      screenshotsFolder: "tests/EndToEnd/screenshots",
  },
});
