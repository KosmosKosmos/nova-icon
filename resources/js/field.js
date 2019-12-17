import VueSVGIcon from 'vue-svgicon';
import '../compiled-icons/';

Nova.booting((Vue, router, store) => {
    Vue.prototype.$iconSettings = {colors: '#666', default: 'fitness-05'};
    Vue.use(VueSVGIcon, { isStroke: true, defaultWidth: '1.2em', defaultHeight: '1.2em'});
    Vue.component('svg-icon', require('./components/icons/VueIcon'))
    Vue.component('index-icons', require('./components/icons/IndexField'))
    Vue.component('detail-icons', require('./components/icons/DetailField'))
    Vue.component('form-icons', require('./components/icons/FormField'))
    Vue.component('vue-fetch-icon', require('./components/icons/VueFetchIcon'))
})
