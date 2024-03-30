import { defineStore } from 'pinia';
import IUser from '@/models/entities/IUser';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: null as string | null,
    user: null as IUser | null,
  }),
  actions: {
    setToken(token: string | null) {
      this.token = token;
    },
    setUser(user: IUser | null) {
      this.user = user;
    },
    clearToken() {
      this.token = null;
      this.user = null;
    },
  },
});