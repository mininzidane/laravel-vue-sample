import './bootstrap';
import { createApp, h } from 'vue'
import ElementPlus from 'element-plus'
import Search from './views/Search.vue'
const NotFoundComponent = { template: '<p>Page not found</p>' }

const routes = {
    '/': Search,
};

const SimpleRouter = {
  data: () => ({
    currentRoute: window.location.pathname
  }),

  computed: {
    CurrentComponent() {
      return routes[this.currentRoute] || NotFoundComponent
    }
  },

  render() {
    return h(this.CurrentComponent);
  }
};

const app = createApp(SimpleRouter);
app.use(ElementPlus);
app.mount('#app');
