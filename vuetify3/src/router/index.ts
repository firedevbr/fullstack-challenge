import {
  createRouter,
  createWebHistory,
} from 'vue-router';
import { useAuthStore } from '@/store/authStore';
import AuthService from '@/services/AuthService';

const authRoutes = [
// rotas de autenticação
];

const appRoutes = [
  {
    path: '/',
    name: 'BaseAdmin',
    redirect: { path: '/home' },
    meta: {
      breadcrumb: [],
    },
    component: () => import('../views/BaseView.vue'),
    children: [
      {
        path: '/home',
        name: 'Home',
        meta: {
          permissions: "*",
          breadcrumb: [{ name: 'Home' }],
          public: true,
        },
        component: () => import('../views/Home.vue'),
      },
      {
         path: '/produtos',
         name: 'Produto',
         meta: {
           permissions: "*",
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto' },
           ],
           public: true,
         },
         component: () =>
           import('../views/produtos/ListProduto.vue'),
       },
       {
         path: '/produtos/cadastrar',
         name: 'Cadastrar Produto',
         meta: {
           permissions: ["administracao"],
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto', path: '/produtos' },
             { name: 'Cadastrar Produto' },
           ],
           public: true,
         },
         component: () => import('../views/produtos/FormProduto.vue'),
       },
       {
         path: '/produtos/editar/:id',
         name: 'Editar Produto',
         meta: {
           permissions: ["administracao"],
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto', path: '/produtos' },
             { name: 'Editar Produto' },
           ],
           public: true,
         },
         component: () => import('../views/produtos/FormProduto.vue'),
         props: true,
       },
{
         path: '/produtos-categorias',
         name: 'Produto Categoria',
         meta: {
           permissions: "*",
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto Categoria' },
           ],
           public: true,
         },
         component: () =>
           import('../views/produtos-categorias/ListProdutoCategoria.vue'),
       },
       {
         path: '/produtos-categorias/cadastrar',
         name: 'Cadastrar Produto Categoria',
         meta: {
           permissions: ["administracao"],
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto Categoria', path: '/produtos-categorias' },
             { name: 'Cadastrar Produto Categoria' },
           ],
           public: true,
         },
         component: () => import('../views/produtos-categorias/FormProdutoCategoria.vue'),
       },
       {
         path: '/produtos-categorias/editar/:id',
         name: 'Editar Produto Categoria',
         meta: {
           permissions: ["administracao"],
           breadcrumb: [
             { name: 'Home', path: '/home' },
             { name: 'Produto Categoria', path: '/produtos-categorias' },
             { name: 'Editar Produto Categoria' },
           ],
           public: true,
         },
         component: () => import('../views/produtos-categorias/FormProdutoCategoria.vue'),
         props: true,
       },

    ],
  },
];

const routes = [...authRoutes, ...appRoutes];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach(async (to, from, next) => {
  const authStore = useAuthStore();

  const isAuthenticated = authStore.token != null;

  if (!to.meta.public && !isAuthenticated) {
    next({ name: 'Login' });
    return;
  }

  let possuiPermissao = false;

  if (typeof to.meta.permissions === 'string' || Array.isArray(to.meta.permissions)) {
    possuiPermissao = AuthService.usuarioPossuiPermissao(to.meta.permissions)
  }

  if (to.name === 'Login' && isAuthenticated) {
    next({ name: 'Home' });
    return;
  }

  if (isAuthenticated && !possuiPermissao) {
    next({ name: 'Home' });
    return;
  }

  next();
});

export default router;