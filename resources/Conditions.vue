<template>
    <div class="w-full gap-2">
        <div class="block uppercase tracking-widest text-base font-bold dark:text-slate-300" >
            Conditions
        </div>

        <div class="flex w-full my-1 " v-for="(condition, index) in modelValue">
            <div class="flex-1">
                <SporkLabel>
                    Parameter
                </SporkLabel>
                <SporkSelect v-model="condition.parameter">
                    <option v-for="parameter in parameters" :value="parameter.value">{{ parameter.name }}</option>
                </SporkSelect>
            </div>
            <div class="flex-1 ml-4">
                <SporkLabel>
                    Comparator
                </SporkLabel>

                <SporkSelect v-model="condition.comparator">
                    <option v-for="comparator in comparators" :value="comparator.value">{{ comparator.name }}</option>
                </SporkSelect>
            </div>
            <div class="flex-1 ml-4">
                <SporkLabel>
                    Value
                </SporkLabel>
                <SporkInput v-model="condition.value" type="text" placeholder="STEAMGAMES.COM" />
            </div>

            <div class="w-6 ml-2 flex justify-center items-end mb-1">
                <button class="text-red-600 h-6" @click.prevent="() => deleteCondition(condition, index)">
                    <svg class="w-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>

        <div v-if="!modelValue?.length" class="italic">
            Without conditions, this will be applied by default
        </div>

        <SporkButton @click="addCondition" :icon="PlusCircleIcon" small secondary class="my-2">
            <span>Add condition</span>
        </SporkButton>
    </div>
</template>

<script>
import { PlusCircleIcon } from '@heroicons/vue/solid'
import SporkInput from '@components/SporkInput.vue';
import SporkButton from '@components/SporkButton.vue';
import SporkSelect from '@components/SporkSelect.vue';
import SporkLabel from '@components/SporkLabel.vue';

export default {
    components: {
        SporkInput,
        SporkButton,
        SporkSelect,
        SporkLabel,
    },
    props: ['modelValue'],
    data() {
        return {
            PlusCircleIcon,
            saving: false,
            comparators: this.$store.state.Conditions.comparators,
        }
    },
    emits: ['update:modelValue'],
    computed: {
        parameters() {
            return [
                {
                    "name": "transaction name",
                    "value": "transaction.name"
                },
            ]
        }
    },
    methods: {
        addCondition() {
            console.log(this.modelValue)
            this.$emit('update:modelValue', (this.modelValue ?? []).concat([{
                value: '',
                comparator: 'LIKE',
                parameter: 'name',
            }]))
        },
        deleteCondition(condition, index) {
            this.$emit('update:modelValue', (this.modelValue ?? []).filter((value, i) => i !== index))
        }
    }
}
</script>