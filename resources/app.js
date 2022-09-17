Spork.setupStore({
    Conditions: require("./store").default,
})

Spork.component('conditions', require('./Conditions').default)
Spork.routesFor('Conditions', [
  // Spork.authenticatedRoute('/Conditions', require('./Conditions/Conditions').default,
  // Spork.unauthenticatedRoute('/Conditions', require('./Conditions/Conditions').default,
]);
