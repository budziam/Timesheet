require('../bootstrap');
require('bootstrap-sidebar/dist/js/sidebar');
require('bootstrap-notify');

import CustomerIndex from "./components/customer-index";
import CustomerCreateedit from "./components/customer-createedit";
import ProjectIndex from "./components/project-index";
import ProjectCreateedit from "./components/project-createedit";
import ProjectGroupIndex from "./components/project-group-index";
import ProjectGroupCreateedit from "./components/project-group-createedit";
import StatisticsProjects from "./components/statistics-projects";
import StatisticsProjectGroups from "./components/statistics-project-groups";
import UserIndex from "./components/user-index";
import UserCreateedit from "./components/user-createedit";
import UserChangePassword from "./components/user-change-password";
import WorkLogIndex from "./components/work-log-index";
import WorkLogCreateedit from "./components/work-log-createedit";

window.vueApp = new Vue({
    el: '#app',

    components: {
        CustomerIndex,
        CustomerCreateedit,
        ProjectIndex,
        ProjectCreateedit,
        ProjectGroupIndex,
        ProjectGroupCreateedit,
        StatisticsProjects,
        StatisticsProjectGroups,
        UserIndex,
        UserCreateedit,
        UserChangePassword,
        WorkLogIndex,
        WorkLogCreateedit
    },

    created() {
        Event.$on('notify', (type, message, params) => {
            $.notify({
                message: this.$trans(message, params)
            }, {
                type: type
            });
        });
    },

    beforeMount() {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set("containerCssClass", ":all:");
        $.fn.select2.defaults.set("width", null);
        $.fn.select2.defaults.set('debug', true);
        $.fn.select2.defaults.set("language", Laravel.lang);
    }
});
