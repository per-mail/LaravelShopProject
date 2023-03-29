import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
   
    {
      path: '/',
      name: 'main', 
      component: () => import('../views/main/Index.vue')    
    },
    {
      path: '/products',
      name: 'products', 
      component: () => import('../views/products/Index.vue')    
    },
  ]
})

export default router





//  <template v-for="groupProduct in popupProduct.group_products">
//                <a @click.prevent="getProduct(groupProduct.id)" v-for="color in groupProduct.colors" href="#0" :style="`background: #${color.title};`" class="color-name"> <span>{{color.title}}</span> </a>
// </template>  


