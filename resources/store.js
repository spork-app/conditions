import axios from "axios"

export default {
  state: {
    comparators: [
        {
            "name": "is equal to",
            "value": "Spork\\Conditions\\Filters\\EqualsValueOperator"
        },
        {
            "name": "is not equal to",
            "value": "Spork\\Conditions\\Filters\\DoesntEqualValueOperator"
        },
        {
            "name": "is in this list (comma separated list)",
            "value": "Spork\\Conditions\\Filters\\InArrayValueOperator"
        },
        {
            "name": "is not in this list (comma separated list)",
            "value": "Spork\\Conditions\\Filters\\IsntInArrayEqualValueOperator"
        },
        {
            "name": "starts with",
            "value": "Spork\\Conditions\\Filters\\StartsWithValueOperator"
        },
        {
            "name": "ends with",
            "value": "Spork\\Conditions\\Filters\\EndsWithValueOperator"
        },
        {
            "name": "less than (number)",
            "value": "Spork\\Conditions\\Filters\\LessThanValueOperator"
        },
        {
            "name": "less than or equal to (number)",
            "value": "Spork\\Conditions\\Filters\\LessThanOrEqualValueOperator"
        },
        {
            "name": "greater than (number)",
            "value": "Spork\\Conditions\\Filters\\GreaterThanValueOperator"
        },
        {
            "name": "greater than or equal to (number)",
            "value": "Spork\\Conditions\\Filters\\GreaterThanOrEqualValueOperator"
}
    ]
  },
  mutations: {},
  getters: {},
  actions: {
    async createCondition({ state, dispatch }, args) {
        const {
            comparator,
            parameter,
            value,
            conditionable_type,
            conditionable_id,
        } = args;
        console.log('condition from create Condition', { comparator, parameter, value, conditionable_type, conditionable_id}, args)
        try { 
            await axios.post('/api/conditions', {
                comparator,
                parameter,
                value,
                conditionable_type,
                conditionable_id,
            })
        } catch (error) {

        }
    }
  },
}
