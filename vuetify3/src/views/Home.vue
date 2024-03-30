<template>
  <div>
    <v-container>
      <v-row>
        <v-col
          cols="12"
          class="d-flex flex-column"
        >
          <h1
            v-if="user"
            class="text-left"
          >
            Olá, {{ user.full_name }}
          </h1>
          <h4 class="mt-5">
            Encontre abaixo as opções de navegação das funcionalidades do sistema
          </h4>
        </v-col>
      </v-row>
      <v-row
        v-if="!isLoading"
        class="mt-10"
      >
        <v-col
          class="column-spacing pr-7 mb-8"
          cols="12"
          :lg="3"
          sm="6"
          xs="12"
          md="6"
        >
          <MenuItem
            title="PRODUTO"
            description="Consulte todos os produto cadastrados."
            is-first-item
            link="/produtos"
            alternate
          />
        </v-col>
        <v-col
          class="column-spacing pr-7 mb-8"
          cols="12"
          :lg="3"
          sm="6"
          xs="12"
          md="6"
        >
          <MenuItem
            title="PRODUTO CATEGORIA"
            description="Consulte todos os produto categoria cadastrados."
            is-first-item
            link="/produtos-categorias"
            alternate
          />
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script lang="ts">
import MenuItem from '@/Components/Home/MenuItem.vue';
import AuthService from '@/services/AuthService';
import IUser from '@/models/entities/IUser';

export default {
  components: {
    MenuItem
  },
  data(): {
    isLoading: boolean
    user: IUser
  } {
    return {
      isLoading: false,
      user: null
    }
  },
  watch: {},
  async mounted() {
    // this.user = AuthService.getLoggedAdminAreaUserData();
    this.user = {
      full_name: "Thiago Rocha"
    }
  },
  methods: {
    // Custom methods
  },
};
</script>

<style lang="scss" scoped>
</style>
