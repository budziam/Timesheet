import VDatatable from '../../components/datatable';
import Laravel from '../../../common/laravel';

export default {
    template: require('./work-log-index.html'),

    components: {
        VDatatable
    },

    data() {
        return {
            startYears: [],
            endYears: [],
            projectGroups: [],
            customers: [],
            workLogCreateUrl: Laravel.url('/dashboard/work-logs/create'),
            columns: [
                'ID',
                'Project',
                'User',
                'Date',
                'Fieldwork',
                'Office'
            ],
            options: {
                ajax: {
                    url: Laravel.url('/dashboard/api/datatable/work-logs'),
                    data: (data) => ({
                        ...data,
                        filters: this.filters,
                    }),
                },
                columns: [
                    {
                        name: 'id',
                        data: {
                            _: 'id.display'
                        },
                    },
                    {
                        data: 'project'
                    },
                    {
                        data: 'user',
                    },
                    {
                        data: 'date',
                    },
                    {
                        data: 'time_fieldwork',
                    },
                    {
                        data: 'time_office',
                    },
                ],
                order: [[0, 'desc']],
                iDisplayLength: 50,
            },
            years: yearsRange(),
        }
    },

    methods: {
        updateProjectGroups(groups) {
            this.projectGroups = groups;
        },

        updateCustomers(customers) {
            this.customers = customers;
        },
    },

    computed: {
        filters() {
            return {
                start_years: this.startYears,
                end_years: this.endYears,
                project_groups: this.projectGroups,
                customers: this.customers,
            };
        },
    },

    watch: {
        filters() {
            this.$refs.datatable.draw();
        },
    },
};
